<?php
class KeuanganController extends AppController {

	var $name = 'Keuangan';
	var $uses = array();
	var $helpers = array('Html', 'Form','Javascript', 'Ajax', 'Number');
	var $components = array("RequestHandler");

	function master() {
		$this->loadModel('KeuanganMaster');

		if(!empty($this->data)) {
			$this->KeuanganMaster->saveAll($this->data['KeuanganMaster']);
			$this->redirect(array('action' => 'master'));
		}

		$masters = $this->KeuanganMaster->find('all');
		$this->set(compact('masters'));
	}

	function masterAdd() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, ClassRegistry::init('KeuanganMaster'), array('redirect' => array('action' => 'master')));
		}
	}

	function masterDelete($id) {
		ClassRegistry::init('KeuanganMaster')->delete($id);
		$this->redirect(array('action' => 'master'));
	}

  function kewajiban() {

        if(!empty($this->data) && isset($this->data['Kewajiban'])) {
            $aid = $this->data['tangkatan_id'];
            $jid = $this->data['tjurusan_id'];
            foreach($this->data['Kewajiban'] as $key=>$value) {
                if($this->data['Kewajiban'][$key]['jumlah'] == null) {
                    unset($this->data['Kewajiban'][$key]);
                } else {
                    if($this->data['Kewajiban'][$key]['id'] == null) {
                        unset($this->data['Kewajiban'][$key]['id']);
                    }
                    $this->data['Kewajiban'][$key]['tsemester_id'] = Configure::read("App.tsemester_id");
                    $this->data['Kewajiban'][$key]['ttahun_ajaran_id'] = Configure::read("App.ttahun_ajaran_id");
                    $this->data['Kewajiban'][$key]['tangkatan_id'] = $aid;
                    $this->data['Kewajiban'][$key]['tjurusan_id'] = $jid;
                }
            }
            ClassRegistry::init('Kewajiban')->saveAll($this->data['Kewajiban']);
            $this->redirect("/keuangan/kewajiban?angkatan=$aid&jurusan=$jid");
        }

        $angkatan_id = $jurusan_id = null;
        $listKewajiban = array();

        if(isset($this->params['url']['angkatan'])){
            $angkatan_id = $this->params['url']['angkatan'];
        }
        if(isset($this->params['url']['jurusan'])){
            $jurusan_id = $this->params['url']['jurusan'];
        }

        if(($angkatan_id !== null) && ($jurusan_id !== null)) {
            $this->loadModel('KeuanganMaster');
            $listKewajiban = $this->KeuanganMaster->getAllKewajiban(Configure::read('App.ttahun_ajaran_id'), Configure::read('App.tsemester_id'), $angkatan_id, $jurusan_id);
        }

        $angkatans = ClassRegistry::init('TtahunAjaran')->find('list');
        $jurusans = ClassRegistry::init('Tjurusan')->getList();
        $this->set(compact('angkatans', 'jurusans', 'listKewajiban'));
        $this->set('aid', $angkatan_id);
        $this->set('jid', $jurusan_id);
    }

	function transaksi($no=null) {
		$this->loadModel('KeuanganTransaksi');
		if(!empty($this->data)){
			$url = array (
				"action" => "transaksi",
			$this->data['Filter']["NIM"]
			);
			$this->redirect($url);
		}
		if($no){

			$this->loadModel('TcalonMahasiswa');
			$this->loadModel("Tmahasiswa");
			$payments = $this->Tmahasiswa->find("all",array("conditions"=>array("Tmahasiswa.NIM"=>$no)));
			if(empty($payments)){
				$this->set("error","NIM tidak Terdaftar");
			}

			$cek_pembayaran = $this->KeuanganTransaksi->find("all", array("conditions"=>array("KeuanganTransaksi.mahasiswa_id"=>$no)));
			$this->set("cek", $cek_pembayaran);

			$this->set("payments",$payments);
			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");

			//pr($payments);

			$jurusan = $payments['0']['Tmahasiswa']['TJURUSAN_ID'];
			$gel = $payments['0']['Tmahasiswa']['gelombang_id'];
			if(empty($gel)){
				$this->loadModel('Configuration');
				$gel = $this->Configuration->getValue('gelombangPendaftaranId');
			}else{
				$gel = $payments['0']['Tmahasiswa']['gelombang_id'];
			}
			$this->loadModel('GelombangPendaftaran');
			$angkatan = $this->GelombangPendaftaran->find('all',array('conditions'=>array('GelombangPendaftaran.id'=>$gel)));
			$tangkatan_id = $angkatan['0']['GelombangPendaftaran']['ttahun_ajaran_id'];
			$this->loadModel('KeuanganKewajiban');
			/*$cek_jumlah_kewajiban = $this->KeuanganKewajiban->find('all',array('conditions'=>array('KeuanganKewajiban.ttahun_ajaran_id'=>$tahun_ajaran_aktif,
						  'KeuanganKewajiban.tsemester_id'=>$semester_aktif,
						  'KeuanganKewajiban.tangkatan_id'=>$tangkatan_id,
						  'KeuanganKewajiban.tjurusan_id' => $jurusan

			)));*/
                        $cek_jumlah_kewajiban = $this->KeuanganKewajiban->query("
                                                SELECT SUM(jumlah) as kewajiban
                                                FROM
                                                    keuangan_kewajiban
                                                WHERE
                                                    keuangan_kewajiban.ttahun_ajaran_id = '" . $tahun_ajaran_aktif . "' and
                                                    keuangan_kewajiban.tsemester_id = '" . $semester_aktif . "' and
                                                    keuangan_kewajiban.tangkatan_id = '" . $tangkatan_id . "' and
                                                    keuangan_kewajiban.tjurusan_id = '" . $jurusan . "' 

");

			$this->set('jumlah_kewajiban', $cek_jumlah_kewajiban);
                       // pr($cek_jumlah_kewajiban);
			$this->loadModel('KeuanganTransaksi');

			/*$cek_jumlah_transaksi = $this->KeuanganTransaksi->find('all',array('conditions'=>array('KeuanganTransaksi.ttahun_ajaran_id'=>$tahun_ajaran_aktif,
						  'KeuanganTransaksi.tsemester_id'=>$semester_aktif,
						  'KeuanganTransaksi.tangkatan_id'=>$tangkatan_id,
						  'KeuanganTransaksi.mahasiswa_id'=> $no
			) ,'order' => 'KeuanganTransaksi.id DESC'));*/
			
			$cek_jumlah_transaksi = $this->KeuanganTransaksi->query("SELECT SUM(keuangan_transaksi.jumlah)as jumlah_transaksi FROM keuangan_transaksi
													WHERE 
														keuangan_transaksi.mahasiswa_id = '" . $no . "' and
														keuangan_transaksi.ttahun_ajaran_id = '" . $tahun_ajaran_aktif . "' and		
														keuangan_transaksi.tsemester_id = '" . $semester_aktif . "' and	
														keuangan_transaksi.tangkatan_id = '" . $tangkatan_id . "'				
			");
			
			$this->set('jumlah_transaksi', $cek_jumlah_transaksi);
//pr($cek_jumlah_transaksi);
			if(!empty($cek_jumlah_transaksi)){
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']-$cek_jumlah_transaksi['0']['0']['jumlah_transaksi'];
				if($sisa==0){
					$this->set('pesan', "PEMBAYARAN LUNAS");
				}
			}else{
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']- 0;
			}
			$this->set('sisa', $sisa);

		}
		else{
			$this->set("error","Mahasiswa dengan NIM : $no tidak ditemukan.");
		}
		$this->data["TcalonMahasiswa"]["NO_REGISTRASI"] = $no;
		$this->set("no",$no);
		$this->loadModel('Tbank');
		$bank = $this->KeuanganTransaksi->Tbank->find('list');
		$this->set(compact('bank'));

		$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
		$semester_aktif = Configure::read("App.tsemester_id");



	}
	function add(){
		$this->loadModel('KeuanganTransaksi');
		$this->loadModel('GelombangPendaftaran');
		if(!empty($this->data)){
		$gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
		//pr($this->data);exit;
		$angkatan = $this->GelombangPendaftaran->find('all',array('conditions'=>array('GelombangPendaftaran.id'=>$gelombang_id)));
		$tangkatan_id = $angkatan['0']['GelombangPendaftaran']['ttahun_ajaran_id'];

			$this->loadModel('Tmahasiswa');
			$j = $this->Tmahasiswa->find('all',array("conditions"=>array("Tmahasiswa.NIM"=>$this->data['KeuanganTransaksi']['mahasiswa_id'])));
			$jurusan = $j['0']['Tmahasiswa']['TJURUSAN_ID'];

			$this->data['KeuanganTransaksi']['ttahun_ajaran_id'] = Configure::read("App.ttahun_ajaran_id");
			$this->data['KeuanganTransaksi']['tsemester_id'] = Configure::read("App.tsemester_id");
			$this->data['KeuanganTransaksi']['mahasiswa_id'] = $this->data['KeuanganTransaksi']['mahasiswa_id'];
			$this->data['KeuanganTransaksi']['tangkatan_id'] = $tangkatan_id;
			$this->data['KeuanganTransaksi']['tjurusan_id'] = $jurusan;
			if($this->KeuanganTransaksi->save($this->data))	{
				$this->redirect(array('action' => 'transaksi/'.$this->data['KeuanganTransaksi']['mahasiswa_id']));
			}

		}

	}

	function edit($id=null){
		$this->loadModel('KeuanganTransaksi');
			if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Keuangan', true));
			$this->redirect(array('action'=>'transaksi'));
		}

		if (!empty($this->data)) {
			//pr($id);exit;
				$this->data['KeuanganTransaksi']['jumlah'] = $this->data['KeuanganTransaksi']['jumlah']; 
				if ($this->KeuanganTransaksi->save($this->data['KeuanganTransaksi'])) {
				$this->Session->setFlash(__('The KeuanganTransaksi has been saved', true));
				$this->redirect(array('action'=>'laporan'));
			} else {
				$this->Session->setFlash(__('The KeuanganTransaksi could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->KeuanganTransaksi->read(null, $id);
			//pr($this->data);
		}
	}

	function getCurrentConditions(){
		$conditions = "";
		//$this = $this->loadModel('KeuanganTransaksi');

		if($this->Session->check("KeuanganTransaksi.tanggal")){
			$conditions.= $this->Session->read("KeuanganTransaksi.tanggal");
		}elseif($this->Session->check("KeuanganTransaksi.tjurusan_id")){
			$conditions.= $this->Session->read("KeuanganTransaksi.tjurusan_id");
		}
		return $conditions;
	}
	function laporan(){
		//pr(ini_get('include_path'));
		$this->loadModel('KeuanganTransaksi');
		$this->Keuangan->recursive = 0;
		$this->KeuanganTransaksi->recursive = 2;

		//pr($this);

		if(!empty($this->data)){

			$url = array("action"=>"laporan");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			//$this->redirect($url);
		}
		//pr($this->data);
		$input = $this->params['url'];
			$ar = array_splice($input, 2);

		if(!empty($ar)) {

            $conditions = array();

            foreach($ar as $key => $value) {
            	//pr($value);
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["KeuanganTransaksi.$key LIKE"] = "%".trim($value)."%";
                }
            }
           // pr($conditions);
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $ar;
			$this->set('keuangans', $this->paginate('KeuanganTransaksi'));

        }else{
        	$this->set('error', "Tanggal Masih Kosong");
        }


		$tanggal = $tjurusan_id = 0;
 		if(isset($this->params['url']['tanggal'])){
            $tanggal = $this->params['url']['tanggal'];
        }

        if(isset($this->params['url']['tjurusan_id'])){
            $tjurusan_id = $this->params['url']['tjurusan_id'];
        }
       	// pr($tanggal);
       $param = $this->_extractGet();
 		$this->loadModel('KeuanganTransaksi');
		$jurusan = $this->KeuanganTransaksi->Tjurusan->find('list');
		$keuangans = $this->paginate('KeuanganTransaksi');
		$this->set(compact('keuangans','jurusan','tanggal','tjurusan_id','param'));
		$this->set('tjurusan_id', $tjurusan_id);
		$this->set('tanggal', $tanggal);

	}

	function excel(){
		$this->layout = 'excel';
		$this->loadModel('KeuanganTransaksi');
		$this->Keuangan->recursive = 0;
		$this->KeuanganTransaksi->recursive = 2;

	$input = $this->params['url'];
			$ar = array_splice($input, 2);

		if(!empty($ar)) {

            $conditions = array();

            foreach($ar as $key => $value) {
            	//pr($value);
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["KeuanganTransaksi.$key LIKE"] = "%".trim($value)."%";
                }
            }
           // pr($conditions);
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $ar;
        }

		$this->set('keuangans', $this->paginate('KeuanganTransaksi'));

		$this->set('filename', 'laporan.xls');


	}

	function pembayaran_pdf($format=null){
 		$tanggal = $tjurusan_id  = 0;

        if(isset($this->params['url']['gelombang']) && $this->params['url']['gelombang'] != null){
            $gelombang_id = $this->params['url']['gelombang_id'];
        } else {
            $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }


        if(isset($this->params['url']['tanggal'])){
            $tanggal = $this->params['url']['tanggal'];

        }

        if(isset($this->params['url']['tjurusan_id'])){
            $tjurusan_id = $this->params['url']['tjurusan_id'];

        }

        $param = $this->_extractGet();
        $this->loadModel('KeuanganTransaksi');
        $this->loadModel('JenisNilaiPendaftaran');
       	$listMahasiswa = $this->KeuanganTransaksi->getAllFilter($tanggal, $tjurusan_id);
        //pr($listMahasiswa);
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa','param','tanggal','tjurusan_id'));
        $this->set('gid', $gelombang_id);
        $this->set('tjurusan_id', $tjurusan_id);

        if($format == 'pdf') {
           $this->render(null,"pdf","pembayaran_pdf");
        }

	}


function cariNIM($nim=null){
		if(!empty($this->data)){
			$url = array (
				"action" => "cariNIM",
				$this->data['Filter']["NIM"]
			);
			$this->redirect($url);
		}
		if($nim){
			$this->loadModel('KeuanganTransaksi');
			$this->loadModel('Tmahasiswa');
                        $this->loadModel('Tjurusan');
			$mahasiswa = $this->KeuanganTransaksi->Tmahasiswa->findByNim($nim);
                        $data = $this->Tmahasiswa->find('first', array("conditions"=>array("Tmahasiswa.NIM"=>$nim)));
                        $jurusan = $this->Tjurusan->find('first', array("conditions"=>array("Tjurusan.kodejurusan"=>$data['Tmahasiswa']['TJURUSAN_ID'])));

                        $this->set("data", $data);
                        $this->set("jurusan", $jurusan);
                        $angkatan_id = $data['Tmahasiswa']['gelombang_id'];
			$jurusan_id = $data['Tmahasiswa']['TJURUSAN_ID'];
                        if(($angkatan_id !== null) && ($jurusan_id !== null)) {
                            $this->loadModel('KeuanganMaster');
                            $listKewajiban = $this->KeuanganMaster->getAllKewajiban(Configure::read('App.ttahun_ajaran_id'), Configure::read('App.tsemester_id'), $angkatan_id, $jurusan_id);
                        }
                        $this->set("listKewajiban",$listKewajiban);
			if($mahasiswa){
				$payments = $this->KeuanganTransaksi->find("all",array("conditions"=>array("KeuanganTransaksi.mahasiswa_id"=>$nim)));
				if(empty($payments)){
					$this->set("error","Tidak ada history pembayaran");
				}
				$this->set("payments",$payments);

			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");
                        $jurusan = $payments['0']['Tmahasiswa']['TJURUSAN_ID'];
			$gel = $payments['0']['Tmahasiswa']['gelombang_id'];
			if(empty($gel)){
				$this->loadModel('Configuration');
				$gel = $this->Configuration->getValue('gelombangPendaftaranId');
			}else{
				$gel = $payments['0']['Tmahasiswa']['gelombang_id'];
			}
			$this->loadModel('GelombangPendaftaran');
			$angkatan = $this->GelombangPendaftaran->find('all',array('conditions'=>array('GelombangPendaftaran.id'=>$gel)));
			$tangkatan_id = $angkatan['0']['GelombangPendaftaran']['ttahun_ajaran_id'];
			$this->loadModel('KeuanganKewajiban');
			 $cek_jumlah_kewajiban = $this->KeuanganKewajiban->query("
                                                SELECT SUM(jumlah) as kewajiban
                                                FROM
                                                    keuangan_kewajiban
                                                WHERE
                                                    keuangan_kewajiban.ttahun_ajaran_id = '" . $tahun_ajaran_aktif . "' and
                                                    keuangan_kewajiban.tsemester_id = '" . $semester_aktif . "' and
                                                    keuangan_kewajiban.tangkatan_id = '" . $tangkatan_id . "' and
                                                    keuangan_kewajiban.tjurusan_id = '" . $jurusan . "'

");
			$this->set('jumlah_kewajiban', $cek_jumlah_kewajiban);
			$this->loadModel('KeuanganTransaksi');

			$cek_jumlah_transaksi = $this->KeuanganTransaksi->query("SELECT keuangan_transaksi.jumlah as jumlah_transaksi FROM keuangan_transaksi
													WHERE 
														keuangan_transaksi.mahasiswa_id = '" . $nim . "' and
														keuangan_transaksi.ttahun_ajaran_id = '" . $tahun_ajaran_aktif . "' and		
														keuangan_transaksi.tsemester_id = '" . $semester_aktif . "' and	
														keuangan_transaksi.tangkatan_id = '" . $tangkatan_id . "'				
			");
                        //pr($cek_jumlah_transaksi);
			$this->set('jumlah_transaksi', $cek_jumlah_transaksi);

			if(!empty($cek_jumlah_transaksi)){
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']-$cek_jumlah_transaksi['0']['keuangan_transaksi']['jumlah_transaksi'];
				if($sisa==0){
					$this->set('pesan', "PEMBAYARAN LUNAS");
				}
			}else{
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']- 0;
			}
			$this->set('sisa', $sisa);



			}
			else{
				$this->set("error","Mahasiswa dengan NIM : $nim tidak ditemukan.");
			}
			$this->data["Mahasiswa"]["NIM"] = $nim;
			$this->set("nim",$nim);
		}
	}
}
?>
