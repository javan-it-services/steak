<?php
class PresencesController extends AppController {

	var $name = 'Presences';
	var $helpers = array('Html', 'Form','Ajax');
	//var $uses = array('Tkelase','Tmatakuliah','Tjurusan','Jadwal','Option','KartuStudi','Presence','Mahasiswa','FormStudi', 'Pertemuan', 'Tdosen');

	function index() {


		$this->Presence->recursive = 0;
		$this->set('presences', $this->paginate());
		$this->loadModel('Tmatakuliah');
        $tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');

		$tjurusans = null;
		$this->loadModel('Tkelase');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$tmatakuliahs = null;
		$ttahunAjarans = $this->Tkelase->TtahunAjaran->find('list');
		$this->loadModel('Jadwal');
        $truangkuliahs = $this->Jadwal->TruangKuliah->find('list');
		$this->set(compact('tsemesters', 'tmatakuliahs', 'ttahunAjarans', 'truangkuliahs','tfakultases','tprograms','tjurusans'));
	}

    function rekaps(){
        $this->layout='ajax';

        if(!empty($this->data)){
        	$this->Presence->recursive = 2;
            $mahasiswa = $this->Presence->query('select distinct(nim) as nim from
                            presences A inner join pertemuans B on A.pertemuan_id=B.id
                            where kelas_id='.$this->data['Presence']['kelas_id']);
                $rekaps = array();
            	$idx = 0;
            foreach($mahasiswa as $mhs){

                $rekaps[$idx]['NIM'] = $mhs['A']['nim'];

                $rekap_masuk = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'m\') A inner join
                            (select id from pertemuans B where kelas_id='.$this->data['Presence']['kelas_id'].') B on A.pertemuan_id=B.id
                            ');

                $rekap_ijin = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'i\') A inner join
                            (select id from pertemuans B where kelas_id='.$this->data['Presence']['kelas_id'].') B on A.pertemuan_id=B.id
                            ');
                $rekap_alpha = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'a\') A inner join
                            (select id from pertemuans B where kelas_id='.$this->data['Presence']['kelas_id'].') B on A.pertemuan_id=B.id
                            ');

                $rekaps[$idx]['m'] = $rekap_masuk['0']['0']['jumlah'];
                $rekaps[$idx]['i'] = $rekap_ijin['0']['0']['jumlah'];
                $rekaps[$idx]['a'] = $rekap_alpha['0']['0']['jumlah'];
                $idx++;
            }
            $this->set('rekaps',$rekaps);
        }

    }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Presence.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('presence', $this->Presence->read(null, $id));
	}

	function add($id=null) {
		if (!empty($this->data)) {
			//pr($this->data);
            for($i=1;$i<=count($this->data['id']);$i++){

                $data['Presence']['id']  = $this->data['id'][$i];
                $data['Presence']['keterangan'] = $this->data['keterangan'][$i];

           		$this->Presence->save($data);
            }
            $this->loadModel('Pertemuan');
            $ket = $this->data['Pertemuan']['status_dosen'];
            $this->data['Pertemuan']['status_dosen'] = $ket;
            if(!empty($this->data['Pertemuan']['id'])){
            	$this->Pertemuan->save($this->data['Pertemuan']);
            }else{
            	
            }

        }

		$this->loadModel('Tmatakuliah');
        $tfakultases = $this->Tmatakuliah->Tfakultase->find('list');

		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');

		$tjurusans = null;
		$this->loadModel('Tkelase');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$tmatakuliahs = null;
		$ttahunAjarans = $this->Tkelase->TtahunAjaran->find('list');
		$this->loadModel('Jadwal');
        $truangkuliahs = $this->Jadwal->TruangKuliah->find('list');
		$this->set(compact('tsemesters', 'tmatakuliahs', 'ttahunAjarans', 'truangkuliahs','tfakultases','tprograms','tjurusans'));

	}

