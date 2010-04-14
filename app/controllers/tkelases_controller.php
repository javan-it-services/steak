<?php
class TkelasesController extends AppController {

	var $name = 'Tkelases';
	//var $uses = array('Tkelase','Tmatakuliah','Tjurusan','Jadwal','Option','KartuStudi');
	var $helpers = array('Html', 'Form','Ajax');

	function index() {
		if(!empty($this->data)){			
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}elseif(!empty($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tkelase.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			
			$this->data['Filter'] = $this->params['named'];
        }
		else{
			$this->loadModel('Option');
			$option = $this->Option->find("first");
			$this->data['Filter']['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
			$this->data['Filter']['TSEMESTER_ID'] =	$option['Option']['tsemester_id'];
			$conditions['TTAHUN_AJARAN_ID'] = 	$option['Option']['ttahun_ajaran_id'];
			$conditions['TSEMESTER_ID'] = 	$option['Option']['tsemester_id'];
			
			$this->paginate = array_merge($this->paginate, array (
				'conditions' => $conditions,

			));
		}
		
		
		$this->loadModel('Tkelase');
		$ttahunajarans = $this->Tkelase->TtahunAjaran->find('list');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$this->set(compact('ttahunajarans','tsemesters'));
		$this->set('tkelases', $this->paginate('Tkelase'));
		//pr($this->paginate);
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tkelase.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tkelase', $this->Tkelase->read(null, $id));
		$param = array(
			"conditions" => array("kelas_id"=>$id)
		);
		$this->loadModel('KartuStudi');
		$this->set("matkuls",$this->KartuStudi->find("all",$param));
	}
	

	function add() {
		if (!empty($this->data)) {
			$this->Tkelase->create();
			if ($this->Tkelase->save($this->data)) {
				$this->flash(__('Tkelase saved.', true), array('action'=>'index'));
			} else {
			}
		}
		$this->loadModel('Tmatakuliah');
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$tjurusans = null;
		$this->loadModel('Tkelase');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$tmatakuliahs = null;//$this->Tkelase->Tmatakuliah->find('list', array('conditions'=> array('IS_BUKA'=>"1")));
		$ttahunAjarans = $this->Tkelase->TtahunAjaran->find('list');
		$tdosens = $this->Tkelase->Tdosen->find('list');
		$this->set(compact('tsemesters', 'tmatakuliahs', 'ttahunAjarans', 'tdosens','tfakultases','tprograms','tjurusans'));
		$this->loadModel('Option');
		$this->Option->recursive = -1;		
		$option = $this->Option->find("first");
		$this->data['Tkelase']['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
		$this->data['Tkelase']['TSEMESTER_ID'] = $option['Option']['tsemester_id'];		
	}
	

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Tkelase', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tkelase->save($this->data)) {
				$this->flash(__('The Tkelase has been saved.', true), array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tkelase->read(null, $id);
		}
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$tmatakuliahs = $this->Tkelase->Tmatakuliah->find('list', array('conditions'=> array('IS_BUKA'=>"1")));
		$ttahunAjarans = $this->Tkelase->TtahunAjaran->find('list');
		$tdosens = $this->Tkelase->Tdosen->find('list');
		$this->set(compact('tsemesters','tmatakuliahs','ttahunAjarans','tdosens'));
	}

	
	
	function getkelas() {
		$this->layout="ajax";

		$conditions = array();
		if(!empty($this->data['Tkelase']['KD_KULIAH'])){
			$conditions['Tkelase.KD_KULIAH'] = $this->data['Tkelase']['KD_KULIAH'];
		}
		if(!empty($this->data['Tkelase']['TSEMESTER_ID'])){
			$conditions['Tkelase.TSEMESTER_ID'] = $this->data['Tkelase']['TSEMESTER_ID'];
		}
		if(!empty($this->data['Tkelase']['TTAHUN_AJARAN_ID'])){
			$conditions['Tkelase.TTAHUN_AJARAN_ID'] = $this->data['Tkelase']['TTAHUN_AJARAN_ID'];
		
		}
		$this->loadModel('Tmatakuliah');
		$this->Tmatakuliah->recursive = 0;
		$tmatakuliahs = $this->Tmatakuliah->findByKdKuliah($this->data['Tkelase']['KD_KULIAH']);
		$tkelases = $this->Tkelase->find('all', 
					array ('conditions'=>$conditions));
		$this->set(compact('tkelases','tmatakuliahs'));
	}
	
	function tambah(){
		$this->layout='ajax';
		if (!empty($this->data)) {
			$this->Tkelase->create();
			if ($this->Tkelase->save($this->data)) {
			} else {
			}
		}
		
		$this->getkelas();
		$this->render("getkelas");
	}
	
	function delete($id = null) {
		$this->layout='ajax';
		$this->data = $this->Tkelase->findById($id);
		$conditions = array();
		if(!empty($this->data['Tkelase']['KD_KULIAH'])){
			$conditions['Tkelase.KD_KULIAH'] = $this->data['Tkelase']['KD_KULIAH'];
		}
		if(!empty($this->data['Tkelase']['TSEMESTER_ID'])){
			$conditions['Tkelase.TSEMESTER_ID'] = $this->data['Tkelase']['TSEMESTER_ID'];
		}
		if(!empty($this->data['Tkelase']['TTAHUN_AJARAN_ID'])){
			$conditions['Tkelase.TTAHUN_AJARAN_ID'] = $this->data['Tkelase']['TTAHUN_AJARAN_ID'];
		
		}
		$this->loadModel('Tmatakuliah');
		$this->Tmatakuliah->recursive = 0;
		$tmatakuliahs = $this->Tmatakuliah->findByKdKuliah($this->data['Tkelase']['KD_KULIAH']);
		$tkelases = $this->Tkelase->find('all', 
					array ('conditions'=>$conditions));
		$this->set(compact('tkelases','tmatakuliahs'));
		$this->Tkelase->del($id);
		$this->getkelas();
		$this->render("getkelas");
		//$this->redirect(array('action'=>'index'));
	}

	function getmatkuls(){
		$this->layout="ajax";
		$this->loadModel('Tmatakuliah');
		$matkuls = $this->Tmatakuliah->find("list",array("conditions"=>array(
				"Tmatakuliah.JURUSAN"=>$this->data['JURUSAN'] )));
		$this->set(compact('matkuls'));
	}
	function getjurusan() {
		$this->layout="ajax";
		$this->loadModel('Tjurusan');
		$tjurusans = $this->Tjurusan->find('list', array ('conditions'=>array('Tjurusan.program_studi_id'=>$this->data['Filter']['PROGRAM_STUDI'],'Tjurusan.fakultas'=>$this->data['Filter']['FAKULTAS'])));
		$this->set(compact('tjurusans'));
	}
	function jadwal($id){
		$this->layout="ajax";
		$tkelases = $this->Tkelase->findById($id);
		$this->loadModel('Jadwal');
		$jadwals = $this->Jadwal->find('all',array("conditions"=>array("kelas_id"=>$id)));
		$twaktuses = $this->Jadwal->Twaktus->find('list');
		$truangKuliahs = $this->Jadwal->TruangKuliah->find('list');
		$this->set(compact('jadwals','tkelases', 'twaktuses', 'truangKuliahs'));
	}
	function tambahjadwal(){
		$this->layout="ajax";
		$this->loadModel('Jadwal');
		$this->Jadwal->create();
		$this->Jadwal->save($this->data);
		$jadwals = $this->Jadwal->find('all',array("conditions"=>array("kelas_id"=>$this->data['Jadwal']['kelas_id'])));
		$this->set(compact('jadwals'));
		$this->viewPath = 'elements' . DS . 'jadwal';
		$this->render('list');
	}
	
	
	
	
	
}
?>