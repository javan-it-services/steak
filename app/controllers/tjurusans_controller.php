<?php
class TjurusansController extends AppController {

	var $name = 'Tjurusans';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Tjurusan->recursive = 0;



		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["Tjurusan.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array(
				'conditions' => $conditions
			);
        }
		$this->set('tjurusans', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tjurusan.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tjurusan', $this->Tjurusan->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tjurusan->create();
			if ($this->Tjurusan->save($this->data)) {
				$this->Session->setFlash(__('The Tjurusan has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tjurusan could not be saved. Please, try again.', true));
			}
		}
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$tfakultases = $this->Tjurusan->Tfakultase->find('list');
		$this->set(compact('tprograms', 'tfakultases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tjurusan', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tjurusan->save($this->data)) {
				$this->Session->setFlash(__('The Tjurusan has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tjurusan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tjurusan->read(null, $id);
		}
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$tfakultases = $this->Tjurusan->Tfakultase->find('list');
		$this->set(compact('tprograms','tfakultases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tjurusan', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tjurusan->del($id)) {
			$this->Session->setFlash(__('Tjurusan deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