	function edit($id = null) {


		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Presence', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Presence->save($this->data)) {
				$this->Session->setFlash(__('The Presence has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Presence could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Presence->read(null, $id);
		}
		$pertemuans = $this->Presence->Pertemuan->find('list');
		$this->set(compact('pertemuans'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Presence', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Presence->del($id)) {
			$this->Session->setFlash(__('Presence deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


    function getmatkuls(){
		$this->layout="ajax";
		$this->loadModel('Tmatakuliah');
		$matkuls = $this->Tmatakuliah->find("list",array("conditions"=>array(
				"Tmatakuliah.JURUSAN"=>$this->data['JURUSAN'] )));

		$this->set(compact('matkuls'));
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
		$this->loadModel('Tkelase');
        $this->Tkelase->recursive = 0;
		$tmatakuliahs = $this->Tmatakuliah->findByKdKuliah($this->data['Tkelase']['KD_KULIAH']);
		$tkelases = $this->Tkelase->find('list', array ('conditions'=>$conditions,'fields'=>array('NAMA_KELAS')));
		$this->set(compact('tkelases','tmatakuliahs'));
	}

    function getjurusan() {
		$this->layout="ajax";
		$this->loadModel('Tjurusan');
		$tjurusans = $this->Tjurusan->find('list', array ('conditions'=>array('Tjurusan.program_studi_id'=>$this->data['Filter']['program_studi_id'],'Tjurusan.fakultas'=>$this->data['Filter']['FAKULTAS'])));
		$this->set(compact('tjurusans'));
	}

     function getstudents() {
		$this->layout="ajax";
		$this->loadModel('FormStudi');
        $this->FormStudi->recursive = '1';
       	
        $this->FormStudi->hasMany["KartuStudi"]["conditions"] = array('KartuStudi.kelas_id'=>$this->data['Presence']['kelas_id']);
		$formstudis = $this->FormStudi->find('all');
        $this->Presence->Pertemuan->recursive = '0';
		
         $this->loadModel('Tkelase');
        $get_dosen = $this->Tkelase->find('all',array('conditions'=>array('Tkelase.id'=>$this->data['Presence']['kelas_id'])));
        
        $pertemuans= $this->Presence->Pertemuan->find('all',array('fields'=>array('id','tanggal','jam'),'conditions'=>array('kelas_id'=>$this->data['Presence']['kelas_id'])));
        $data_pertemuans = array();
        foreach($pertemuans as $pertemuan){
            $data_pertemuans[$pertemuan['Pertemuan']['id']] = $pertemuan['Pertemuan']['tanggal'].' ('.$pertemuan['Pertemuan']['jam'].')';
        }
		$this->set(compact('formstudis'));
        $this->set('data_pertemuans',$data_pertemuans);
        $this->set('get_dosens', $get_dosen);
	}

	function getpertemuan() {
		$this->layout = "ajax";
        $this->Presence->recursive = 3;
        //pr($this->data);
        $pertemuans = $this->Presence->find('all',array('conditions' => array('Presence.pertemuan_id'=>$this->data['Presence']['pertemuan_id'])));
		//pr($pertemuans);
        $this->loadModel('Tkelase');
        $dosen_id = $pertemuans['0']['Pertemuan']['Tkelase']['Tdosen']['NAMA_DOSEN'];
        $status_dosen = $pertemuans['0']['Pertemuan']['status_dosen'];
        //$get_dosen = $this->Tkelase->find('all',array('conditions'=>array('Tkelase.id'=>$this->data['Presence']['kelas_id'])));
        
        //pr($pertemuans);
        $this->set('pertemuans', $pertemuans);
		$this->set('get_dosens', $dosen_id);
		$this->set('status', $status_dosen);
	}


	function viewmasuk($nim){
		$this->layout = 'ajax';
		$this->Presence->recursive = 2;
		$waktu = $this->Presence->find('all', array('conditions' => array('Presence.nim' => $nim, 'Presence.keterangan' => 'm')));
		$NIM = $waktu['0']['Presence']['nim'];
		$this->set('waktu', $waktu);
		$this->set('NIM', $NIM);
	}

	function viewijin($nim){
		$this->layout = 'ajax';
		$this->Presence->recursive = 2;
		$waktu = $this->Presence->find('all', array('conditions' => array('Presence.nim' => $nim, 'Presence.keterangan' => 'i')));
		$NIM = $waktu['0']['Presence']['nim'];
		$this->set('waktu', $waktu);
		$this->set('NIM', $NIM);

	}

	function viewalpa($nim){
		$this->layout = 'ajax';
		$this->Presence->recursive = 2;
		$waktu = $this->Presence->find('all', array('conditions' => array('Presence.nim' => $nim, 'Presence.keterangan' => 'a')));
		$NIM = $waktu['0']['Presence']['nim'];
		$this->set('waktu', $waktu);
		$this->set('NIM', $NIM);

	}

	function kehadiran(){
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
			$url = array("action"=>"kehadiran");
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

	function daftar_hadir($id = null){
        $this->layout='ajax';
        	$this->Presence->recursive = 2;
            $mahasiswa = $this->Presence->query('select distinct(nim) as nim from
                            presences A inner join pertemuans B on A.pertemuan_id=B.id
                            where kelas_id='.$id);
            $rekaps = array();
            $idx = 0;
            foreach($mahasiswa as $mhs){
                $rekaps[$idx]['NIM'] = $mhs['A']['nim'];
                $rekap_masuk = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'m\') A inner join
                            (select id from pertemuans B where kelas_id='.$id.') B on A.pertemuan_id=B.id
                            ');
                $rekap_ijin = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'i\') A inner join
                            (select id from pertemuans B where kelas_id='.$id.') B on A.pertemuan_id=B.id
                            ');
                $rekap_alpha = $this->Presence->query('select count(A.id) as jumlah  from
                            (select id,pertemuan_id from presences where nim=\''.$mhs['A']['nim'].'\' and keterangan=\'a\') A inner join
                            (select id from pertemuans B where kelas_id='.$id.') B on A.pertemuan_id=B.id
                            ');

                $rekaps[$idx]['m'] = $rekap_masuk['0']['0']['jumlah'];
                $rekaps[$idx]['i'] = $rekap_ijin['0']['0']['jumlah'];
                $rekaps[$idx]['a'] = $rekap_alpha['0']['0']['jumlah'];
                $idx++;
            }
            $this->set('rekaps',$rekaps);
			$this->set('id',$id);
    }



    function add_absen($id = null) {
		$this->set('id', $id);
		if (!empty($this->data)) {
			if(!empty($this->data['Presence']['pertemuan_id'])){
	         	for($i=1;$i<=count($this->data['nim']);$i++){
                $data['Presence']['nim'] = $this->data['nim'][$i];
                $data['Presence']['pertemuan_id'] = $this->data['Presence']['pertemuan_id'];
                $data['Presence']['keterangan'] = $this->data['keterangan'][$i];
           		$this->Presence->create();
           		$this->Presence->save($data);
	         	}

            	$this->redirect(array('action'=>'kehadiran'));
			}else{
				$this->set("error","Pertemuan Harus Diisi");
			}
    	}

		$this->loadModel('KartuStudi');
        $this->KartuStudi->recursive = 2;
       	$kartustudis = $this->KartuStudi->find('all',array('conditions' => array('KartuStudi.kelas_id' => $id)));
       	$this->set('kartustudis',$kartustudis);
        $pertemuans= $this->Presence->Pertemuan->find('all',array('fields'=>array('id','tanggal','jam'),'conditions'=>array('kelas_id'=>$id)));
        $data_pertemuans = array();
        foreach($pertemuans as $pertemuan){
            $data_pertemuans[$pertemuan['Pertemuan']['id']] = $pertemuan['Pertemuan']['tanggal'].' ('.$pertemuan['Pertemuan']['jam'].')';
        }
		$this->set(compact('formstudis'));
        $this->set('data_pertemuans',$data_pertemuans);


	}

}
?>
