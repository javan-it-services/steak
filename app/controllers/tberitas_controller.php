<?php

class TberitasController extends AppController {

	var $name = 'Tberitas';
	var $helpers = array('Html', 'Form','Tinymce');
	

	function index() {
		$this->Tberita->recursive = 0;
		
		$this->paginate = array("order"=>"created DESC,JUDUL_BERITA DESC"
		);
		$this->set('tberitas', $this->paginate());
	}

	function view($id = null, $front=null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tberita.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('tberita', $this->Tberita->read(null, $id));
		
		if($front)$this->layout = 'front';
		
	}
	
	function viewberita($id = null, $front=null) {
		
		$this->Tberita->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tberita.', true));
			$this->redirect(array('action'=>'index'));
		}
	
		
		
		$this->set('tberita', $this->Tberita->read(null, $id));
		
	}

	function add() {
		//pr($this->data);
		if (!empty($this->data)) {
			$auth = $this->Session->read('Auth');
			$this->data['Tberita']['USER_ENTRY_BERITA'] = $auth['User']['USERNAME'];
			$this->Tberita->create();
			if ($this->Tberita->save($this->data)) {
				//$this->Tberita->saveField("created",now());
				$this->Session->setFlash(__('The Tberita has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tberita could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tberita', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tberita->save($this->data)) {
				$this->Session->setFlash(__('The Tberita has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tberita could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tberita->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tberita', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tberita->del($id)) {
			$this->Session->setFlash(__('Tberita deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allowedActions = array ("view");
	}

}
?>