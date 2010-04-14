<?php
class TcalonMahasiswasController extends AppController { 

	var $name = 'TcalonMahasiswas';
	var $helpers = array('Html', 'Form', 'Ajax');
	var $primaryKey = 'NIM';

	function index($format=null) {
		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->loadModel('TcalonMahasiswa');
		$this->TcalonMahasiswa->recursive = 0;
			$input = $this->params['url'];
			$ar = array_splice($input, 2);
			//pr($ar);
		if(!empty($ar)) {
			
            $conditions = array();
            foreach($ar as $key => $value) {
            	
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["TcalonMahasiswa.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $this->params['named'];
        }
		
		if($format == 'pdf') {
            $this->render(null,"pdf","nilai_pdf");
        }
        $param = $this->_extractGet();	
         $gelombang_id = $jurusan = $noreg = $program = $nama = 0;

        if(isset($this->params['url']['gelombang_id']) && $this->params['url']['gelombang_id'] != null){
          $gelombang_id = $this->params['url']['gelombang_id'];
        } else {
          $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
      

       if(isset($this->params['url']['TJURUSAN_ID'])){
            $jurusan = $this->params['url']['TJURUSAN_ID'];
        }
        
		if(isset($this->params['url']['TPROGRAM_ID'])){
            $program = $this->params['url']['TPROGRAM_ID'];
        }

        if(isset($this->params['url']['NO_REGISTRASI'])){
            $noreg = $this->params['url']['NO_REGISTRASI'];
        }
	if(isset($this->params['url']['NAMA'])){
            $nama = $this->params['url']['NAMA'];
        }
		
        $this->loadModel('Tmahasiswa');
        $Mahasiswa_Masuk = $this->Tmahasiswa->find('all');
	      $this->set('Mahasiswa_Masuk', $Mahasiswa_Masuk);
        
		$ttahunAjarans = $this->TcalonMahasiswa->TtahunAjaran->find('list');
        $tfakultases = $this->TcalonMahasiswa->Tfakultase->find('list');
        $tprograms = $this->TcalonMahasiswa->Tprogram->find('list');
        $tjurusans = $this->TcalonMahasiswa->Tjurusan->find('list');;
        $this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->loadModel("Configuration");
		
		$gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
		$gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
                $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
                $this->set('gid', $gelombang_id);
		$this->loadModel('Tmahasiswa');
		
		$prog_fix = $this->Tmahasiswa->Tprogram->find('list');
		$jur_fix = $this->Tmahasiswa->Tjurusan->find('list');
		
		$this->loadModel('Tambil');
                
		$jurusan = $this->Tambil->find('all');
                
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set('jurusan',$jurusan);
		//$this->set('gelombangId',$gelombang_pendaftaran);
		$this->set('jur_fix',$jur_fix);
		$this->set('prog_fix',$prog_fix);
		$this->set(compact('Mahasiswa_Masuk','ttahunAjarans','tfakultases', 'tprograms', 'tjurusans','prog_fix','jur_fix','gelombangs','param','jurusan','noreg','nama'));
		$this->Tmahasiswa->primaryKey = "NO_REGISTRASI";
		$this->set('tmahasiswas', $this->paginate('TcalonMahasiswa'));
                $mhs = $this->paginate('TcalonMahasiswa');
                
                $this->loadModel('Tjurusan');
                $jurusan1 = $this->Tjurusan->find('first', array("conditions"=>array('Tjurusan.kodejurusan'=>$mhs['0']['TcalonMahasiswa']['TJURUSAN_ID'])));
		$this->set("jurusan1", $jurusan1);

                $jurusan2 = $this->Tjurusan->find('first', array("conditions"=>array('Tjurusan.kodejurusan'=>$mhs['0']['TcalonMahasiswa']['TJURUSAN_ID'])));
		$this->set("jurusan2", $jurusan2);

	}
	
	function save_jurusan(){
		//echo count($this->data['TcalonMahasiswa']['NO_REG']);
		//pr($this->data['TcalonMahasiswa']['jurusan']);exit;
		$this->loadModel('Tambil');
		//$jurusan = explode("-", $this->data['TcalonMahasiswa']['jurusan']);
		//$this->data['Tambil']['TJURUSAN_ID']=$jurusan[1];
		//$this->data['Tambil']['TPROGRAM_ID']=$jurusan[0];
		//$this->data['Tambil']['NO_REGISTER']=$this->data['TcalonMahasiswa']['NO_REG'];
		if(!empty($this->data['TcalonMahasiswa']['NO_REGISTRASI'])){
			for($i=0;$i<count($this->data['TcalonMahasiswa']['NO_REGISTRASI']);$i++){
				$this->Tambil->del($this->data['TcalonMahasiswa']['NO_REGISTRASI'][$i]);
					$this->Tambil->saveField("NO_REGISTRASI", $this->data['TcalonMahasiswa']['NO_REGISTRASI'][$i]);
					$this->Tambil->saveField("TJURUSAN_ID", $this->data['TcalonMahasiswa']['jurusan'][$i]);
				
			}
		}
		//header('Location:' . $_SERVER['HTTP_REFERER']);
			$this->redirect(array('action'=>'index'));
	}
	
function lap_list($format=null) {
		
		//pr($this->params);exit;
       
        $gelombang_id = $jurusan = $noreg = $program = $nama = $status = 0;

        if(isset($this->params['url']['gelombang_id']) && $this->params['url']['gelombang_id'] != null){
          $gelombang_id = $this->params['url']['gelombang_id'];
        } else {
          $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
      

       if(isset($this->params['url']['TJURUSAN_ID'])){
            $jurusan = $this->params['url']['TJURUSAN_ID'];
        }
        
		if(isset($this->params['url']['TPROGRAM_ID'])){
            $program = $this->params['url']['TPROGRAM_ID'];
        }

        if(isset($this->params['url']['NO_REGISTRASI'])){
            $noreg = $this->params['url']['NO_REGISTRASI'];
        }
	if(isset($this->params['url']['NAMA'])){
            $nama = $this->params['url']['NAMA'];
        }
	if(isset($this->params['url']['status'])){
            $status = $this->params['url']['status'];
        }
		

        $param = $this->_extractGet();
        $this->loadModel('TcalonMahasiswa');
		$this->loadModel('Tmahasiswa');
        $this->loadModel('JenisNilaiPendaftaran');
        $this->TcalonMahasiswa->recursive = 2;
				
		 $listMahasiswa = $this->TcalonMahasiswa->getAllWithFilter($noreg, $nama, $jurusan,  $program, $gelombang_id, $status);
		//pr($listMahasiswa);
        $jenisNilai = $this->JenisNilaiPendaftaran->find('all', array('conditions' => array('gelombang_pendaftaran_id' => $gelombang_id), 'order' => 'JenisNilaiPendaftaran.id'));
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa', 'jenisNilai','gelombangs','ruang','noreg','nama', 'gelombang', 'param'));
        $this->set('noreg', $noreg);
        $this->set('gid', $gelombang_id);
// $this->render();
        if($format == 'pdf') {
            $this->render(null,"pdf","lap_list");
        }

    }
    
function excel(){
		$this->layout = 'excel';
		$this->loadModel('TcalonMahasiswa');
		$this->TcalonMahasiswa->recursive = 0;
		$param = $this->_extractGet();
		
	$input = $this->params['url'];
			$ar = array_splice($input, 2);
            
		if(!empty($ar)) {
			
            $conditions = array();
            
            foreach($ar as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["TcalonMahasiswa.$key LIKE"] = "%".trim($value)."%";
                }
            }
           // pr($conditions);
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $ar;
        }
        $param = $this->_extractGet();	
		
		$this->set('calonMahasiswas', $this->paginate('TcalonMahasiswa'));
		$this->set(compact('param'));
		
		$this->set('filename', 'laporan.xls');
		
				
	}

	function diterima($id = null) {
	$this->loadModel('TcalonMahasiswa');
	
		$this->TcalonMahasiswa->read(null, $id);
		$this->TcalonMahasiswa->saveField('status', 0);
		header('Location:' . $_SERVER['HTTP_REFERER']);

	}
	function tidak_diterima($id = null) {
		
		$this->loadModel('TcalonMahasiswa');
		$this->TcalonMahasiswa->read(null, $id);
		$this->TcalonMahasiswa->saveField('status', 1);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tmahasiswa.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tmahasiswa', $this->TcalonMahasiswa->read(null, $id));
		$this->set('id',$id);
	}

	function kelengkapan($NO_REGISTRASI = null) {
		$this->loadModel('TperlengkapansTcalonMahasiswa');
		
		//pr($this->TperlengkapansTcalonMahasiswa);
		if (!empty($this->data)) {
			//pr($this->data);exit;
			if ($this->TcalonMahasiswa->save($this->data)) {
				$this->Session->setFlash(__('The Tmahasiswa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tmahasiswa could not be saved. Please, try again.', true));
				
			}
		}else{
			
		
		}
		
		$this->data = $this->TcalonMahasiswa->read(null, $NO_REGISTRASI);
		
		$this->loadModel('TcalonMahasiswa');
		$tperlengkapans = $this->TcalonMahasiswa->Tperlengkapan->find('list');
		$this->set(compact('tperlengkapans'));
		$this->loadModel('Tperlengkapan');
		$perlengkapan = $this->Tperlengkapan->find('all');
		$this->set('NO_REGISTRASI', $NO_REGISTRASI);
		$this->set('perlengkapan', $perlengkapan);
	}

        function pindahan($no=null){

           if(!empty($this->data)){
               $this->loadModel('Tkonversi');
            //    pr(count($this->data['Tkonversi']))  ;
          
              for($i=1;$i<=count($this->data['Tkonversi']);$i++){
	//	if(!empty($this->data['Tkonversi'][$i]['KD_KULIAH'])){

			//pr($this->data['Tkonversi'][$i]);	//$this->AdSegmentMultiple->deleteAll($this->data['TcalonMahasiswa'][$i]);
                         //  pr($this->data['Tkonversi']['3']);
   			//$this->Tkonversi->create();
    		$this->Tkonversi->saveAll($this->data['Tkonversi'][$i]);
   	//	}
              $this->redirect(array('action'=>'index'));
	}
               
           }else{

               
           }
            
           
            $this->loadModel('Tmatakuliah');
           $matakuliah = $this->Tmatakuliah->find('all');
           $this->set('matakuliah', $matakuliah);
           $this->set('NO_REGISTRASI', $no);

        }

function pindahan_edit($no=null){
    //pr($no);
           if(!empty($this->data)){
               $this->loadModel('Tkonversi');
         $this->Tkonversi->deleteAll($this->data['Tkonversi']['NO_REGISTRASI']);
     
              for($i=1;$i<=count($this->data['Tkonversi']);$i++){
		if(!empty($this->data['Tkonversi'][$i]['KD_KULIAH'])){

                     // $this->Tkonversi->del($this->data['Tkonversi'][$i]['NO_REGISTRASI']);
                  // $this->Tkonversi->deleteAll($this->data['Tkonversi'][$i]['NO_REGISTRASI'], $this->data['Tkonversi'][$i]['KD_KULIAH']);
//   			/$this->Tkonversi->create();
                        $this->Tkonversi->saveAll($this->data['Tkonversi'][$i]);
                  
   		}
	}
       // $this->redirect(array('action'=>'index'));


           }else{


           }

        
            $this->loadModel('Tkonversi');
            $konversi = $this->Tkonversi->query("SELECT * FROM tmatakuliahs
                                    LEFT JOIN (SELECT * FROM tkonversi where tkonversi.NO_REGISTRASI = '" . $no . "') as c
                                    ON c.KD_KULIAH = tmatakuliahs.KD_KULIAH
");
            $this->set('konversi', $konversi);
            $this->set('NO_REGISTRASI', $no);
        }

	function add() {
		$this->loadModel("Configuration");
		$gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');
		if (!empty($this->data)) {
			// pr($this->data['TcalonMahasiswa']['status_masuk']);exit();
			$this->loadModel('TcalonMahasiswa');
			$rata = $this->data['TcalonMahasiswa']['nilai_matematika'] + $this->data['TcalonMahasiswa']['nilai_kemampuan']
						+ $this->data['TcalonMahasiswa']['nilai_bahasa'];
						$rata2 = $rata / 3;
			
			$file = $this->data['TcalonMahasiswa']['file_foto']['name'];
			if(!empty($file)){
				$this->data['TcalonMahasiswa']["PHOTO"] = "files/".$file;
			//$this->TcalonMahasiswa->saveField("PHOTO","files/".$this->TcalonMahasiswa->getInsertID());		
				$this->data['TcalonMahasiswa']['nilai_rata2'] = $rata2;	
				$this->data['TcalonMahasiswa']['gelombang_id'] = $gelombangId;
			}
                        $no = $this->data['TcalonMahasiswa']['NO_REGISTRASI'];
			if ($this->TcalonMahasiswa->save($this->data)) {
				move_uploaded_file($this->data['TcalonMahasiswa']['file_foto']['tmp_name'],"files/".$file);
				//$this->TcalonMahasiswa->saveField('nilai_rata2', $rata2);
				if($this->data['TcalonMahasiswa']['status_masuk']=="P"){
                                 // pr($this->data['TcalonMahasiswa']['status_masuk']);
                                    $this->redirect(array('action'=>'pindahan/'.$no));
                                  
                                }else{
                                    $this->redirect(array('action'=>'index'));
                                }
			} else {
				$this->Session->setFlash(__('The Tmahasiswa could not be saved. Please, try again.', true));
			}
			
		}else{
			$this->loadModel('Option');
			$option = $this->Option->find("first");
			$this->data["Tmahasiswa"]['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
		}
		$user = $this->Session->read("Auth");
		$tperguruan = $this->TcalonMahasiswa->Tperguruan_tinggi->find('list');
		$kelasMahasiswa = $this->TcalonMahasiswa->Refkela->find('list');
		$ttahunAjarans = $this->TcalonMahasiswa->TtahunAjaran->find('list');
		$tagamas = $this->TcalonMahasiswa->Tagama->find('list');
		$tfakultases = $this->TcalonMahasiswa->Tfakultase->find('list');
		$tprograms = $this->TcalonMahasiswa->Tprogram->find('list');
		$tjurusans = $this->TcalonMahasiswa->Tjurusan->find('all');
                 $this->loadModel('Tjurusan');
                 $jurusan = $this->Tjurusan->getList();
               $tdosens = $this->TcalonMahasiswa->Tdosen->find('list');
		$tkelases = $this->TcalonMahasiswa->Tkelase->find('list');
		$this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set('user', $user);
		$this->set(compact('tperguruan','jurusan','tagamas', 'tfakultases', 'tprograms','tpropinsis','tkabupatens','tdosens','ttahunAjarans','tkelases','status_aktif','user','kelasMahasiswa'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tmahasiswa', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
			
			//$this->Tmahasiswa->create();
			if ($this->TcalonMahasiswa->save($this->data)) {
			/*	$filename = $this->data['TcalonMahasiswa']['file_foto']['name'];
				move_uploaded_file(WWW_ROOT.'files/'.$filename,"files/".$id);

				$this->data['Tmahasiswa']["PHOTO"] = "files/".$id;
				$this->Tmahasiswa->saveField("PHOTO","files/".$filename);*/
				
				$rata = $this->data['TcalonMahasiswa']['nilai_matematika'] + $this->data['TcalonMahasiswa']['nilai_kemampuan']
						+ $this->data['TcalonMahasiswa']['nilai_bahasa'];
				$rata2 = $rata / 3;
				$this->TcalonMahasiswa->saveField('nilai_rata2', $rata2);   
				$this->Session->setFlash(__('The Tmahasiswa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tmahasiswa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TcalonMahasiswa->read(null, $id);
		}
                $tperguruan = $this->TcalonMahasiswa->Tperguruan_tinggi->find('list');
		
		$kelasMahasiswa = $this->TcalonMahasiswa->Refkela->find('list');
		$tagamas = $this->TcalonMahasiswa->Tagama->find('list');
		$tfakultases = $this->TcalonMahasiswa->Tfakultase->find('list');
		$tprograms = $this->TcalonMahasiswa->Tprogram->find('list');
		$tjurusans = $this->TcalonMahasiswa->Tjurusan->find('list');
		 $this->loadModel('Tjurusan');
                 $jurusan = $this->Tjurusan->getList();
               $tdosens = $this->TcalonMahasiswa->Tdosen->find('list');
		$ttahunAjarans = $this->TcalonMahasiswa->TtahunAjaran->find('list');
		$tkelases = $this->TcalonMahasiswa->Tkelase->find('list');
		$this->loadModel('Refdetil');
		$status_aktif = $this->Refdetil->generateList($code = '05');
		$status_masuk = $this->Refdetil->generateList($code = '06');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('status_aktif',$status_aktif);
		$this->set('status_masuk',$status_masuk);
		$this->set('jenjang_studi',$jenjang_studi);
		$this->set('id',$id);
		$this->set(compact('tperguruan','jurusan','tagamas', 'tfakultases', 'tprograms','tjurusans','tpropinsis','tkabupatens','tdosens','ttahunAjarans','tkelases','kelasMahasiswa'));
	}

	
function edit_nilai($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tmahasiswa', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
			$this->loadModel('TcalonMahasiswa');
			//$this->Tmahasiswa->create();
			if ($this->TcalonMahasiswa->save($this->data)) {
			/*	$filename = $this->data['TcalonMahasiswa']['file_foto']['name'];
				move_uploaded_file(WWW_ROOT.'files/'.$filename,"files/".$id);

				$this->data['Tmahasiswa']["PHOTO"] = "files/".$id;
				$this->Tmahasiswa->saveField("PHOTO","files/".$filename);*/
				$rata = $this->data['TcalonMahasiswa']['nilai_matematika'] + $this->data['TcalonMahasiswa']['nilai_kemampuan']
						+ $this->data['TcalonMahasiswa']['nilai_bahasa'];
					$rata2 = $rata / 3;
				$this->TcalonMahasiswa->saveField('nilai_rata2', $rata2);   

				$this->Session->setFlash(__('The Tmahasiswa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tmahasiswa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TcalonMahasiswa->read(null, $id);
		}
}
	function delete($id = null) {
		$this->loadModel('TcalonMahasiswa');
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tmahasiswa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TcalonMahasiswa->del($id)) {
			$this->Session->setFlash(__('Tmahasiswa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function cari_no_test($no=null){
		
	      if(!empty($this->data)){
			$url = array (
				"action" => "cari_no_test",
				$this->data['Filter']["NO_REGISTRASI"]
			);
			$this->redirect($url);
		}
	if($no){
			
			$this->loadModel('TcalonMahasiswa');
			$this->loadModel("Tmahasiswa");
				$payments = $this->TcalonMahasiswa->find("all",array("conditions"=>array("TcalonMahasiswa.NO_REGISTRASI"=>$no,"TcalonMahasiswa.status"=>"1")));
				$cek_reg = $this->Tmahasiswa->find("all",array("conditions"=>array("Tmahasiswa.NO_REGISTRASI"=>$no)));
				if(empty($payments)){
					$this->set("error","No.Test tidak ada atau tidak diterima dalam Penerimaan");
				}
				
	$this->loadModel('KeuanganKewajiban');
			$kewajiban = $this->KeuanganKewajiban->find('all');
			$angkatan_id = $payments['0']['TcalonMahasiswa']['gelombang_id'];
			$jurusan_id = $payments['0']['TcalonMahasiswa']['TJURUSAN_ID'];
	if(($angkatan_id !== null) && ($jurusan_id !== null)) {
            $this->loadModel('KeuanganMaster');
            $listKewajiban = $this->KeuanganMaster->getAllKewajiban(Configure::read('App.ttahun_ajaran_id'), Configure::read('App.tsemester_id'), $angkatan_id, $jurusan_id);
        }
				$this->set("payments",$payments);
				
				if(!empty($cek_reg)){
					$this->set("error2","No Registrasi ini sudah melakukan Daftar Ulang");
					
				}
				//$this->loadModel("Tmahasiswa");
				//$cek_nim = $this->Tmahasiswa->find("first",array("conditions"=>array("Tmahasiswa.NIM"=>)))
				
			}
			else{
				$this->set("error","Calon Mahasiswa dengan No Test : $no tidak ditemukan.");
			}
                        $this->loadModel('Tambil');
                        $this->loadModel('Tjurusan');
                        $this->loadModel('Refdetil');
                        $ambil = $this->Tambil->find('first',array('conditions'=>array('Tambil.NO_REGISTRASI'=>$no)));
                        $_ambil = $ambil['Tambil']['TJURUSAN_ID'];

                                $this->loadModel('Tjurusan');
                                $jurusan = $this->Tjurusan->find('first', array("conditions"=>array('Tjurusan.kodejurusan'=>$_ambil)));
                        	$this->set("jurusan", $jurusan);

                        $this->data["TcalonMahasiswa"]["NO_REGISTRASI"] = $no;
			$this->set("no",$no);
			$this->loadModel('Refdetil');
			$tprograms = $this->TcalonMahasiswa->Tprogram->find('list');
			$tjurusans = $this->TcalonMahasiswa->Tjurusan->find('list');
			$jenjang_studi = $this->Refdetil->generateList($code = '04');
			$this->set('jenjang_studi',$jenjang_studi);
			$this->set(compact('tjurusans','listKewajiban'));
		
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
		$this->loadModel('TcalonMahasiswa');
		$this->loadModel('Tmahasiswa');
		$this->loadModel('TtahunAjaran');
		$this->loadModel('Option');
		//$this->layout = 'ajax';
		
		$NO_REG = $this->data['Tmahasiswas']['NO_REGISTRASI'];
		//pr($NO_REG);
		
		$this->loadModel('Configuration');
		$gelombangId = $this->Configuration->getValue('gelombangPendaftaranId');
		
		$this->loadModel('Tmahasiswa');
		$this->loadModel('Tambil');
		$save_jur = $this->Tambil->find('all',array('conditions'=>array('Tambil.NO_REGISTRASI'=> $NO_REG)));
		$jur = $save_jur['0']['Tambil']['TJURUSAN_ID'];
		if(empty($save_jur)){
			$error = "Calon Mahasiswa ini belum memilih Jurusan";
			$this->set("errors", $error);
		}
            	
                $kelas = $this->TcalonMahasiswa->find('first',array("conditions"=>array('TcalonMahasiswa.NO_REGISTRASI'=>$NO_REG)));
                $ref_kelas = $kelas['TcalonMahasiswa']['refkelas_id'];
                $status_masuk = $kelas['TcalonMahasiswa']['status_masuk'];

                
		$mhs = $this->Tmahasiswa->find('first', array('conditions' => array('Tmahasiswa.TJURUSAN_ID' => $jur, 'Tmahasiswa.refkela_id'=>$ref_kelas) ,'order' => 'Tmahasiswa.NIM DESC'));
		$lastnim = $mhs['Tmahasiswa']['NIM'];

                $this->loadModel('TtahunAjaran');
                $thn = Configure::read('App.ttahun_ajaran_id');
                $_thn = $this->TtahunAjaran->find('all',array('conditions'=>array('TtahunAjaran.id'=>$thn)));
		$__thn = $_thn['0']['TtahunAjaran']['nama'];
                $tahun_ajaran = substr($__thn, 2, 3);

               
                if(($ref_kelas==1)&&($status_masuk=='BP')){
                    $class = "0";
                }elseif(($ref_kelas==1)&&($status_masuk=='P')){
                    $class = "09";
                }elseif(($ref_kelas==2)||($ref_kelas==3)&&($status_masuk=='BP')){
                    $class = "06";
                }elseif(($ref_kelas==2)||($ref_kelas==3)&&($status_masuk=='P')){
                    $class = "07";
                }else{
                    $class = "0";
                }

               if(empty($lastnim)){
                    $noUrut = "01";
                }else{
                    $noUrut = (int) substr($lastnim, 5, 6);
                    $noUrut++;
                }
                 // pr($noUrut);
 		$countjur = strlen($jur);
		$countxnim = strlen($noUrut);
		
		if($countjur == 2 ){
		$jur = $jur;
		}else if($countjur == 1){
			$jur = '0'. $jur;
		}

                if($countxnim == 2){
			$noUrut = $noUrut;
		}else if($countxnim == 1){
			$noUrut = '0'.$noUrut;
		}

		//$nim = $jur.$tahun_ajaran.$class.$snim;
                $nim = $jur.$tahun_ajaran.$class.$noUrut;
		$this->set('nim', $nim);
	}

	
}
?>
