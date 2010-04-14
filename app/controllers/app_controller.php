<?php
class AppController extends Controller {
	var $auth;
	var $components = array (
		//'Acl',
		'Auth',
		'RequestHandler'
	);
	var $helpers = array (
		'Html',
		'Session',
		'Javascript',
		'Form',
		'Ajax'
	);


	var $paginate = array('limit' => 10, 'page' => 1);

	var $publicControllers = array (
		'',
		'pages',
		'configurations',
		'acl',
		'aclaros',
		'aclacos',
		'aclpermissions',
		'tsilabus_akademik',
		'tsilabus_mingguan_kelases'
	);

	function beforeFilter() {
		if($this->RequestHandler->isAjax()){
			//Configure::write('debug', 0);
		}

		if ($this->params['controller'] == 'pages') {
			$this->layout = 'page';
		}

		$this->Auth->autoRedirect = false;
		$logined = false;

		// auth configuration
		$this->Auth->userScope = array ('User.ENABLED_USER' => 1);
		$this->Auth->loginAction = '/users/login';
		$this->Auth->logoutRedirect = '/users/login';
		$this->Auth->fields = array (
			'username' => 'USERNAME',
			'password' => 'PASSWORD'
		);
		$this->Auth->authorize = 'controller';

		if (in_array(low($this->params['controller']), $this->publicControllers)) {
			$this->Auth->allow();
		}
		$this->auth = $this->Session->read('User');

		if ($this->auth && array_key_exists('User', $this->auth)) {
			$groupname = low($this->auth['User']['TYPE']);
			$currentPath = '/'.$this->params['controller'].'/'.$this->params['action'];

			if(!($mainMenu = Cache::read('MainMenu'))){
				$mainMenu = $this->_getMainMenu();
				Cache::write('MainMenu',$mainMenu);
			}

			// get parent path
			$this->loadModel('Link');
			$this->Link->unbindModel(array('hasAndBelongsToMany'=>array('Group'),'belongsTo'=>array('Parentlink'),'hasMany'=>array('Childlink')));
			$currentLink = $this->Link->find('first',array('fields'=>'Link.*','conditions'=>array('Link.path'=>$currentPath,'Link.parent_id IS NOT NULL')));
			$subMenu = array();
			$this->loadModel('Group');

			foreach($mainMenu as $mm){
				if($mm['id'] === $currentLink['Link']['parent_id']){
					if(!($subMenu = Cache::read('SubMenu'.$mm['id']))){
						$this->Group->Behaviors->attach('Containable');
						$this->Group->contain("Link.parent_id = {$mm['id']}");
						$conditions = array('Group.name'=>low($this->auth['User']['TYPE']));
						$group = $this->Group->find('first', array('conditions'=>$conditions));
						$subMenu = $group['Link'];
						Cache::write('SubMenu'.$mm['id'], $subMenu);
					}
					break;
				}
			}

			$this->set('mainMenu',$mainMenu);
			$this->set('subMenu',$subMenu);

			$this->set('currentPath', $currentPath);
			$this->set('currentLink', $currentLink);
			$logined = true;
			$this->set('username', $this->auth['User']['USERNAME']);
			$this->set('groupname', $groupname);
			$this->set('isDosenWali',$this->Session->read('isDosenWali'));
		}
		//Set param passed
		Configure::write( array(
								'App.logined' => $logined,
								'Paginator.params' => $this->params['named'],
								'Paginator.limit' => $this->paginate['limit'],
								) );

        // get active configuration
        $this->loadConfiguration();
		$this->set('logined', $logined);
		$this->set("params",$this->params['named']);
	}

    function loadConfiguration() {
        $option = ClassRegistry::init('Option')->find('first');
        Configure::write(array(
                          'App.ttahun_ajaran_id' => $option['Option']['ttahun_ajaran_id'],
                          'App.tsemester_id' => $option['Option']['tsemester_id'],
                          'App.tkurikulum_id' => $option['Option']['tkurikulum_id'],
                         ));
    }

	function _getMainMenu(){
		$conditions = array('Group.name'=>low($this->auth['User']['TYPE']));

		$this->loadModel('Group');
		$this->Group->Behaviors->attach('Containable');
		$this->Group->contain('Link.parent_id IS NULL');

		$group = $this->Group->find('first', array('conditions'=>$conditions));

		return $group['Link'];
	}

    function isAuthorized() {
        return true;
    }

    function _extractGet() {
        $param = array();
        foreach($_GET as $key => $value) {
            if($key != 'url')
                $param[] = "$key=$value";
        }
        $param = implode("&", $param);
        return $param;
    }
}
