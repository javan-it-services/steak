<?php
class TmahasiswasController extends AppController { 

	var $name = 'Tmahasiswas';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $primaryKey = 'NIM';


	function index() {
		$this->loadModel('Tmahasiswa');
		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->loadModel('Tmahasiswa');
		$this->Tmahasiswa->recursive = 0;
		if(!empty($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tmahasiswa.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $this->params['named'];
        }
        
		$ttahunAjarans = $this->Tmahasiswa->TtahunAjaran->find('list');
        $tfakultases = $this->Tmahasiswa->Tfakultase->find('list');
        $tprograms = $this->Tmahasiswa->Tprogram->find('list');
        $tjurusans = $this->Tmahasiswa->Tjurusan->find('list');;
        $this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set(compact('ttahunAjarans','tfakultases', 'tprograms', 'tjurusans'));
		$this->set('tmahasiswas', $this->paginate('Tmahasiswa'));
		//pr($this->paginate);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tmahasiswa.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tmahasiswa', $this->Tmahasiswa->read(null, $id));
		$this->set('id', $id);
	}
	
	function paket_matkul(){
		$this->loadModel('TmataKuliah');
		
	}

	function add($id=null) {
			$this->loadModel('Tmahasiswa');
			$this->loadModel('TcalonMahasiswa');
		if(!empty($this->data)){
                    	$this->data['Tmahasiswas']['NIM'] = $this->data['Tmahasiswa']['NIM'];
			$this->data['Tmahasiswas']['NO_REGISTRASI'] = $this->data['Tmahasiswas']['NO_REGISTRASI'];
			$this->loadModel('Tambil');
			$save_jur = $this->Tambil->find('all',array('conditions'=>array('Tambil.NO_REGISTRASI'=> $this->data['Tmahasiswas']['NO_REGISTRASI'])));
			$ambil_jurusan = $save_jur['0']['Tambil']['TJURUSAN_ID'];
			
			$this->data['Tmahasiswas']['TJURUSAN_ID'] = $ambil_jurusan;
			if($this->Tmahasiswa->save($this->data['Tmahasiswas'])){		
			$daftar = 1;
			$this->data['TcalonMahasiswa']['NO_REGISTRASI'] = $this->data['Tmahasiswas']['NO_REGISTRASI'];
			$this->data['TcalonMahasiswa']['daftar_ulang'] = $daftar;
			$this->TcalonMahasiswa->save($this->data);

                        if(!empty($this->data['Tmahasiswas']['diskon'])){
                            $this->loadModel('Tdiskon');
                            $this->data['Tdiskon']['NO_REGISTRASI'] = $this->data['Tmahasiswas']['NO_REGISTRASI'];
                            $this->data['Tdiskon']['diskon'] = $this->data['Tmahasiswas']['diskon'];
                            $this->Tdiskon->save($this->data);
                        }else{
                            
                        }
			$this->loadModel('Tmatakuliah');
			$MataKuliah = $this->Tmatakuliah->find('all',array('conditions'=>array('Tmatakuliah.jurusan'=>$ambil_jurusan)));
                        
                        $this->set('MataKuliah', $MataKuliah);
			$this->set('nim', $this->data['Tmahasiswa']['NIM']);
			
			$jur = $this->Tmahasiswa->find('all',array('conditions'=>array('Tmahasiswa.NO_REGISTRASI'=>$this->data['Tmahasiswas']['NO_REGISTRASI'])));
			$this->set('jurusan',$jur);

                             $this->loadModel('Tjurusan');
                             $jurusan = $this->Tjurusan->find('first', array("conditions"=>array('Tjurusan.kodejurusan'=>$jur['0']['TcalonMahasiswa']['TJURUSAN_ID'])));
                             $this->set("jur", $jurusan);

			}

                       
		}
				$param = $this->_extractGet();
	if (empty($this->data)) {
			$this->data = $this->Tmahasiswa->read(null, $id);
			//pr($this->data);
		}
	
			
		$this->loadModel('Tmahasiswa');
		$ttahunAjarans = $this->Tmahasiswa->TtahunAjaran->find('list');
		$tagamas = $this->Tmahasiswa->Tagama->find('list');
		$tfakultases = $this->Tmahasiswa->Tfakultase->find('list');
		$tprograms = $this->Tmahasiswa->Tprogram->find('list');
		$tjurusans = $this->Tmahasiswa->Tjurusan->find('list');
		//$tpropinsis = $this->Tmahasiswa->Tpropinsi->find('list');
		//$tkabupatens = $this->Tmahasiswa->Tkabupaten->find('list');
		$tdosens = $this->Tmahasiswa->Tdosen->find('list');
		$tkelases = $this->Tmahasiswa->Tkelase->find('list');
		$this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set(compact('tagamas', 'tfakultases', 'tprograms','tjurusans','tpropinsis','tkabupatens','tdosens','ttahunAjarans','tkelases','status_aktif','param'));
	}

        function simpan_ksm(){
            $this->loadModel('Tambil');
            $save_jur = $this->Tambil->find('all',array('conditions'=>array('Tambil.NO_REGISTRASI'=> $this->data['Tmahasiswa']['NO_REGISTRASI'])));
            $ambil_jurusan = $save_jur['0']['Tambil']['TJURUSAN_ID'];

            $this->loadModel('Tmatakuliah');
            $MataKuliah = $this->Tmatakuliah->find('all',array('conditions'=>array('Tmatakuliah.jurusan'=>$ambil_jurusan)));

             if($this->data['Tmahasiswa']['ambil']=="ambil"){

//save KRS
                            $this->loadModel('FormStudi');
                            $tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
                            $semester_aktif = Configure::read("App.tsemester_id");

                            $conditions = array (
				'FormStudi.NIM' => $this->data['Tmahasiswa']['NIM'],
				'FormStudi.tsemester_id' => $semester_aktif,
				'FormStudi.ttahun_ajaran_id' => $tahun_ajaran_aktif
			);
			$FormStudi = $this->FormStudi->find('first',array('conditions'=>$conditions));

			if (empty ($FormStudi['FormStudi'])) {

				$FormStudi['FormStudi']['NIM'] = $this->data['Tmahasiswa']['NIM'];

				$FormStudi['FormStudi']['tsemester_id'] = $semester_aktif;
				$FormStudi['FormStudi']['ttahun_ajaran_id'] = $tahun_ajaran_aktif;

				$this->FormStudi->save($FormStudi);
				$FormStudi_id = $this->FormStudi->getInsertId();
			} else {
				$FormStudi_id = $FormStudi['FormStudi']['id'];
			}

			foreach ($MataKuliah as $kelas) {
			$this->loadModel('Tkelases');
                        $kelas_id = $this->Tkelases->find('first',array("conditions"=>array('Tkelases.KD_KULIAH'=>$kelas['Tmatakuliah']['KD_KULIAH'])));
                        //pr($kelas_id);

				if (!empty($kelas_id)) {
                                        $this->loadModel('KartuStudi');
					$KartuStudi = array ();
					$KartuStudi['id'] = null;
					$KartuStudi['form_studi_id'] = $FormStudi_id;
					//pr($kelas['KartuStudi']['kelas_id']);
					$KartuStudi['kelas_id'] = $kelas_id['Tkelases']['ID'];

					$this->KartuStudi->save($KartuStudi);
				}
			}
			//end save KRS

                        }
                        $this->redirect(array('action'=>'index'));
        }

	function cetak_ksm($format=null) {
		
		//pr($this->params);exit;
       
        $gelombang_id = $ruang = $noreg = 0;

        if(isset($this->params['url']['gelombang']) && $this->params['url']['gelombang'] != null){
            $gelombang_id = $this->params['url']['gelombang'];
        } else {
            $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
        if(isset($this->params['url']['TJURUSAN_ID'])){
            $jurusan = $this->params['url']['TJURUSAN_ID'];
        }

        if(isset($this->params['url']['NO_REGISTRASI'])){
            $noreg = $this->params['url']['noreg'];
        }
		
		 $conditions = array('gelombang_id' => $gelombang_id);
        if($ruang){
            $conditions[] = "namaJurusan LIKE '%$jurusan%' ";
        }
        if($noreg){
            $conditions[] = "NO_REGISTRASI LIKE '%$noreg%' ";
        }

        $param = $this->_extractGet();
       $this->loadModel('Tmatakuliah');
       $ambil_jurusan = explode("-", $this->params['pass']['1']);
			$MataKuliah = $this->Tmatakuliah->find('all',array('conditions'=>array('Tmatakuliah.program_studi_id'=>$ambil_jurusan[0],'Tmatakuliah.jurusan'=>$ambil_jurusan[1])));
			//pr($MataKuliah);
		
        //$listMahasiswa = $this->TcalonMahasiswa->getAllWithNilai($gelombang_id, $ruang, $noreg);
		//$listMahasiswa = $this->TcalonMahasiswa->getlist($noreg, $jurusan);
		//pr($listMahasiswa);
       // $jenisNilai = $this->JenisNilaiPendaftaran->find('all', array('conditions' => array('gelombang_pendaftaran_id' => $gelombang_id), 'order' => 'JenisNilaiPendaftaran.id'));
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('MataKuliah', 'jenisNilai','gelombangs','ruang','noreg', 'gelombang', 'param'));
        $this->set('gid', $gelombang_id);
		$this->set('MataKuliah', $MataKuliah);
        if($format == 'pdf') {
            $this->render(null,"pdf","lap_list");
        }

    }

	

	function edit($id = null) {
	
		$this->loadModel('Tmahasiswa');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tmahasiswa', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
				if ($this->Tmahasiswa->save($this->data['Tmahasiswa'])) {
				$this->Session->setFlash(__('The Tmahasiswa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tmahasiswa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tmahasiswa->read(null, $id);
			//pr($this->data);
		}
                $tperguruan = $this->Tmahasiswa->Tperguruan_tinggi->find('list');
		$tagamas = $this->Tmahasiswa->Tagama->find('list');
		$tfakultases = $this->Tmahasiswa->Tfakultase->find('list');
		$tprograms = $this->Tmahasiswa->Tprogram->find('list');
		$tjurusans = $this->Tmahasiswa->Tjurusan->find('list');
		$tdosens = $this->Tmahasiswa->Tdosen->find('list');
		$ttahunAjarans = $this->Tmahasiswa->TtahunAjaran->find('list');
		$tkelases = $this->Tmahasiswa->Tkelase->find('list');
		$this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set('id', $id);
		$this->set(compact('tperguruan','tagamas', 'tfakultases', 'tprograms','tjurusans','tpropinsis','tkabupatens','tdosens','ttahunAjarans','tkelases'));
	}

	function delete($id = null) {
		$this->loadModel('Tmahasiswa');
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tmahasiswa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tmahasiswa->del($id)) {
			$this->Session->setFlash(__('Tmahasiswa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function getkabupaten() {
		$this->loadModel('Tmahasiswa');
		$this->layout="ajax";
		$tkabupatens = $this->Tmahasiswa->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tmahasiswa']['KD_PROP_ALAMAT'])));
		$this->set(compact('tkabupatens'));

	}

	function getkabupatenasal() {
		$this->loadModel('Tmahasiswa');
		$this->layout="ajax";
		$tkabupatens = $this->Tmahasiswa->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tmahasiswa']['KD_PROP_ASAL'])));
		$this->set(compact('tkabupatens'));

	}

	function getkabupatenlahir() {
		$this->loadModel('Tmahasiswa');
		$this->layout="ajax";
		$tkabupatens = $this->Tmahasiswa->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tmahasiswa']['KD_PROP_LAHIR'])));
		$this->set(compact('tkabupatens'));

	}

	function upload(){
		$session = $this->Session;
		$this->layout = 'ajax';
		$filename = $this->data['Tmahasiswa']['file_foto']['name'];
		$this->set("filename",$filename);
		if(move_uploaded_file($this->data['Tmahasiswa']['file_foto']['tmp_name'],WWW_ROOT.'files/'.$filename)){
		}
		else{
		}
	}

	function ajax_upload(){
		$this->layout = 'ajax';
		Configure::write('debug', 0);
		$filename = $_FILES['file']['name'];
		echo $_FILES['file']['tmp_name'];
		if (move_uploaded_file($_FILES['file']['tmp_name'], WWW_ROOT .'files/'.$filename)) {
			echo $filename;
		}
	}

	function getnim(){
		$this->loadModel('Tmahasiswa');
		$this->loadModel('TcalonMahasiswa');
		$this->loadModel('TtahunAjaran');
		$this->layout = 'ajax';
		$this->loadModel('TtahunAjaran');
		$this->loadModel('Configuration');
		$gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');

		$kode = $this->TtahunAjaran->query("SELECT a.nama FROM ttahun_ajarans a, gelombang_pendaftarans b
										   WHERE b.ttahun_ajaran_id = a.id and b.id='".$gelombangId."'");
		
		$id_thn = $kode['0']['a']['nama'];
		
		$mhs = $this->TcalonMahasiswa->find('first', array( 'order' => 'TcalonMahasiswa.NO_REGISTRASI DESC'));
		$last_reg = $mhs['TcalonMahasiswa']['NO_REGISTRASI'];
	
		$noUrut = (int) substr($last_reg, 6, 8);
		$noUrut++;
 
		//$newID = $kodeAng."".$id_thn.sprintf("%02s", $noUrut);
		
		$countkodeAng = strlen($gelombangId);
		$countid_thn = strlen($id_thn);
		//$countjur = strlen($jur);
		$countxnim = strlen($noUrut);
		if($countkodeAng == 2){
			$gelombangId = $gelombangId;
		}else if($countkodeAng == 1){
			$gelombangId = '0'.$gelombangId;
		}

		/*if($countid_thn == 2){
			$id_thn = $id_thn;
		}else if($countid_thn = 1){
			$id_thn = '0'. $id_thn;
		}*/
		
		if($countxnim == 3){
			$noUrut = $noUrut;
		}else if($countxnim == 2){
			$noUrut = '0'.$noUrut;
		}else if($countxnim == 1){
			$noUrut = '00'.$noUrut;
		}

		$reg = $gelombangId.$id_thn.$noUrut;
		$this->set('reg', $reg);
	}

	function getjurusan() {
		$this->layout="ajax";
		$this->loadModel('Tjurusan');
		$tjurusans = $this->Tjurusan->find('list', array ('conditions'=>array('Tjurusan.programStudi'=>$this->data['Filter']['TPROGRAM_ID'],'Tjurusan.fakultas'=>$this->data['Filter']['TFAKULTAS_ID'])));
		$this->set(compact('tjurusans'));
	}
	function getregistrasi() {
		$this->loadModel('TcalonMahasiswa');
		$this->loadModel('GelombangPendaftaran');
		$this->loadModel('TtahunAjaran');
		$this->layout = 'ajax';
		
		//pr($this->GelombangPendaftaran);
		$this->loadModel('GelombangPendaftaran');
		$kode = $this->GelombangPendaftaran->query("SELECT c.* FROM ttahun_ajarans c, gelombang_pendaftarans a, options b where a.ttahun_ajaran_id = b.ttahun_ajaran_id and c.id = b.ttahun_ajaran_id");
		pr($kode);
		
		$kodeAng = $kode['0']['c']['kodeAngkatan'];
		$id_thn = $kode['0']['c']['id'];
		$t = $kode['0']['c']['nama'];
		
		
		$prog=$this->data['Tmahasiswa']['TPROGRAM_ID'];
		$fak=$this->data['TcalonMahasiswa']['TFAKULTAS_ID'];
		$jur=$this->data['Tmahasiswa']['TJURUSAN_ID'];
		$thn=$this->data['TcalonMahasiswa']['TTAHUN_AJARAN_ID'];
		$tahuns = $this->TcalonMahasiswa->TtahunAjaran->find('first', array('conditions' => array('TtahunAjaran.id' => $thn)));
		$tahun = $tahuns['TtahunAjaran']['kodeAngkatan'];
		
		//$mhs = $this->TcalonMahasiswa->find('first', array('conditions' => array('TcalonMahasiswa.TJURUSAN_ID' => $jur, 'TcalonMahasiswa.TPROGRAM_ID' => $prog) ,'order' => 'Tmahasiswa.NIM DESC'));
		//pr($this->data);
		$mhs = $this->TcalonMahasiswa->find('last');
		//pr($mhs);
		$last_reg = $mhs['Tmahasiswa']['NO_REGISTRASI'];
		$start = strrpos($lastnim, $kodeAng);
		$no_urut = substr($lastnim, $start+2);
		$xnim = $no_urut + 1;
		$countkodeAng = strlen($kodeAng);
		$countid_thn = strlen($id_thn);
		$countjur = strlen($jur);
		$countxnim = strlen($xnim);
		if($countkodeAng == 2){
			$kodeAng = $kodeAng;
		}else if($countkodeAng == 1){
			$kodeAng = '0'.$kodeAng;
		}

		if($countid_thn == 2){
			$id_thn = $id_thn;
		}else if($countid_thn = 1){
			$id_thn = '0'. $id_thn;
		}

		if($countjur == 2 ){
		$jur = $jur;
		}else if($countjur == 1){
			$jur = '0'. $jur;
		}

		if($countxnim == 3){
			$snim = $xnim;
		}else if($countxnim == 2){
			$snim = '0'.$xnim;
		}else if($countxnim == 1){
			$snim = '00'.$xnim;
		}

		$reg = $kodeAng.$id_thn.$snim;
		$this->set('no_registrasi', $reg);
	}



}
?>
