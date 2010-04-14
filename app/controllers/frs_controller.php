<?php
class FrsController extends AppController {

	var $name = 'Frs';
	var $uses = array (
		'Tkelase',
		'Tmatakuliah',
		'Tmahasiswa',
		'Tjurusan',
		'FormStudi',
		'KartuStudi',
		'Option'
	);
	var $helpers = array (
		'Html',
		'Form',
		'Ajax',
		'Fpdf','Ksm'
	);

	function registrasi() {
		$matakuls = $this->Tmatakuliah->find('all', array (
			'conditions' => array (
				'IS_BUKA' => '1'
			)
		));
		$this->set('matkuls', $matakuls);

		$params = null;
		$params2 = null;

		if (isset ($this->data['Filter'])) {
			$url = array (
				'action' => 'registrasi'
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);

		}
		if (!empty ($this->params['named'])) {
			$conditions = array ();
			foreach ($this->params['named'] as $key => $value) {
				if (!empty ($value)) {
					$conditions['Tmatakuliah.$key LIKE'] = '%' . trim($value) . '%';
				}
			}

			$this->paginate = array (
				'conditions' => $conditions
			);
			$this->data['Filter'] = $this->params['named'];
			$params = array (
				'conditions' => array (
					'fakultas' => $this->params['named']['FAKULTAS'],
					'programStudi' => $this->params['named']['PROGRAM_STUDI']
				)
			);
		}

		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		//$tprograms = $this->Tmatakuliah->Tprogram->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$tjurusans = null; //$this->Tmatakuliah->Tjurusan->find('list');

		if (($tfakultases != '') || ($tprograms != '')) {
			$this->set('lblforeignkey', 'Jurusan');

		}
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans'));
	}

