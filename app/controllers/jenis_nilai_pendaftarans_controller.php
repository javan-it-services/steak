<?php
class JenisNilaiPendaftaransController extends AppController {

	var $name = 'JenisNilaiPendaftarans';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->JenisNilaiPendaftaran->recursive = 0;

		$this->loadModel('Option');
		$option = $this->Option->find('first');

		$conditions = array ();
		$conditions['GelombangPendaftaran.ttahun_ajaran_id'] = $option['Option']['ttahun_ajaran_id'];
		$tahun_selected  = $option['Option']['ttahun_ajaran_id'];

		if (isset ($this->data['Filter'])) {
			$conditions['GelombangPendaftaran.ttahun_ajaran_id'] = $this->data['Filter']['ttahun_ajaran_id'];
			$tahun_selected  = $this->data['Filter']['ttahun_ajaran_id'];
		}
		$this->paginate = array (
			'conditions' => $conditions,
		);


		$this->set('jenisNilaiPendaftarans', $this->paginate());
		$this->set('tahun_selected', $tahun_selected);
		$ttahunAjarans = $this->JenisNilaiPendaftaran->GelombangPendaftaran->TtahunAjaran->find('list');
		$this->set(compact('ttahunAjarans'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid JenisNilaiPendaftaran.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('jenisNilaiPendaftaran', $this->JenisNilaiPendaftaran->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->JenisNilaiPendaftaran->create();
			if ($this->JenisNilaiPendaftaran->save($this->data)) {
				$this->Session->setFlash(__('The JenisNilaiPendaftaran has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JenisNilaiPendaftaran could not be saved. Please, try again.', true));
			}
		}
		$gelombangPendaftarans = $this->JenisNilaiPendaftaran
					->GelombangPendaftaran
					->getList();
		$this->set(compact('gelombangPendaftarans'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid JenisNilaiPendaftaran', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->JenisNilaiPendaftaran->save($this->data)) {
				$this->Session->setFlash(__('The JenisNilaiPendaftaran has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JenisNilaiPendaftaran could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->JenisNilaiPendaftaran->read(null, $id);
		}
		$gelombangPendaftarans = $this->JenisNilaiPendaftaran
					->GelombangPendaftaran
					->find('list',array('fields' => array('GelombangPendaftaran.nomor')));
		$this->set(compact('gelombangPendaftarans'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for JenisNilaiPendaftaran', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->JenisNilaiPendaftaran->del($id)) {
			$this->Session->setFlash(__('JenisNilaiPendaftaran deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
