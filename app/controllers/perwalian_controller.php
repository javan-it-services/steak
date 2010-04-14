<?php
class PerwalianController extends AppController {

	var $name = 'Perwalian';
	var $uses = array("TtahunAjaran","Tmahasiswa");
	var $helpers = array('Html', 'Form', 'Ajax');
	function index($angkatan=null) {
		if($angkatan){
			$this->Tmahasiswa->recursive = 2;
			$wali = $this->Session->read("Auth");
			//pr($wali);			
			$this->set("mahasiswas",$this->Tmahasiswa->find('all',array("conditions"=>array("Tmahasiswa.TTAHUN_AJARAN_ID"=>$angkatan, "NIP_WALI"=>$wali["User"]['USERNAME']))));
		}
		else{
			if(!empty($this->data)){
				$angkatan_id = $this->data['Perwalian']['angkatan'];
				$this->redirect("index/$angkatan_id");
			}
		}
		$this->data['Perwalian']['angkatan'] = $angkatan;
		$this->set("angkatans",$this->TtahunAjaran->find("list"));
	}
	
	function view_mahasiswa(){
		$this->loadModel('User');
    	$user = $this->Session->read("Auth");
    	$nip= $user['User']['USERNAME'];
		$this->loadModel('Tdosen');
		$this->Tdosen->recursive=0;
		$dosen = $this->Tdosen->read(null, $nip);
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


}
?>
