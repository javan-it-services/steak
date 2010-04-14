<?php
class TdosensController extends AppController {

	var $name = 'Tdosens';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $primaryKey = 'NIP_DOSEN';

	function index() {
		$this->loadModel('Tdosen');
		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Tdosen->recursive = 0;
		if(isset($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tdosen.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];
        }
		$this->set('tdosens', $this->paginate('Tdosen'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tdosen.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tdosen', $this->Tdosen->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tdosen->create();
			if ($this->Tdosen->save($this->data)) {
				//$this->loadModel('User');
				//$this->User->create();
				//$this->User->save(array(
				//	'USERNAME' => $this->data['Tdosen']['NIP_DOSEN'],
				//	'ENABLED_USER' => 0,
				//	'TYPE'	=> 'DOSEN'
				//));
				$filename = $this->data['Tdosen']['file_foto']['name'];
				if($filename){
					rename(WWW_ROOT.'files/'.$filename,WWW_ROOT."files/".$this->Tdosen->getInsertID());
					$this->data['Tdosen']["FOTO"] = "files/".$this->Tdosen->getInsertID();
					$this->Tdosen->saveField("FOTO","files/".$this->Tdosen->getInsertID());
				}
				//$this->Tdosen->saveField('USER_ID',$this->User->id);
				$this->Session->setFlash(__('The Tdosen has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tdosen could not be saved. Please, try again.', true));
			}
		}
		$tagamas = $this->Tdosen->Tagama->find('list');
		$tpangkats = $this->Tdosen->Tpangkat->find('list');
		$tpropinsis = $this->Tdosen->Tpropinsi->find('list');
		$tkabupatens = $this->Tdosen->Tkabupaten->find('list');
		$tkabupatens2 = $this->Tdosen->Tkabupaten->find('list');
		$this->loadModel('Refdetil');
		$status_aktivitas = $this->Refdetil->generateList('15');
		$status_kerja_dosen = $this->Refdetil->generateList('03');
		$jabatan_akademik = $this->Refdetil->generateList('02');
		$pendidikan_tertinggi = $this->Refdetil->generateList('01');
		$this->set('status_aktivitas',$status_aktivitas);
		$this->set('status_kerja_dosen',$status_kerja_dosen);
		$this->set('jabatan_akademik',$jabatan_akademik);
		$this->set('pendidikan_tertinggi',$pendidikan_tertinggi);
		$this->set(compact('tagamas','tjabatans','tpangkats','tpropinsis','tkabupatens','tkabupatens2'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tdosen', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			//$this->Tdosen->create();
			if ($this->Tdosen->save($this->data)) {

				$filename = $this->data['Tdosen']['file_foto']['name'];
				if($filename){
					rename(WWW_ROOT.'files/'.$filename,WWW_ROOT."files/".$this->Tdosen->getInsertID());

					$this->data['Tdosen']["FOTO"] = "files/".$this->Tdosen->getInsertID();
					$this->Tdosen->saveField("FOTO","files/".$this->Tdosen->getInsertID());
				}
				$this->Session->setFlash(__('The Tdosen has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tdosen could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tdosen->read(null, $id);
		}
		$tagamas = $this->Tdosen->Tagama->find('list');
		$tpangkats = $this->Tdosen->Tpangkat->find('list');
		$tpropinsis = $this->Tdosen->Tpropinsi->find('list');
		$tkabupatens = $this->Tdosen->Tkabupaten->find('list');
		$tkabupatens2 = $this->Tdosen->Tkabupaten->find('list');
		$this->loadModel('Refdetil');
		$status_aktivitas = $this->Refdetil->generateList('15');
		$status_kerja_dosen = $this->Refdetil->generateList('03');
		$jabatan_akademik = $this->Refdetil->generateList('02');
		$pendidikan_tertinggi = $this->Refdetil->generateList('01');
		$this->set('status_aktivitas',$status_aktivitas);
		$this->set('status_kerja_dosen',$status_kerja_dosen);
		$this->set('jabatan_akademik',$jabatan_akademik);
		$this->set('pendidikan_tertinggi',$pendidikan_tertinggi);
		$this->set(compact('tagamas','tjabatans','tpangkats','tpropinsis','tkabupatens','tkabupatens2'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid NIP_DOSEN for Tdosen', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tdosen->del($id)) {
			$this->Session->setFlash(__('Tdosen deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function getkabupateninstansi() {
		$this->layout="ajax";
		$tkabupatens = $this->Tdosen->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tdosen']['KD_PROP_INSTANSI'])));
		$this->set(compact('tkabupatens'));
	}

	function getkabupatenrumah() {
		$this->layout="ajax";
		$tkabupatens = $this->Tdosen->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tdosen']['KD_PROP_RUMAH'])));
		$this->set(compact('tkabupatens'));
	}

	function upload(){
		$session = $this->Session;
		$this->layout = 'ajax';
		$filename = $this->data['Tdosen']['file_foto']['name'];
		$this->set("filename",$filename);
		if(move_uploaded_file($this->data['Tdosen']['file_foto']['tmp_name'],WWW_ROOT.'files/'.$filename)){
		}
		else{
		}
	}


	function ajax_upload(){
		$this->layout = 'ajax';
		Configure::write('debug', 0);
		$filename = $_FILES['file']['name'];
		echo $_FILES['file']['tmp_name'];
		if (move_uploaded_file($_FILES['file']['tmp_name'], WWW_ROOT .'files/'.$filename)) {
			echo $filename;
		}
	}

	function beforeFilter(){
		parent::beforeFilter();
		$this->set('isDosenWali',$this->Session->read('isDosenWali'));
	}
}
?>
