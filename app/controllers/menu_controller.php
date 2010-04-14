<?php
class MenuController extends AppController {

	var $name = 'Menu';
	var $helpers = array('Html', 'Form');
	var $uses = array('Link');

	function beforeFilter() {
		parent :: beforeFilter();
		$this->Auth->allowedActions = array (
			'*'
		);
	}
	function index(){
		$links = $this->Link->find('all', array('conditions'=>array('Link.parent_id'=>NULL)));
		$this->set(compact('links'));

	}
	function add($sub=false){
		if($this->data){
			$data = $this->data;
			if(!$sub){
				$data['Link']['is_show'] = 1;
			}

			if($this->Link->save($data)){

                if(!$sub) {
                    // reload main menu cache
                    $mainMenu = $this->_getMainMenu();
                    Cache::write('MainMenu',$mainMenu);
                } else {
                    // clear submenu
                    Cache::delete('SubMenu'.$this->data['Link']['parent_id']);
                }

				$this->Session->setFlash(__('Modul berhasil ditambah', true));
			}else{
				$this->Session->setFlash(__('Gagal', true));
			}

			$this->redirect('/menu/index');
		}
		$listGroup = $this->Link->Group->find('list');
		$listMenu = $this->_listMenu();
		$listParent = $this->Link->find('list', array('conditions'=>array('Link.parent_id'=>NULL)));
		$this->set(compact('listMenu','listParent', 'listGroup'));
	}
	function edit($id=null){
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Module Id', true), array('action'=>'index'));
		}
		if($this->data){
			$data = $this->data;

			if(!$sub){
				$data['Link']['is_show'] = 1;
			}
            $oldLink = $this->Link->read(null, $this->data['Link']['id']);
			if($this->Link->save($data)){
                if(!$sub) {
                    // reload main menu cache
                    $mainMenu = $this->_getMainMenu();
                    Cache::write('MainMenu',$mainMenu);
                } else {
                    // clear submenu
                    Cache::delete('SubMenu'.$this->data['Link']['parent_id']);
                    Cache::delete('SubMenu'.$oldLink['Link']['parent_id']);
                }
				$this->Session->setFlash(__('Modul berhasil ditambah', true));
			}else{
				$this->Session->setFlash(__('Gagal', true));
			}

			$this->redirect('/menu/index');
		}
		if (empty($this->data)) {
			$this->data = $this->Link->read(null, $id);
		}

		$listGroup = $this->Link->Group->find('list');
		$listMenu = $this->_listMenu(false);
		$listParent = $this->Link->find('list', array('conditions'=>array('Link.parent_id'=>NULL)));
		$this->set(compact('listMenu','listParent', 'listGroup'));
	}

    function delete($id) {
        $link = $this->Link->read(null, $id);
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Menu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Link->del($id)) {
            // clear submenu
            Cache::delete('SubMenu'.$link['Link']['parent_id']);
			$this->Session->setFlash(__('Menu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
    }

	function _listMenu($exclude = true) {
		$menu = array();

        $controllers = Configure::listObjects('controller');
		$controllers = array_diff($controllers,array('App','Pages'));

        $baseMethods = get_class_methods('Controller');

        if($exclude) {
            $links = $this->Link->find('all');
            $excludeLinks = array();
            foreach($links as $link) {
                $excludeLinks[] = $link['Link']['path'];
            }
        }

        // look at each controller in app/controllers
        foreach ($controllers as $ctrlName) {
            App::import('Controller', $ctrlName);
            $ctrlclass = $ctrlName . 'Controller';
            $methods = get_class_methods($ctrlclass);

            //clean the methods. to remove those in Controller and private actions.
            foreach ($methods as $k => $method) {
                if (strpos($method, '_', 0) === 0) {
                    unset($methods[$k]);
                    continue;
                }
                if (in_array($method, $baseMethods)) {
                    unset($methods[$k]);
                    continue;
                }
                if($exclude && in_array("/".Inflector::underscore($ctrlName."/".$method), $excludeLinks)) {
                    unset($methods[$k]);
                    continue;
                }
				$path = '/'.Inflector::underscore($ctrlName).'/'.$method;
				$menu[$path] = $path;
            }
        }
		ksort($menu);
		return $menu;
	}
	function check(){
		$this->autoRender = false;
	}
}
?>
