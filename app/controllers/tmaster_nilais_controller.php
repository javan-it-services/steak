<?php
class TmasterNilaisController extends AppController {

	var $name = 'TmasterNilais';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->TmasterNilai->recursive = 0;
		$conditions = array();
		if(isset($this->data['Filter'])) {	      
	      foreach($this->data['Filter'] as $key => $value) {
			if(!empty($value)) {
				$conditions["TmasterNilai.$key LIKE"] = "%".trim($value)."%";
			}
	      }
		}
		$this->paginate = array_merge($this->paginate, array('conditions' => $conditions, "order" => array("TmasterNilai.kode"=>"ASC")
			  ));
		$this->set('tmasterNilais', $this->paginate());
		//pr($this->paginate);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TmasterNilai.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tmasterNilai', $this->TmasterNilai->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TmasterNilai->create();
			if ($this->TmasterNilai->save($this->data)) {
				$this->Session->setFlash(__('The TmasterNilai has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TmasterNilai could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TmasterNilai', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TmasterNilai->save($this->data)) {
				$this->Session->setFlash(__('The TmasterNilai has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TmasterNilai could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TmasterNilai->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TmasterNilai', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TmasterNilai->del($id)) {
			$this->Session->setFlash(__('TmasterNilai deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>