	function index() {
		$auth = $this->Session->read('Auth');
		$option = $this->Option->find('first');
		
		$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
		$semester_aktif = Configure::read("App.tsemester_id");
		
		$nim = $auth['User']['USERNAME'];
		$this->Tmahasiswa->recursive = 1;
		$pembayaran = array('TstatusPembayaran.tahun_ajaran'=> $option['Option']['ttahun_ajaran_id'],
				'TstatusPembayaran.semester'=>$option['Option']['tsemester_id']);
		$this->Tmahasiswa->hasMany['TstatusPembayaran']['conditions'] = $pembayaran;
		$mahasiswa = $this->Tmahasiswa->find('first',array('conditions'=>array('NIM'=>$nim)));
		//pr($mahasiswa);
		//$nim = $mahasiswa['Tmahasiswa']['NIM'];
		$jurusan = $mahasiswa['Tmahasiswa']['TJURUSAN_ID'];
		//cek_pembayaran
			$this->loadModel('Configuration');
			$gel = $this->Configuration->getValue('gelombangPendaftaranId');
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
				
			$cek_jumlah_transaksi = $this->KeuanganTransaksi->query("SELECT sum(keuangan_transaksi.jumlah) as jumlah_transaksi FROM keuangan_transaksi
													WHERE
														keuangan_transaksi.mahasiswa_id = '" . $nim . "' and
														keuangan_transaksi.ttahun_ajaran_id = '" . $tahun_ajaran_aktif . "' and
														keuangan_transaksi.tsemester_id = '" . $semester_aktif . "' and
														keuangan_transaksi.tangkatan_id = '" . $tangkatan_id . "'
			");
			$this->set('jumlah_transaksi', $cek_jumlah_transaksi);
				
			if(!empty($cek_jumlah_transaksi)){
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']-$cek_jumlah_transaksi['0']['0']['jumlah_transaksi'];
				if($sisa==0){
					$this->set('pesan', "PEMBAYARAN LUNAS");
				}
			}else{
				$sisa = $cek_jumlah_kewajiban['0']['0']['kewajiban']- 0;
			}
			$this->set('sisa', $sisa);
                        //pr($sisa);
		
		//end cek
		
		$this->set('tmahasiswa', $mahasiswa);
		$this->KartuStudi->recursive = 3;
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
		$this->Tmatakuliah->recursive = 0;

	}

	function simpanFrs() {
		$this->layout = 'ajax';
		//pr($this->data);

		$FormStudi = array ();

		if (!empty ($this->data)) {
			//	pr($this->data);
			
			$this->Tmatakuliah->create();
			$auth = $this->Session->read('Auth');
			
			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");
		
			
			$nim = $auth['User']['USERNAME'];

			$conditions = array (
				'FormStudi.NIM' => $nim,
				'FormStudi.tsemester_id' => $semester_aktif,
				'FormStudi.ttahun_ajaran_id' => $tahun_ajaran_aktif
			);
			$FormStudi = $this->FormStudi->find('first',array('conditions'=>$conditions));

			if (empty ($FormStudi['FormStudi'])) {

				$FormStudi['FormStudi']['NIM'] = $nim;

				$FormStudi['FormStudi']['tsemester_id'] = $semester_aktif;
				$FormStudi['FormStudi']['ttahun_ajaran_id'] = $tahun_ajaran_aktif;

				$this->FormStudi->save($FormStudi);
				$FormStudi_id = $this->FormStudi->getInsertId();
			} else {
				$FormStudi_id = $FormStudi['FormStudi']['id'];
			}

			foreach ($this->data as $kelas) {
				//pr($kelas);
				if (!empty ($kelas['check'])) {
					$KartuStudi = array ();
					$KartuStudi['id'] = null;
					$KartuStudi['form_studi_id'] = $FormStudi_id;
					//pr($kelas['KartuStudi']['kelas_id']);
					$KartuStudi['kelas_id'] = $kelas['kelas'];

					$this->KartuStudi->save($KartuStudi);
				}
			}
			
			$this->loadModel('KartuStudi');
			$this->KartuStudi->recursive = 2;
			$kul = $this->KartuStudi->find('all', array('conditions'=>array('KartuStudi.form_studi_id'=>$FormStudi_id)));
			
				$kodekuliahArray = "";
				$kelas = $this->Tkelase->find('all',array('conditions'=>array('Tkelase.ID'=>$kul['0']['KartuStudi']['kelas_id'])));
				for($a=0;$a<count($kul);$a++){
					$Kode_kuliah = $kul[$a]['Tkelase']['Tmatakuliah']['KD_KULIAH'];
					$kodekuliahArray.= "'".$Kode_kuliah."'".",";
					
				$kode = substr($kodekuliahArray, 0,15);
				}
				$this->loadModel('Tmatakuliah');
				$sks = $this->Tmatakuliah->query("SELECT SUM(SKS) as JumlahSks FROM tmatakuliahs WHERE KD_KULIAH IN ( " . $kode. ")");
				
			$auth = $this->Session->read('Auth');
			$nim = $auth['User']['USERNAME'];
			$this->Tmahasiswa->recursive = 1;
			$mahasiswa = $this->Tmahasiswa->find('first',array('conditions'=>array('NIM'=>$nim)));
			$jurusan = $mahasiswa['Tmahasiswa']['TJURUSAN_ID'];
			$program = $mahasiswa['Tmahasiswa']['TPROGRAM_ID'];
			$this->loadModel('TsksMinimal');
			$this->TsksMinimal->recursive = 1;
			$sks_minimal = $this->TsksMinimal->find('all',array('conditions'=>array('TsksMinimal.TPROGRAM_ID'=>$program, 'TsksMinimal.TJURUSAN_ID'=>$jurusan)));
			$jum_sks_minimal = $sks_minimal['0']['TsksMinimal']['jumlah']; 
			
			if($sks['0']['0']['JumlahSks'] <= $jum_sks_minimal){
				$this->loadModel('FormStudi');
				$FormStudi['FormStudi']['NIM'] = $nim;
				$this->FormStudi->saveField("status", "Setuju");
			}elseif(empty($jum_sks_minimal)){
				$this->loadModel('FormStudi');
				$FormStudi['FormStudi']['NIM'] = $nim;
				$this->FormStudi->saveField("status", "Pending");
			}else{
				$this->loadModel('FormStudi');
				$FormStudi['FormStudi']['NIM'] = $nim;
				$this->FormStudi->saveField("status", "Pending");
			}
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

	function hapus() {
		$this->layout = 'ajax';
		//pr($this->data);
		$formStudi_id = $this->data['formid'];
		foreach ($this->data['krs'] as $kelas) {
			if (!empty ($kelas['check'])) {

				$this->KartuStudi->del($kelas['kelas']);
			}

		}

		//echo 'id form studi : $formStudi_id';
		$this->KartuStudi->recursive = 3;
		$kartuStudis = $this->KartuStudi->find('all', array (
			'conditions' => array (
				'form_studi_id' => $formStudi_id
			)
		));
		//pr($kartuStudis);
		$this->set('kartuStudis', $kartuStudis);
		$this->viewPath = 'elements' . DS . 'frs';
		$this->render('list');
	}
	function kartustudi() {
		$auth = $this->Session->read('Auth');
		$nim = $auth['User']['USERNAME'];
		$this->Tmahasiswa->recursive = 0;
		$mahasiswa = $this->Tmahasiswa->findByNim($nim);
		$this->set('frs', $mahasiswa['Tfr']);
	}

	function viewkartustudi($id = null) {

	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tmatakuliah', true), array (
				'action' => 'index'
			));
		}
		$this->set('tmatakuliah', $this->Tmatakuliah->read(null, $id));
	}

