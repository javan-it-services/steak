<?php

class KelasDosenController extends AppController
{
	var $uses = array();
    var $helpers = array("Ajax","Fpdf");
    var $components = array("RequestHandler");

    function index(){
    	$this->loadModel('User');
    	$user = $this->Session->read("Auth");
    	$nip= $user['User']['USERNAME'];
        $this->loadModel('Tkelase');
        $this->loadModel('Tdosen');
		$dosen = $this->Tdosen->findByNipDosen($nip);
		$conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1);
		$this->loadModel('Option');
		$option= $this->Option->find('all');
		$this->loadModel('Tkelase');
		$this->Tkelase->recursive = 0;
        $conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1, "Tkelase.TTAHUN_AJARAN_ID" => $option['0']['Option']['ttahun_ajaran_id'], "Tkelase.TSEMESTER_ID"=>$option['0']['Option']['tsemester_id']);
		$kelas = $this->Tkelase->find("all", array("conditions"=>$conditions));
        

		
        if(!empty($this->data)){			
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}elseif(!empty($this->params['named'])) {
            $conditions = array();
            $conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1);
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tkelase.$key LIKE"] = "%".trim($value)."%";
                }
            }
            
            $this->paginate = array_merge($this->paginate, array('conditions' => $conditions));
			
        }else{
        	$this->loadModel('Option');
			$option = $this->Option->find("first");
			$this->data['Filter']['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
			$this->data['Filter']['TSEMESTER_ID'] =	$option['Option']['tsemester_id'];
			$conditions['TTAHUN_AJARAN_ID'] = 	$option['Option']['ttahun_ajaran_id'];
			$conditions['TSEMESTER_ID'] = 	$option['Option']['tsemester_id'];
			$this->paginate = array_merge($this->paginate, array('conditions' => $conditions));
		}
        
        $this->loadModel('Tkelase');
		$ttahunajarans = $this->Tkelase->TtahunAjaran->find('list');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$this->set(compact('ttahunajarans','tsemesters','option','dosen'));
		$this->set('kelas', $this->paginate('Tkelase'));    
    


    }

    function view_mahasiswa($k){
    	$this->loadModel('FormStudi');
		$this->FormStudi->hasMany["KartuStudi"]["conditions"] =array("kelas_id"=>$k);
		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 2;
    	$formstudis = $this->KartuStudi->find('all',array('conditions' => array('KartuStudi.kelas_id' => $k)));
    	$this->set(compact('formstudis'));
    	
    }

    function view_jadwal($k){
    	$this->loadModel('Jadwal');
    	$tjadwalKuliahs=$this->Jadwal->find('all',array ('conditions' => array('Jadwal.kelas_id' => $k)));
    	$this->set(compact('tjadwalKuliahs'));
    	//pr($tjadwalKuliahs);
    }

}
