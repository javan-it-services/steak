<?php
class TfakultasesController extends AppController {

	var $name = 'Tfakultases';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Tfakultase->recursive = 0;
		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["Tfakultase.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array(
				'conditions' => $conditions
			);
        }
		$this->set('tfakultases', $this->paginate());
	}

	

	function add() {
		if (!empty($this->data)) {
			$this->Tfakultase->create();
			if ($this->Tfakultase->save($this->data)) {
				$this->Session->setFlash(__('The Tfakultase has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tfakultase could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tfakultase', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tfakultase->save($this->data)) {
				$this->Session->setFlash(__('The Tfakultase has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tfakultase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tfakultase->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tfakultase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tfakultase->del($id)) {
			$this->Session->setFlash(__('Tfakultase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>