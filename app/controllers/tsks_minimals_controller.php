<?php
class TsksMinimalsController extends AppController {

	var $name = 'Tsks_minimals';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Jsax');

	function index() {
		$this->TsksMinimal->recursive = 0;
		$this->set('Tsks_minimals', $this->paginate('TsksMinimal'));
		//pr($this->paginate('TsksMinimal'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->TsksMinimal);
		}
		$this->TsksMinimal->recursive =2;
		$jurusan = $this->TsksMinimal->Tjurusan->find('list');
		 $this->loadModel('Refdetil');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('program',$jenjang_studi);
		$this->set(compact('jurusan'));
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->TsksMinimal);
		} else {
			$this->data = $this->TsksMinimal->read(null, $id);
		}
		$this->TsksMinimal->recursive =2;
		$jurusan = $this->TsksMinimal->Tjurusan->find('list');
		 $this->loadModel('Refdetil');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('program',$jenjang_studi);
		$this->set(compact('jurusan'));
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['TsksMinimal']['id'], $this->TsksMinimal);
		}else{
			$this->Jsax->confirmDelete($id, $this->TsksMinimal);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->TsksMinimal, array("TsksMinimal.id"=>$this->data['ids']));
	}

}
?>
