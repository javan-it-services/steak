<?php
class JvCoreController extends JavanAppController {

    var $components = array('RequestHandler');
    var $helpers = array('Ajax');
    var $uses = array();

    function menu() {
        $this->loadModel('Link');
        $menus = $this->Link->find('all', array('recursive'=>3,'conditions'=>'Link.parent_id IS NULL'));
        $this->set(compact('menus'));
    }

    function ajax_menu_add($pid=null, $edit=false){
        $this->loadModel('Link');

        if(!empty($this->data)){
			Configure::write('debug', 0);
            $this->RequestHandler->setContent('json', 'text/x-json');
            if($this->data['Link']['path']){
                $path = explode('/', $this->data['Link']['path']);
                $this->data['Link']['controller'] = $path[0];
                $this->data['Link']['action'] = $path[1];
            }
            if ($this->Link->save($this->data)) {
				$response['error'] = array("code"=>0);
				$response['redirect'] = array('action'=>'menu');
            } else {
                $errorMessages = $this->validateErrors($this->Link);
				$response['error'] = array("code"=>1, "messages"=>$errorMessages);
				$response['redirect'] = array('action'=>'menu');
            }
			$this->set(compact("response"));
			$this->render('message');
        }else{
            $reservedLinks = $this->Link->find('all', array('recursive'=>-1));
            $actions = $this->JvUtil->listActions($reservedLinks);
			$path = "";
			if($edit){
				$this->data = $this->Link->read(null, $pid);
				$pid = $this->data['Link']['parent_id'];
				$path = $this->data['Link']['controller']."/".$this->data['Link']['action'];
				$actions = am($actions, array($path=>$path));
			}
            $this->set(compact("pid","actions", "edit", "path"));
        }
    }

    function ajax_menu_delete($id){
		$this->RequestHandler->renderAs($this, "json");
		Configure::write('debug', 0);
		if(!$id){
			// error message here
		}else{
			$this->loadModel('Link');
			if($this->Link->delete($id)){
               $this->set('response', array("deleted_id"=>$id));
			}else{
				// cannot delete
			}
		}
		$this->render('message');
    }

    function order(){
        $this->autoRender = false;
        $orderedList = current($this->params['form']);
        $this->loadModel('Link');
        $position = 1;
        foreach($orderedList as $linkId){
            $this->Link->id = $linkId;
            $data['Link']['position'] = $position;
            $this->Link->save($data);
            $position++;
        }
    }
}
?>
