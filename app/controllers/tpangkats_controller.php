<?php
class TpangkatsController extends AppController {

	var $name = 'Tpangkats';
	var $helpers = array('Html', 'Form');
	var $components = array('Jsax');

	function index() {
		$this->Tpangkat->recursive = 0;
		$this->set('tpangkats', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tpangkat, array('redirect'=>array('action'=>'index')));
		}
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tpangkat, array('redirect'=>array('action'=>'index')));
		} else {
			$this->data = $this->Tpangkat->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tpangkat']['PANGKAT_ID'], $this->Tpangkat);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tpangkat);
		}

	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tpangkat, array("Tpangkat.PANGKAT_ID"=>$this->data['ids']));
	}

}
?>
