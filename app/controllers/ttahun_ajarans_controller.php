<?php
class TtahunAjaransController extends AppController {

	var $name = 'TtahunAjarans';
	var $helpers = array (
		'Html',
		'Form',
		'Number'
	);

	function index() {
		$this->TtahunAjaran->recursive = 0;
		if (isset ($this->data['Filter'])) {
			$conditions = array ();
			foreach ($this->data['Filter'] as $key => $value) {
				if (!empty ($value)) {
					$conditions["TtahunAjaran.$key LIKE"] = "%" . trim($value) . "%";
				}
			}
			$this->paginate = array (
				'conditions' => $conditions,

			);
		}
		$this->set('ttahunAjarans', $this->paginate());
	}



	function add() {
		if (!empty ($this->data)) {
			$this->TtahunAjaran->create();
			if ($this->TtahunAjaran->save($this->data)) {
				$this->Session->setFlash(__('The TtahunAjaran has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The TtahunAjaran could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty ($this->data)) {
			$this->Session->setFlash(__('Invalid TtahunAjaran', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if (!empty ($this->data)) {
			if ($this->TtahunAjaran->save($this->data)) {
				$this->Session->setFlash(__('The TtahunAjaran has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The TtahunAjaran could not be saved. Please, try again.', true));
			}
		}
		if (empty ($this->data)) {
			$this->data = $this->TtahunAjaran->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TtahunAjaran', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if ($this->TtahunAjaran->del($id)) {
			$this->Session->setFlash(__('TtahunAjaran deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

}
?>
