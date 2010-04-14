<?php
class FormStudisController extends AppController {

	var $name = 'FormStudis';
	var $uses = array("FormStudi","Tmatakuliah","Option");

	var $helpers = array (
		'Html',
		'Form',
		'Ajax',
		'Fpdf','Ksm'
	);

	function index() {
		$this->FormStudi->recursive = 0;
		$this->set('formStudis', $this->paginate());
		


	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FormStudi.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('formStudi', $this->FormStudi->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FormStudi->create();
			if ($this->FormStudi->save($this->data)) {
				$this->Session->setFlash(__('The FormStudi has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FormStudi could not be saved. Please, try again.', true));
			}
		}
		$ttahunAjarans = $this->FormStudi->TtahunAjaran->find('list');
		$tsemesters = $this->FormStudi->Tsemester->find('list');
		$this->set(compact('ttahunAjarans', 'tsemesters'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FormStudi', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
			if ($this->FormStudi->save($this->data)) {
				$this->Session->setFlash(__('The FormStudi has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FormStudi could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FormStudi->read(null, $id);
		}
		$ttahunAjarans = $this->FormStudi->TtahunAjaran->find('list');
		$tsemesters = $this->FormStudi->Tsemester->find('list');
		$this->set(compact('ttahunAjarans','tsemesters'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FormStudi', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FormStudi->del($id)) {
			$this->Session->setFlash(__('FormStudi deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	function cetakKSM() {
		$this->loadModel('Refdetil');
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$tjurusans = null; //$this->Tmatakuliah->Tjurusan->find('list');


		$this->set(compact('tfakultases', 'tprograms', 'tjurusans'));
	}
	function get_ksm() {
		$this->layout="ajax";
		$option = $this->Option->find('first');

		$conditions = array (
			"Tmahasiswa.TJURUSAN_ID"=>$this->data["JURUSAN"],
			"FormStudi.tsemester_id" => $option['Option']['tsemester_id'],
			"FormStudi.ttahun_ajaran_id" => $option['Option']['ttahun_ajaran_id']
		);
		$FormStudi = $this->FormStudi->find("all",array("conditions"=>$conditions));

		$this->set('formStudis', $this->paginate());
		$this->render();
	}
	function cetak_pdf($nim=null) {
		$this->layout = 'pdf'; //this will use the pdf.thtml layout
		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 3;
//		$auth = $this->Session->read('Auth');
		$option = $this->Option->find('first');
			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");
		
//		$nim = $auth['User']['USERNAME'];
		$this->loadModel('Tmahasiswa');
		$mahasiswa = $this->Tmahasiswa->findByNim($nim);
		$conditions = array (
			'FormStudi.NIM' => $nim,
			'FormStudi.tsemester_id' => $semester_aktif,
			'FormStudi.ttahun_ajaran_id' => $tahun_ajaran_aktif
		);
		
		$kartuStudis = $this->KartuStudi->find('all', array (
			'conditions' => $conditions
		));
		//pr($kartuStudis);
		$this->set('kartuStudis', $kartuStudis);
		$this->set('mahasiswa', $mahasiswa);
		$this->render();
	}
	
	function cetak($id) {
		$this->layout="ajax";
		$this->FormStudi->create();
		$fs = $this->FormStudi->findById($id);
		$fs['FormStudi']["status_ksm"] = 1;

		$this->FormStudi->save($fs);

		$this->render();
	}
}
?>