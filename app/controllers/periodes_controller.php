<?php
class PeriodesController extends AppController {

	var $name = 'Periodes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Periode->recursive = 0;
		$this->set('periodes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Periode', true), array('action'=>'index'));
		}
		$this->set('periode', $this->Periode->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Periode->create();
			if ($this->Periode->save($this->data)) {
				$this->flash(__('Periode saved.', true), array('action'=>'index'));
			} else {
			}
		}
		$ttahunAjarans = $this->Periode->TtahunAjaran->find('list');
		$tsemesters = $this->Periode->Tsemester->find('list');
		$this->set(compact('ttahunAjarans', 'tsemesters'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Periode', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Periode->save($this->data)) {
				$this->flash(__('The Periode has been saved.', true), array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Periode->read(null, $id);
		}
		$ttahunAjarans = $this->Periode->TtahunAjaran->find('list');
		$tsemesters = $this->Periode->Tsemester->find('list');
		$this->set(compact('ttahunAjarans','tsemesters'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Periode', true), array('action'=>'index'));
		}
		if ($this->Periode->del($id)) {
			$this->flash(__('Periode deleted', true), array('action'=>'index'));
		}
	}

}
?>