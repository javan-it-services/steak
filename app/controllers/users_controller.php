<?php
class UsersController extends AppController {
	var $userPaginate = array (
		'fields' => array (
			'User.id',
			'User.USERNAME',
			'User.ENABLED_USER',
			'User.VALID_START_USER',
			'User.VALID_FINISH_USER',
			'User.TYPE',
			'Tmahasiswa.NAMA',
			'Tdosen.NAMA_DOSEN',
			'Tpegawai.NAMA_pegawai'
		)
	);
        var $helpers = array('Html', 'Form','Javascript', 'Ajax');
	var $components = array("RequestHandler");


	function index() {
		//pr($this->data);
		if (!empty ($this->data)) {
			$url = array (
				"action" => "index"
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->User->recursive = 2;
		$conditions = array (
			/*'Role.parent_id in (select id from aros where isnull(parent_id))',
			'(not isnull(Tmahasiswa.NIM) or not isnull(Tdosen.NIP_DOSEN) or not isnull(Tpegawai.NIP_pegawai))'
		*/);
		if (!empty ($this->params['named'])) {
			if (!empty ($this->params['named']['USERNAME'])) {
				$conditions[] = "User.USERNAME like '%{$this->params['named']['USERNAME']}%'";
			}
			if (!empty ($this->params['named']['TYPE'])) {
				$conditions[] = "User.TYPE like '%{$this->params['named']['TYPE']}%'";
			}
			$this->data['Filter'] = $this->params['named'];
		}

		$this->paginate = array_merge($this->paginate, $this->userPaginate, array (
			'conditions' => $conditions
		));
		$types = $this->User->Role->find('list', array (
			'conditions' => array (
				'isnull(parent_id) and isnull(model) and isnull(foreign_key)'
			)
		));

		$this->set("types", $types);

		$this->set('users', $this->paginate("User"));

	}

        function autoComplete() {
            $this->layout = 'ajax';
            $this->loadModel('User');
            $this->loadModel('Tmahasiswa');
            $auto = $this->User->Tmahasiswa->find('all', array('conditions'=> array('Tmahasiswa.NIM not in (select USERNAME from users)','Tmahasiswa.NIM LIKE'=> $this->data['User']['USERNAME'].'%'), 'fields'=>array('NIM')));
            $this->set('nims', $auto);
               
	}

	function enable($id = null) {
		if (empty ($this->data)) {
			$this->data = $this->User->read(null, $id);
		} else {
			if ($this->User->save($this->data)) {
				$user = $this->User->read(null, $this->data['User']['id']);
				$aro_user = $user['User']['USERNAME'];
				$aro_group = null;
				$parent_id = 0;
				if ($user['User']['TYPE'] === 'MAHASISWA') {
					$aro_group = 'Mahasiswa';
					$parent_id = 1;
				} else
					if ($user['User']['TYPE'] === 'DOSEN') {
						$aro_group = 'Dosen';
						$parent_id = 2;
					} else {
						$aro_group = 'Pegawai';
						$parent_id = 3;
					}
				$aro = new Aro();
				$aro->create();
				if (!$aro->node("$aro_group/$aro_user")) {
					$aro->save(array (
						'alias' => $aro_user,
						'parent_id' => $parent_id,
						'model' => 'User',
						'foreign_key' => $user['User']['id']
					));
				}
				$this->Session->setFlash(__('The User has been Actived', true));
				$this->redirect(array (
					'action' => 'index'
				));
			}

		}

	}

	function disable($id = null) {
		$this->User->read(null, $id);
		$this->User->saveField('ENABLED_USER', 0);
		$this->redirect(array (
			'action' => 'index'
		));
	}

	function add() {
		$this->loadModel('User');
		if (isset ($_POST['action']) && $_POST['action'] == "Simpan") {
			$this->User->recursive = 0;
			$user = $this->User->findByUsername($this->data['User']['USERNAME']);
			if (!$user) {
				$this->User->create();
			} else {
				$this->data['User']['id'] = $user['User']['id'];
			}

			if (!empty ($this->data)) {

				$this->User->actsAs = array();
                //pr($this->data);exit;
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The User has been saved', true));
					$this->redirect(array (
						'action' => 'index'
					));
				} else {
					$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
				}
			}

		}
		//$role = $this->User->Role->read(null, $this->data["User"]["TYPE"]);
		$this->loadModel('User');
		switch ($this->data["User"]["TYPE"]) {

			case ADMIN :
				$this->set("lblforeignkey", "Username");
				break;
			case DOSEN :
				$this->set("lblforeignkey", "NIP");
				$nims = $this->User->Tdosen->displayField = 'NIP_DOSEN';
				$nims = $this->User->Tdosen->find("list", array (
					'conditions' => array (
						'NIP_DOSEN not in (select USERNAME from users)'
					)
				));
				$this->set("nims", $nims);
				break;
			case PEGAWAI :
				$this->set("lblforeignkey", "NIP");
				$nims = $this->User->Tpegawai->find("list", array (
					'conditions' => array (
						'NIP_pegawai not in (select USERNAME from users)'
					)
				));
				$this->set("nims", $nims);
				break;
			case MAHASISWA :
				$this->loadModel('Tmahasiswa');
				$this->set("lblforeignkey", "Mahasiswa");
				/*$nims = $this->User->Tmahasiswa->find("list", array (
					'conditions' => array (
						'NIM not in (select USERNAME from users)'
					)
				));
				//pr($nims);
				$this->set("nims", $nims);*/
				break;
			default:
				$this->set("lblforeignkey", FALSE);
				break;
		}

		$this->data['User']['PASSWORD'] = "";
	/*	$types = $this->User->Role->find('list', array (
			'conditions' => array (
				'isnull(parent_id) and isnull(model) and isnull(foreign_key)'
			)
		));
*/
		$types = Constant::$group_list;
		$this->set("types", $types);
	}

	function edit($id) {

		if (!empty ($this->data)) {
			$this->data['User']['PASSWORD'] = sha1($this->data['User']['PASSWORD']);

			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}

		if (empty ($this->data)) {
			$user = $this->User->read(null, $id);
			$this->set('user', $user);
			$this->data = $user;
		}
		$this->data['User']['PASSWORD'] = "";
		$types = Constant::$group_list;
		$this->set("types", $types);
	}

	function changepassword() {
		$flash = "";
		$user = $this->User->read(null, $this->auth['User']['id']);
		if (!empty ($this->data)) {
			$ok_old = true;
			$ok_match = true;

			if ($user['User']['PASSWORD'] !== sha1($this->data['Password']['OLD_PASSWORD'])) {
				$flash .= "Password lama salah<br />";
				$ok_old = false;
			}
			if ($this->data['Password']['NEW_PASSWORD'] !== $this->data['Password']['VALID_PASSWORD']) {
				$flash .= "Password baru tidak cocok";
				$ok_match = false;
			}
			if ($ok_match && $ok_old) {

				if ($this->User->saveField('PASSWORD', sha1($this->data['Password']['NEW_PASSWORD']))) {
					$flash = "Password berhasil diubah";
				}
			}
			$this->Session->setFlash(__($flash, true));
		}
	}

	function login() {
		$this->layout = 'login';
		//if successfully login
		if ($this->Auth->user()) {
			if (!empty ($this->data)) {
				$this->loadModel('User');
				$this->User->recursive = 2;
				$user = $this->User->findByUsername($this->data['User']['USERNAME']);
				$this->Session->write('User',$user);
				switch ($user['User']['TYPE']) {
					case ADMIN :
						$redirect = '/users/index';
						break;
					case MAHASISWA:
						$redirect = '/mahasiswa/index';
						break;
					case DOSEN:
						$this->currentModule = 'dosen';
						$this->loadModel('Tdosen');
						$wali = $this->Tdosen->isDosenWali($user['User']['USERNAME']);
						if($wali[0][0]['wali']){
							$this->Session->write('isDosenWali',true);
						}
						else{
							$this->Session->write('isDosenWali',false);
						}
						$redirect = '/penilaian/index';
						break;
					case PEGAWAI :
						$redirect = '/tfakultases/index';
						break;
				}
        		Cache::clear();
				$this->redirect($redirect);
			}

		}else{
			//goto login page
		}

	}
	function logout() {
		$this->Session->destroy();
		Cache::clear();
		$this->redirect($this->Auth->logout());

	}

	function delete($id) {
		$this->User->del($id);
		if (!empty ($this->params['named'])) {
			$url = $this->params['named'];
		}

		$url['action'] = 'index';
		$this->redirect($url);
	}

	function beforeFilter() {
		parent :: beforeFilter();
		$this->Auth->allowedActions = array (
			'login',
			'logout'
		);
	}
}
