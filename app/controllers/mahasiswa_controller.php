<?php
class MahasiswaController extends AppController {

	var $name = 'Mahasiswa';
	var $uses = array();
	var $helpers = array (
		'Html',
		'Form',
		'Ajax'
	);
	var $components = array('RequestHandler');

	function index() {
		$user = $this->Session->read("Auth");
		$this->loadModel('Tmahasiswa');
		$this->Tmahasiswa->recursive = 0;
		$mahasiswa = $this->Tmahasiswa->find('first', array (
			'conditions' => array (
				"NIM" => $user['User']['USERNAME']
			),
			'fields' => array (
				'Tmahasiswa.*',
				'Tdosen.NIP_DOSEN',
				'Tdosen.NAMA_DOSEN',
				'Tagama.AGAMA_NAME',
				'TtahunAjaran.nama'
			)
		));
		$this->loadModel('Option');
		$this->Option->recursive = -1;
		$option = $this->Option->find('first');
		$this->loadModel('FormStudi');
		$formstudis = $this->FormStudi->find('first', array (
			'conditions' => array (
				'FormStudi.NIM' => $mahasiswa['Tmahasiswa']['NIM'],
				'FormStudi.ttahun_ajaran_id' => $option['Option']['ttahun_ajaran_id'],
				'FormStudi.tsemester_id' => $option['Option']['tsemester_id']
			),
			'fields' => array (
				'FormStudi.*'
			)
		));
		$kelases = array ();
		for ($i = 0; $i < count($formstudis['KartuStudi']); $i++) {
			$kelases[$i] = $formstudis['KartuStudi'][$i]['kelas_id'];
		}
		$this->loadModel('Tpengumuman');
		$this->Tpengumuman->recursive = 1;
		$pengumumans = $this->Tpengumuman->find('all', array (
			'conditions' => array (
				'Tpengumuman.tkelase_id' => $kelases,
				'Tpengumuman.tanggal_mulai <=' => date('Y-m-d'),
				'Tpengumuman.TGL_BERAKHIR' => date('Y-m-d')
			)
		));

		$this->set('tmahasiswa', $mahasiswa);
		$this->set('pengumumans', $pengumumans);

	}

	function formstudi() {
		$this->loadModel('FormStudi');
		$this->FormStudi->recursive = 0;
		$user = $this->Session->read("Auth");
		$this->set("formstudis", $this->FormStudi->find("all", array (
			"conditions" => array (
				"FormStudi.NIM" => $user['User']['USERNAME']
			)
		)));
	}

	function lihatnilai($id) {
		$this->loadModel('FormStudi');
		$this->loadModel('KartuStudi');
		$this->FormStudi->KartuStudi->recursive = 2;
		$this->set("nilais", $this->FormStudi->KartuStudi->find("all", array (
			'conditions' => array (
				'form_studi_id' => $id
			),
			'fields' => array (
				'KartuStudi.*'
			)
		)));
	}
	function history() {
		$user = $this->Session->read("Auth");
		$NIM = $user['User']['USERNAME'];
		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 2;
		$this->loadModel('Option');
		$data = $this->Option->find('first');
		//mencari yg bukan frs sekarang.
		$form_studis_lulus = $this->KartuStudi->find('all', array (
			'conditions' => array (
				'FormStudi.NIM' => $NIM,
				'status_lulus' => "LULUS",
				'concat(FormStudi.ttahun_ajaran_id,FormStudi.tsemester_id) <>' => $data['Option']['ttahun_ajaran_id'] . $data['Option']['tsemester_id']
			)
		));
		$form_studis_tidak = $this->KartuStudi->find('all', array (
			'conditions' => array (
				'FormStudi.NIM' => $NIM,
				'status_lulus' => "TIDAK LULUS",
				'concat(FormStudi.ttahun_ajaran_id,FormStudi.tsemester_id) <>' => $data['Option']['ttahun_ajaran_id'] . $data['Option']['tsemester_id']
			)
		));
		$this->set('form_studis_lulus', $form_studis_lulus);
		$this->set('form_studis_tidak', $form_studis_tidak);
		$this->loadModel('FormStudi');
		$this->FormStudi->recursive = 0;
		$user = $this->Session->read("Auth");
		$this->set("formstudis", $this->FormStudi->find("all", array (
			"conditions" => array (
				"FormStudi.NIM" => $user['User']['USERNAME']
			),
			'fields' => array (
				'FormStudi.*',
				'TtahunAjaran.*',
				'Tsemester.*'
			)
		)));
		$this->render();
	}
	function transkrip($pdf=false) {
		$user = $this->Session->read("Auth");
		$NIM = $user['User']['USERNAME'];
		$this->loadModel('Tmahasiswa');
		//$this->Tmahasiswa->recursive = 2;
		$mahasiswa = $this->Tmahasiswa->findByNim($NIM);
		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 3;

		$listFormStudi = $this->KartuStudi->find('all', array (
			'conditions' => array (
				'FormStudi.NIM' => $NIM
			),
			'fields' => array (
				'KartuStudi.*',
				'FormStudi.*',
				'Tkelase.*'
			),
			//'order' => "",
			'GroupBy' =>'FormStudi.tsemester_id'
		));





		//pr($listFormStudi);

		// inisialisasi 8 array untuk 8 semester
		for ($i = 1; $i <= 8; $i++) {
			$semester[$i] = array ();
		}

		$sksTotal = 0;
		$sksLulus = 0;
		$nilaiTotal = 0;
		// transform data
		//$index = -1;
		foreach ($listFormStudi as $fs) {
			//$index = $index + 1;
			//pr($fs);
			if (isset ($fs['Tkelase']['Tmatakuliah'])) {
				$row = array ();
				$row['kode_kuliah'] = $fs['Tkelase']['Tmatakuliah']['KD_KULIAH'];
				$row['nama_kuliah'] = $fs['Tkelase']['Tmatakuliah']['NAMA_KULIAH'];
				$row['sks'] = $fs['Tkelase']['Tmatakuliah']['SKS'];
				$row['tahun_kur'] = $fs['Tkelase']['Tmatakuliah']['Tkurikulum']['nama'];
				$row['kode'] = isset ($fs['TmasterNilai']['kode']) ? $fs['TmasterNilai']['kode'] : "";
				$row['status_lulus'] = $fs['KartuStudi']['status_lulus'];
				$row['semester'] = $fs['FormStudi']['Tsemester']['NAME'];

				if (!empty ($fs['TmasterNilai'])) {
					$nilaiTotal += ($fs['TmasterNilai']['nilai'] * $fs['Tkelase']['Tmatakuliah']['SKS']);
					$sksLulus += $fs['Tkelase']['Tmatakuliah']['SKS'];
				}
				$sksTotal += $fs['Tkelase']['Tmatakuliah']['SKS'];
				$semester[$fs['Tkelase']['Tmatakuliah']['semester']][] = $row;
				//pr($fs);
			}
		}

		if ($sksLulus > 0)
			$ipk = $nilaiTotal / $sksLulus;
		else
			$ipk = 0;


		$this->set(compact('mahasiswa', 'listFormStudi', 'semester', 'ipk', 'sksTotal', 'sksLulus'));

		if($pdf){
				$this->render(null,"pdf","transkrip_pdf");
		}else{
			$this->render();
		}

	}

