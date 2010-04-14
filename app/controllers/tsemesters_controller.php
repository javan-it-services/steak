<?php
class TsemestersController extends AppController {

	var $name = 'Tsemesters';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Tsemester->recursive = 0;
		$this->set('tsemesters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tsemester', true), array('action'=>'index'));
		}
		$this->set('tsemester', $this->Tsemester->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tsemester->create();
			if ($this->Tsemester->save($this->data)) {
				$this->flash(__('Tsemester saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Tsemester', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tsemester->save($this->data)) {
				$this->flash(__('The Tsemester has been saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tsemester->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tsemester', true), array('action'=>'index'));
		}
		if ($this->Tsemester->del($id)) {
			$this->flash(__('Tsemester deleted', true), array('action'=>'index'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
