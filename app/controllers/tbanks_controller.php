<?php
class TbanksController extends AppController {

	var $name = 'Tbanks';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Jsax');

	function index() {
		$this->Tagama->recursive = 0;
		$this->set('Tbanks', $this->paginate('Tbank'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tbank);
		}
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tbank);
		} else {
			$this->data = $this->Tbank->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tbank']['id'], $this->Tbank);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tbank);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tbank, array("Tbank.id"=>$this->data['ids']));
	}

}
?>
