<?php
class GelombangPendaftaransController extends AppController {

	var $name = 'GelombangPendaftarans';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->GelombangPendaftaran->recursive = 0;
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
		
		$this->set('gelombangPendaftarans', $this->paginate());
		$this->set('tahun_selected', $tahun_selected);
		$ttahunAjarans = $this->GelombangPendaftaran->TtahunAjaran->find('list');
		$this->set(compact('ttahunAjarans'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid GelombangPendaftaran.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('gelombangPendaftaran', $this->GelombangPendaftaran->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GelombangPendaftaran->create();
			if ($this->GelombangPendaftaran->save($this->data)) {
				$this->Session->setFlash(__('The GelombangPendaftaran has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The GelombangPendaftaran could not be saved. Please, try again.', true));
			}
		}
		$ttahunAjarans = $this->GelombangPendaftaran->TtahunAjaran->find('list');
		$this->set(compact('ttahunAjarans'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid GelombangPendaftaran', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->GelombangPendaftaran->save($this->data)) {
				$this->Session->setFlash(__('The GelombangPendaftaran has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The GelombangPendaftaran could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GelombangPendaftaran->read(null, $id);
		}
		$ttahunAjarans = $this->GelombangPendaftaran->TtahunAjaran->find('list');
		$this->set(compact('ttahunAjarans'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for GelombangPendaftaran', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GelombangPendaftaran->del($id)) {
			$this->Session->setFlash(__('GelombangPendaftaran deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
