<?php
class TjabatansController extends AppController {

	var $name = 'Tjabatans';
	var $helpers = array('Html', 'Form');
	var $uses = array();
	var $components = array('Jsax');

	function index() {
		$this->loadModel('Tjabatan');
		$this->paginate = array_merge(
							$this->paginate,
							array(
								'conditions' => array('Refmaster.code' => '02'),
								'fields' => array('Tjabatan.*')
							)
						);
		$tjabatans = $this->paginate('Tjabatan');
        $this->set('tjabatans', $tjabatans);
	}

	function add() {
		$this->loadModel('Tjabatan');
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tjabatan, array('redirect'=>array('action'=>'index')));
		}
	}

	function edit($id = null) {
		$this->loadModel('Tjabatan');
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tjabatan, array('redirect'=>array('action'=>'index')));
		} else {
			$this->data = $this->Tjabatan->read(null, $id);
		}
	}

	function delete($id = null) {
		$this->loadModel('Tjabatan');
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tjabatan']['id'], $this->Tjabatan);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tjabatan);
		}
	}

	function deleteBulk () {
		$this->loadModel('Tjabatan');
		$this->Jsax->deleteAll($this->Tjabatan, array("Tjabatan.id"=>$this->data['ids']));
	}

}
?>
