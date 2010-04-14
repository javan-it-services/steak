<?php

class TjadwalMkController extends AppController {
    
    var $name = 'TjadwalMk';
    var $helpers = array('Html', 'Form', 'Ajax');
   // var $uses = array("Tmatakuliah","TrencanaKuliahMingguan","Tkelase","Jadwal");
    
    var $uses = array();
    function index() { 
    	$this->loadModel('TsilabusAkademik');
            $this->TsilabusAkademik->recursive = 0;
	    	$params = null;
            //if filtered
            if (isset ($this->data['Filter'])) {
				$url = array ('action' => 'index');
				foreach ($this->data['Filter'] as $key => $value) {
					$url[$key] = $value;
				}
				$this->redirect($url);
	    	}
            $conditions = array();
            if (!empty($this->params['named'])) {
                    foreach ($this->params['named'] as $key => $value) {
                            if ($key!="page"&&$key!="sort"&&$key!="direction") {					
                                    $conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
                            }
                    }		
                    $this->data['Filter']=$this->params['named'];			
            }
            $this->loadModel('Tmatakuliah');
            $this->set('tsilabusAkademiks', $this->Tmatakuliah->find('all',array('conditions' => $conditions, 'order' =>'Tmatakuliah.SIFAT, Tmatakuliah.semester')));  
            //Get list of faculty/programs/division
            $tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
            $tprograms = $this->Tmatakuliah->Tprogram->find('list');
            $tjurusans = $this->Tmatakuliah->Tjurusan->find('list',$params);
            $this->set(compact('tfakultases', 'tprograms', 'tjurusans'));

            if (($tfakultases != "") || ($tprograms != "")) {
                    $this->set("lblforeignkey", "Jurusan");
            }
    }

    function view($id = null) {
            if (!$id) {
                    $this->flash(__('Invalid TsilabusAkademik', true), array('action'=>'index'));
            }
            $this->loadModel('Tmatakuliah');
            //find the description of the college record
            $this->set('tsilabusMatakuliah', $this->Tmatakuliah->read(null, $id));
            $this->loadModel('TrencanaKuliahMingguan');
            $this->set('tjadwalmgg', $this->TrencanaKuliahMingguan->find('all',
                                array ('conditions' => array( 'TrencanaKuliahMingguan.THN' => date('Y'),
                                                              'TrencanaKuliahMingguan.KODE_MK' => $id),
                                       'order'=> 'TrencanaKuliahMingguan.MINGGU_KE')));
    }
    
    function jadwal($id) {
		$this->layout = "ajax";
		$this->loadModel('Tkelase');
		$tkelases = $this->Tkelase->findById($id);
		$this->loadModel('Jadwal');
		$jadwals = $this->Jadwal->find('all', array (
			"conditions" => array (
				"kelas_id" => $id
			)
		));
		$twaktuses = $this->Jadwal->Twaktus->find('list');
		$truangKuliahs = $this->Jadwal->TruangKuliah->find('list');
		$this->set(compact('jadwals', 'tkelases', 'twaktuses', 'truangKuliahs'));
	}
}
?>