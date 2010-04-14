<?php
class TperlengkapansController extends AppController {

	var $name = 'Tperlengkapans';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Jsax');

	function index() {
		$this->Tperlengkapans->recursive = 0;
		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["Tperlengkapan.$key LIKE"] = "%".trim($value)."%";

                }
            }
            $this->paginate = array('conditions' => $conditions);
        }
		$this->set('tperlengkapans', $this->paginate('Tperlengkapan'));
		$gelombang = $this->Tperlengkapan->GelombangPendaftaran->find('list');
		$this->set(compact('gelombang'));
	}

	function add() {
		$this->loadModel('Configuration');
		$gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');

		if (!empty($this->data)) {
			$this->data['Tperlengkapan']['gelombang_id']= $gelombangId;
			$this->Jsax->save($this->data['Tperlengkapan'], $this->Tperlengkapan);
		}
		 $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
		$gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa', 'jenisNilai','gelombangs','ruang','noreg', 'gelombang'));
        $this->set('gid', $gelombang_id);
	}

	function edit($id = null) {
		$this->loadModel('Configuration');
		$gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');

		if (!empty($this->data)) {
			$this->data['Tperlengkapan']['gelombang_id']= $gelombangId;
			$this->Jsax->save($this->data, $this->Tperlengkapan);
		} else {
			$this->data = $this->Tperlengkapan->read(null, $id);
		}
		 $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
		$gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa', 'jenisNilai','gelombangs','ruang','noreg', 'gelombang'));
        $this->set('gid', $gelombang_id);
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tperlengkapan']['id'], $this->Tperlengkapan);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tperlengkapan);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tagama, array("Tperlengkapan.id"=>$this->data['ids']));
	}

}
?>
