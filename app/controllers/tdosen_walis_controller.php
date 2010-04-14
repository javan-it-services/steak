<?php
class TdosenWalisController extends AppController {

	var $name = 'TdosenWalis';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $uses = array ();

	function index() {
		$this->loadModel('Tdosen');
		$this->Tdosen->recursive = 0;
		if(isset($this->data['Filter'])) {
	      $conditions = array();
	      foreach($this->data['Filter'] as $key => $value) {
		  if(!empty($value)) {
		      $conditions["Tdosen.$key LIKE"] = "%".trim($value)."%";
		  }
	      }

	  }

	  $conditions[] = "Tdosen.NIP_DOSEN in (select distinct NIP_WALI from tmahasiswas)";

	  $this->paginate = array(
				  'conditions' => $conditions
			  );
		$this->set('tdosens', $this->paginate('Tdosen'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TdosenWali.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->loadModel('Tdosen');
		$this->Tdosen->recursive=0;
		$dosen = $this->Tdosen->read(null, $id);
		$this->set('tdosen', $dosen);
		$this->loadModel('Option');
		$data=$this->Option->find('first');
		$this->Tdosen->Tmahasiswa->recursive = 1;
		$this->Tdosen->Tmahasiswa->hasMany['FormStudi']['conditions'] = array('ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'tsemester_id'=>$data['Option']['tsemester_id']);
		$this->set('mahasiswas',$this->Tdosen->Tmahasiswa->find("all",array(
			"conditions"=>array("NIP_WALI"=>$dosen['Tdosen']['NIP_DOSEN']),
			'fields'=>array('Tmahasiswa.NIM','Tmahasiswa.NAMA')
			)));

	}

	function v_dosen($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid TdosenWali.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tdosen', $this->Tdosen->read(null, $id));

	}

	function setuju($NIM) {
		$this->layout="ajax";
		$this->loadModel('Option');
		$data=$this->Option->find('first');
		$this->loadModel('FormStudi');
		$data = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$data['Option']['tsemester_id'])));
		$data['FormStudi']['status']="Setuju";
		$this->FormStudi->save($data);
		$this->FormStudi->recursive = 3;
		$data=$this->Option->find('first');
		$form_studis = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$data['Option']['tsemester_id'])));
		//pr($form_studis);
		$this->set('form_studis',$form_studis);

	}
	function tolak($NIM) {
		$this->layout="ajax";
		$this->loadModel('Option');
		$this->loadModel('FormStudi');
		$data=$this->Option->find('first');
		$data = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$data['Option']['tsemester_id'])));
		$data['FormStudi']['status']="Tolak";
		$this->FormStudi->save($data);
		$this->FormStudi->recursive = 3;
		$data=$this->Option->find('first');
		$form_studis = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$data['Option']['tsemester_id'])));
		//pr($form_studis);
		$this->set('form_studis',$form_studis);

	}

	function isi_notes($NIM) {
		$this->layout="ajax";
		$this->set('NIM',$NIM);
		//pr($NIM);


	}

	function add_notes($NIM){
		$this->layout="ajax";
		$this->loadModel('Option');
		$note=$this->Option->find('first');
		$this->loadModel('FormStudi');
		$form_studis = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$note['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$note['Option']['tsemester_id'])));
		$form_studis['FormStudi']['frs_notes'] = $this->data['FormStudi']['frs_notes'];
		//pr($form_studis);
		$this->FormStudi->save($form_studis);

	}

	function add() {
		if (!empty($this->data)) {
			$this->TdosenWali->create();
			if ($this->TdosenWali->save($this->data)) {
				$this->Session->setFlash(__('The TdosenWali has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TdosenWali could not be saved. Please, try again.', true));
			}
		}
		$tmahasiswas = $this->TdosenWali->Tmahasiswa->find('list');
		$tdosens = $this->TdosenWali->Tdosen->find('list');
		$ttahunAjarans = $this->TdosenWali->TtahunAjaran->find('list');
		$this->set(compact('tmahasiswas', 'tdosens', 'ttahunAjarans'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TdosenWali', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TdosenWali->save($this->data)) {
				$this->Session->setFlash(__('The TdosenWali has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TdosenWali could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TdosenWali->read(null, $id);
		}
		$tmahasiswas = $this->TdosenWali->Tmahasiswa->find('list');
		$tdosens = $this->TdosenWali->Tdosen->find('list');
		$ttahunAjarans = $this->TdosenWali->TtahunAjaran->find('list');
		$this->set(compact('tmahasiswas', 'tdosens', 'ttahunAjarans'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TdosenWali', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TdosenWali->del($id)) {
			$this->Session->setFlash(__('TdosenWali deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function history_mahasiswa($NIM) {
		$this->layout="ajax";
		$this->loadModel('Option');
		$data=$this->Option->find('first');
		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 2;
		$form_studis_lulus = $this->KartuStudi->find('all',array ('conditions'=>array('FormStudi.NIM'=>$NIM,'status_lulus'=>"LULUS",'concat(FormStudi.ttahun_ajaran_id,FormStudi.tsemester_id) <>'=>$data['Option']['ttahun_ajaran_id'].$data['Option']['tsemester_id'])));
		$form_studis_tidak = $this->KartuStudi->find('all',array ('conditions'=>array('FormStudi.NIM'=>$NIM,'status_lulus'=>"TIDAK LULUS",'concat(FormStudi.ttahun_ajaran_id,FormStudi.tsemester_id) <>'=>$data['Option']['ttahun_ajaran_id'].$data['Option']['tsemester_id'])));
		$this->set('form_studis_lulus',$form_studis_lulus);
		$this->set('form_studis_tidak',$form_studis_tidak);
		$this->set("NIM",$NIM);
	}

	function frs_mahasiswa($NIM) {
		$this->layout="ajax";
		$this->loadModel('Option');
		$data=$this->Option->find('first');
		$this->loadModel('FormStudi');
		$this->FormStudi->recursive = 3;
		$form_studis = $this->FormStudi->find('first',array ('conditions'=>array('FormStudi.NIM'=>$NIM, 'FormStudi.ttahun_ajaran_id'=>$data['Option']['ttahun_ajaran_id'],'FormStudi.tsemester_id'=>$data['Option']['tsemester_id'])));
		$this->set('form_studis',$form_studis);
		$this->set("NIM",$NIM);
	}

	function view_dosen($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TdosenWali.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Tdosen->create();
			$auth = $this->Session->read("Auth");
			$option = $this->Option->find('first');
			$nip = $auth["User"]["USERNAME"];
			$this->set('tdosen', $this->Tdosen->read(null, $nip));
	}



}
?>
