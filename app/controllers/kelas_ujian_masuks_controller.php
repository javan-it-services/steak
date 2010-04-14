<?php
class KelasUjianMasuksController extends AppController {

	var $name = 'KelasUjianMasuks';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->KelasUjianMasuk->recursive = 0;
		
		if(isset($this->data['Filter'])) {
			$conditions = array();
			foreach($this->data['Filter'] as $key => $value) {
				if(!empty($value)) {
					$conditions["KelasUjianMasuk.$key"] = $value;
				}
			}
			$this->paginate = array(
				'conditions' => $conditions
			);
		}
	
		$this->set('kelasUjianMasuks', $this->paginate());
		$this->set('gelombang',$this->KelasUjianMasuk->GelombangPendaftaran->getList());
		$this->set('jenis',$this->KelasUjianMasuk->JenisNilaiPendaftaran->find('list'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid KelasUjianMasuk.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->KelasUjianMasuk->recursive = 2;
		$this->set('kelasUjianMasuk', $this->KelasUjianMasuk->read(null, $id));
	}
	
	function cetak($id)
	{
		
		$this->view($id);
		$this->render(null,"pdf","cetak");
	}

	function add() {
		if (!empty($this->data)) {
			$this->KelasUjianMasuk->create();
			if ($this->KelasUjianMasuk->save($this->data)) {
				$this->Session->setFlash(__('The KelasUjianMasuk has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KelasUjianMasuk could not be saved. Please, try again.', true));
			}
		}
		$tcalonMahasiswas = $this->KelasUjianMasuk->TcalonMahasiswa->find('list');
		$gelombangPendaftarans = $this->KelasUjianMasuk->GelombangPendaftaran->find('list');
		$jenisNilaiPendaftarans = $this->KelasUjianMasuk->JenisNilaiPendaftaran->find('list');
		$truangKuliahs = $this->KelasUjianMasuk->TruangKuliah->find('list');
		$this->set(compact('tcalonMahasiswas', 'gelombangPendaftarans', 'jenisNilaiPendaftarans','truangKuliahs'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid KelasUjianMasuk', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->KelasUjianMasuk->save($this->data)) {
				$this->Session->setFlash(__('The KelasUjianMasuk has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KelasUjianMasuk could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->KelasUjianMasuk->read(null, $id);
		}
		$tcalonMahasiswas = $this->KelasUjianMasuk->TcalonMahasiswa->find('list');
		$gelombangPendaftarans = $this->KelasUjianMasuk->GelombangPendaftaran->find('list');
		$jenisNilaiPendaftarans = $this->KelasUjianMasuk->JenisNilaiPendaftaran->find('list');
		$truangKuliahs = $this->KelasUjianMasuk->TruangKuliah->find('list');
		$this->set(compact('tcalonMahasiswas','gelombangPendaftarans','jenisNilaiPendaftarans','truangKuliahs'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for KelasUjianMasuk', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->KelasUjianMasuk->del($id)) {
			$this->Session->setFlash(__('KelasUjianMasuk deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
