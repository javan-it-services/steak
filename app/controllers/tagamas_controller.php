<?php
class TagamasController extends AppController {

	var $name = 'Tagamas';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Jsax');

	function index() {
		$this->Tagama->recursive = 0;
		$this->set('tagamas', $this->paginate('Tagama'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tagama);
		}
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tagama);
		} else {
			$this->data = $this->Tagama->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tagama']['AGAMA_ID'], $this->Tagama);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tagama);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tagama, array("Tagama.AGAMA_ID"=>$this->data['ids']));
	}

}
?>