	function ambil_matkul($id = null) {
		$this->matkul->read(null, $id);
		//$this->matkul->saveField('IS_BUKA', 0);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	function getmatkul() {
		$this->layout = 'ajax';
		if(!empty($this->data['JURUSAN'])){
			$mahasiswa = $this->Session->read('Auth');
			$option = $this->Option->find('first');
			
			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");
		
			$this->FormStudi->recursive = 1;
			$fr = $this->FormStudi->find('first',array(
				'conditions'=>array('FormStudi.NIM'=>$mahasiswa['User']['USERNAME'],'FormStudi.ttahun_ajaran_id'=>$tahun_ajaran_aktif,'tsemester_id'=>$semester_aktif),
				'fields'=>array('FormStudi.*')
			));
			//pr($fr);
			$telahdiambil = array();
			if(!empty($fr['KartuStudi'])){
				foreach($fr['KartuStudi'] as $row){
					$telahdiambil[] = $row['kelas_id'];
				}
			}
			$this->Tkelase->recursive = 0;
			$matkultelahdiambil = $this->Tkelase->find('all',array('conditions'=>array('Tkelase.ID'=>$telahdiambil),'fields'=>array('KD_KULIAH')));
			$kdkuliahtelahdiambil = array();
			if(!empty($matkultelahdiambil)){
				foreach($matkultelahdiambil as $row){
					$kdkuliahtelahdiambil[] = $row['Tkelase']['KD_KULIAH'];
				}
			}

			$this->Tmatakuliah->recursive = 1;

			$this->Tmatakuliah->hasMany['Tkelase']['conditions'] = array (
				'Tkelase.TSEMESTER_ID' => $semester_aktif,
				'Tkelase.TTAHUN_AJARAN_ID' => $tahun_ajaran_aktif
			);
			$matkuls = $this->Tmatakuliah->find('all', array (
				'conditions' => array (
					'Tmatakuliah.IS_BUKA' => 1,
					'Tmatakuliah.program_studi_id' => $this->data['Filter']['program_studi_id'],
					'Tmatakuliah.FAKULTAS' => $this->data['Filter']['FAKULTAS'],
					'Tmatakuliah.JURUSAN' => $this->data['JURUSAN'],
					'NOT'=>array('Tmatakuliah.KD_KULIAH'=>$kdkuliahtelahdiambil)
				)
			));
			
			$program_studi = $this->data['Filter']['program_studi_id'];
			$fakultas = $this->data['Filter']['FAKULTAS'];
			$jurusan = $this->data['JURUSAN'];
			
			$sks_ambil = $this->Tmatakuliah->query("SELECT SUM(SKS)as jumlahSKS FROM tmatakuliahs WHERE
					tmatakuliahs.IS_BUKA = 1 and
					tmatakuliahs.program_studi_id = '" . $program_studi . "' and
					tmatakuliahs.FAKULTAS = '" . $fakultas . "' and
					tmatakuliahs.JURUSAN = '" . $jurusan . "' and
					tmatakuliahs.KD_KULIAH != '" . $kdkuliahtelahdiambil . "'
			");
			
			
			$auth = $this->Session->read('Auth');
			$nim = $auth['User']['USERNAME'];
			$this->Tmahasiswa->recursive = 1;
			$mahasiswa = $this->Tmahasiswa->find('first',array('conditions'=>array('NIM'=>$nim)));
			$jurusan = $mahasiswa['Tmahasiswa']['TJURUSAN_ID'];
			$program = $mahasiswa['Tmahasiswa']['TPROGRAM_ID'];
			$this->loadModel('TsksMinimal');
			$this->TsksMinimal->recursive = 1;
			$sks_minimal = $this->TsksMinimal->find('all',array('conditions'=>array('TsksMinimal.TPROGRAM_ID'=>$this->data['Filter']['program_studi_id'], 'TsksMinimal.TJURUSAN_ID'=>$this->data['JURUSAN'])));
			
			$jum_sks_minimal = $sks_minimal['0']['TsksMinimal']['jumlah']; 
			$jum_sks_ambil = $sks_ambil['0']['0']['jumlahSKS'];

                       // pr($jum_sks_ambil);

			$this->set('sks_ambil', $jum_sks_ambil);
			$this->set('sks_minimal', $jum_sks_minimal);
			$this->set(compact('matkuls'));
		}
	}
	function getjurusan() {
		$this->layout = 'ajax';
		$tjurusans = $this->Tjurusan->find('list', array (
			'conditions' => array (
				'Tjurusan.program_studi_id' => $this->data['Filter']['program_studi_id'],
				'Tjurusan.fakultas' => $this->data['Filter']['FAKULTAS']
			)
		));
		$this->set(compact('tjurusans'));
	}

	function pdf() {
		$this->layout = 'pdf'; //this will use the pdf.thtml layout
		$this->KartuStudi->recursive = 3;
		//$this->KartuStudi->Tkelase->recursive = 2;
		$auth = $this->Session->read('Auth');
		$option = $this->Option->find('first');
			$tahun_ajaran_aktif = Configure::read("App.ttahun_ajaran_id");
			$semester_aktif = Configure::read("App.tsemester_id");
		
		$nim = $auth['User']['USERNAME'];
		$mahasiswa = $this->Tmahasiswa->findByNim($nim);
		$conditions = array (
			'FormStudi.NIM' => $nim,
			'FormStudi.tsemester_id' => $semester_aktif,
			'FormStudi.ttahun_ajaran_id' => $tahun_ajaran_aktif
		);

		$kartuStudis = $this->KartuStudi->find('all', array (
			'conditions' => $conditions
		));
		$this->set('kartuStudis', $kartuStudis);
		$this->set('mahasiswa', $mahasiswa);
		$this->render();
	}
}
?>
