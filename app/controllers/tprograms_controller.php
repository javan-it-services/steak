<?php
class TprogramsController extends AppController {

	var $name = 'Tprograms';
	var $helpers = array('Html', 'Form');
	var $uses = array();

	function index() {

		$this->loadModel('Refmaster');
        $id = $this->Refmaster->find('first',array('conditions'=> array('Refmaster.code' => '04')));

        if(!empty($id)){
			$this->loadModel('Refdetil');
			$this->Refdetil->recursive = 0;

			$con = $this->Refdetil->find('all',array('conditions'=> array('Refdetil.refmaster_id' => $id['Refmaster']['id'])));

			$this->paginate = array(
					'conditions' => array('Refdetil.refmaster_id' => $id['Refmaster']['id'])
				);
        }
        $this->set('refdetils', $this->paginate('Refdetil'));
	}

	function add() {

		if (!empty($this->data)) {
			$this->loadModel('Refmaster');
			$this->loadModel('Tprogram');

        	$id = $this->Refmaster->find('first',array('conditions'=> array('Refmaster.code' => '04')));
			$this->data['Tprogram']['refmaster_id'] = $id['Refmaster']['id'];

			$this->Tprogram->create();
			if ($this->Tprogram->save($this->data)) {
				$this->flash(__('Jenjang studi saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		$this->loadModel('Tprogram');

		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Refdetil', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tprogram->save($this->data)) {
				$this->flash(__('The Refdetil has been saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The program studi could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tprogram->read(null, $id);
		}

		$con = $this->Tprogram->find('all',array('conditions'=> array('Tprogram.id' => $id)));

		$this->set('id', $con['0']['Tprogram']['id']);
		$this->set('kode', $con['0']['Tprogram']['code']);
		$this->set('value', $con['0']['Tprogram']['value']);

	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Refdetil', true), array('action'=>'index'));
		}
		$this->loadModel('Tprogram');
		if ($this->Tprogram->del($id)) {
			$this->flash(__('Jenjang studi deleted', true), array('action'=>'index'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
