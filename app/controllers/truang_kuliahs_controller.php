<?php
class TruangKuliahsController extends AppController {

	var $name = 'TruangKuliahs';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->TruangKuliah->recursive = 0;
		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["TruangKuliah.$key LIKE"] = "%".trim($value)."%";
                    
                }
            }
            $this->paginate = array('conditions' => $conditions);
        }
		$this->set('truangKuliahs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TruangKuliah.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('truangKuliah', $this->TruangKuliah->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TruangKuliah->create();
			if ($this->TruangKuliah->save($this->data)) {
				$this->Session->setFlash(__('The TruangKuliah has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TruangKuliah could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TruangKuliah', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TruangKuliah->save($this->data)) {
				$this->Session->setFlash(__('The TruangKuliah has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TruangKuliah could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TruangKuliah->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TruangKuliah', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TruangKuliah->del($id)) {
			$this->Session->setFlash(__('TruangKuliah deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>