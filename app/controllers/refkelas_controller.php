<?php
class RefkelasController extends AppController {

	var $name = 'Refkelas';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Jsax');
	
	function index() {
		$this->Refkela->recursive = 0;
		$this->set('refkelas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Refkela.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('refkela', $this->Refkela->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Refkela);
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Refkela', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Refkela);
		}
		if (empty($this->data)) {
			$this->data = $this->Refkela->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Refkela']['id'], $this->Refkela);
		}else{
			$this->Jsax->confirmDelete($id, $this->Refkela);
		}
	}

}
?>