<?php
class TkurikulumsController extends AppController {

	var $name = 'Tkurikulums';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Tkurikulum->recursive = 0;
		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["Tkurikulum.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array(
				'conditions' => $conditions
			);
        }
		$this->set('tkurikulums', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tkurikulum->create();
			if ($this->Tkurikulum->save($this->data)) {
				$this->Session->setFlash(__('The Tkurikulum has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tkurikulum could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tkurikulum', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tkurikulum->save($this->data)) {
				$this->Session->setFlash(__('The Tkurikulum has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tkurikulum could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tkurikulum->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tkurikulum', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tkurikulum->del($id)) {
			$this->Session->setFlash(__('Tkurikulum deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
