<?php
class OptionsController extends AppController {

	var $name = 'Options';
	var $helpers = array('Html', 'Form');

	function index() {
        $id = 1;
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Option', true), array('action'=>'index'));
		}
        $this->loadModel('Configuration');
		if (!empty($this->data)) {
			if ($this->Option->save($this->data)) {
                $this->Configuration->setValue('gelombangPendaftaranId', $this->data['Configuration']['gelombang_pendaftaran_id']);
				$this->flash(__('The Option has been saved.', true), array('action'=>'index'));
				$this->redirect(array("action"=>"index"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Option->read(null, $id);
		}
        $gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');
		$ttahunAjarans = $this->Option->TtahunAjaran->find('list');
		$tsemesters = $this->Option->Tsemester->find('list');
		$tkurikulums = $this->Option->Tkurikulum->find('list');
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
		$this->set(compact('ttahunAjarans','tsemesters','tkurikulums', 'gelombangs', 'gelombangId'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Option', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Option->save($this->data)) {
				$this->flash(__('The Option has been saved.', true), array('action'=>'index'));
				$this->redirect(array("action"=>"index"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Option->read(null, $id);
		}
		$ttahunAjarans = $this->Option->TtahunAjaran->find('list');
		$tsemesters = $this->Option->Tsemester->find('list');
		$tkurikulums = $this->Option->Tkurikulum->find('list');
		$this->set(compact('ttahunAjarans','tsemesters','tkurikulums'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Option', true), array('action'=>'index'));
		}
		if ($this->Option->del($id)) {
			$this->flash(__('Option deleted', true), array('action'=>'index'));
		}
	}

}
?>