	function pembayaran() {
		$this->loadModel('TstatusPembayaran');
		$this->TstatusPembayaran->recursive = 0;
		$user = $this->Session->read("Auth");
		$this->set("tstatusPembayarans", $this->TstatusPembayaran->find("all", array (
			"conditions" => array (
				"TstatusPembayaran.NIM" => $user['User']['USERNAME']
			)
		)));
	}

	function kelas_yg_diikuti() {
		$user = $this->Session->read("Auth");
		$NIM = $user['User']['USERNAME'];

		$this->loadModel('Option');
		$option = $this->Option->find('all');

		$this->loadModel('KartuStudi');
		$this->KartuStudi->recursive = 2;

		$this->loadModel('Tkelase');
		$this->Tkelase->recursive = 0;

		if(!empty($this->data['Filter'])){
			$conditions = array(
				"FormStudi.ttahun_ajaran_id"=>$this->data['Filter']['TTAHUN_AJARAN_ID'],
				"FormStudi.tsemester_id"=>$this->data['Filter']['TSEMESTER_ID'],
				"FormStudi.NIM"=>$NIM);
		} else {
			$conditions = array (
				"FormStudi.NIM" => $NIM,
				"FormStudi.ttahun_ajaran_id" => $option['0']['Option']['ttahun_ajaran_id'],
				"FormStudi.tsemester_id" => $option['0']['Option']['tsemester_id']
			);
			$this->data['Filter']['TTAHUN_AJARAN_ID'] = $option['0']['Option']['ttahun_ajaran_id'];
			$this->data['Filter']['TSEMESTER_ID'] =	$option['0']['Option']['tsemester_id'];



		}
		$KartuStudi = $this->KartuStudi->find("all", array (
				"conditions" => $conditions
			));
			$this->set('KartuStudis', $KartuStudi);

		$ttahunajarans = $this->Tkelase->TtahunAjaran->find("list",$NIM);
		$tsemesters = $this->Tkelase->Tsemester->find("list",$NIM);
		$this->set(compact('ttahunajarans','tsemesters'));

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

	function viewkomponennilai($idkelas) {
		if($this->RequestHandler->isAjax()){
			$this->layout = 'ajax';
			$this->set('isAjax',true);
		}
		$this->loadModel('KartuStudi');
		$tkelase = $this->KartuStudi->read(null, $idkelas);
		$this->set('tkelase', $tkelase);
	}

	function view($id){
		$this->loadModel('Tkelase');
        $kelas = $this->Tkelase->find("first", array("conditions"=>array("Tkelase.id"=>$id)));

        	$this->loadModel('KartuStudi');
			$this->KartuStudi->recursive = 2;
			$kartuStudi = $this->KartuStudi->find("all", array("conditions"=>array("kelas_id"=>$id)));

		$this->set('kelas',$kartuStudi);

		//pr ($kartuStudi);

	}

}
?>
