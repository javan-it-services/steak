<?php
class TwaktusesController extends AppController {

	var $name = 'Twaktuses';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Twaktus->recursive = 0;
		$this->set('twaktuses', $this->paginate());
	}

	

	function add() {
		if (!empty($this->data)) {
			$this->Twaktus->create();
			if ($this->Twaktus->save($this->data)) {
				$this->flash(__('Twaktus saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Twaktus', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Twaktus->save($this->data)) {
				$this->flash(__('The Twaktus has been saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Twaktus->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Twaktus', true), array('action'=>'index'));
		}
		if ($this->Twaktus->del($id)) {
			$this->flash(__('Twaktus deleted', true), array('action'=>'index'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>