<?php
class TstatusPembayaransController extends AppController {

	var $name = 'TstatusPembayarans';
	var $helpers = array (
		'Html',
		'Form',
		'Ajax',
		'Javascript'
	);


	function index() {
		$this->loadModel('TstatusPembayaran');
		$this->TstatusPembayaran->recursive = 1;
	//	pr($this->params['named']);
		if (!empty ($this->data)) {
			$url = array (
				"action" => "index"
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);
		}

		elseif (!empty ($this->params['named'])) {
			$conditions = array();
			if(isset($this->params['named']['TTAHUN_AJARAN_ID'])){
				$conditions['TstatusPembayaran.tahun_ajaran'] = $this->params['named']['TTAHUN_AJARAN_ID'];
			}
			if(isset($this->params['named']['TSEMESTER_ID'])){
				$conditions['TstatusPembayaran.semester'] = $this->params['named']['TSEMESTER_ID'];
			}
			if(isset($this->params['named']['ANGKATAN'])){
				$conditions['Tmahasiswa.ANGKATAN'] = $this->params['named']['ANGKATAN'];
			}
			if(isset($this->params['named']['NIM'])){
				$conditions['TstatusPembayaran.NIM like '] = "%".$this->params['named']['NIM']."%";
			}
			$this->paginate = array_merge($this->paginate, array (
				'conditions' => $conditions,

			));
			$this->data['Filter'] = $this->params['named'];
		}
		else{
			$this->loadModel('Option');
			$option = $this->Option->find("first");
			$this->data["Filter"]['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
			$this->data["Filter"]['TSEMESTER_ID'] = $option['Option']['tsemester_id'];
			$conditions['tahun_ajaran'] = $option['Option']['ttahun_ajaran_id'];
			$conditions['semester'] = $option['Option']['tsemester_id'];
			
			$this->paginate = array_merge($this->paginate, array (
				'conditions' => $conditions,

			));
		}

		$this->set('tstatusPembayarans', $this->paginate("TstatusPembayaran"));

		$this->loadModel('TstatusPembayaran');
		$ttahunajarans = $this->TstatusPembayaran->TtahunAjaran->find('list');
		$tsemesters = $this->TstatusPembayaran->Tsemester->find('list');
		$this->set(compact('ttahunajarans', 'tsemesters'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TstatusPembayaran.', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		$this->loadModel('TstatusPembayaran');
		$this->set('tstatusPembayaran', $this->TstatusPembayaran->read(null, $id));
	}

	function add($nim=null) {
		
		//////////
		if (!empty ($this->data)) {
			$this->loadModel('TstatusPembayaran');
			//pr($this->data);
			$mhsbayar = $this->TstatusPembayaran->find('first', array('conditions' => array('TstatusPembayaran.NIM' => $this->data['TstatusPembayaran']['NIM'], 'TstatusPembayaran.tahun_ajaran'=>$this->data['TstatusPembayaran']['tahun_ajaran'], 'TstatusPembayaran.semester'=>$this->data['TstatusPembayaran']['semester'] )));
			//pr($mhsbayar);
			if(!empty($mhsbayar)){
				//Tidak bisa add karena sudah bayar
					$this->set("error","NIM: ".$this->data['TstatusPembayaran']['NIM']." Tahun Ajaran: ".$mhsbayar['TtahunAjaran']['nama']." Semester: ".$mhsbayar['Tsemester']['NAME']."<br> Sudah Melakukan Pembayaran");
			}else{
							
				$this->loadModel('TtahunAjaran');
				$tahun = $this->TtahunAjaran->find('first', array('conditions'=> array('TtahunAjaran.id'=>$this->data['TstatusPembayaran']['tahun_ajaran'])));
				$totalbiaya = $tahun['TtahunAjaran']['biaya'];
				$sks = $tahun['TtahunAjaran']['skspaket'];
				$this->loadModel('TstatusPembayaran');
				$this->TstatusPembayaran->create();
				if ($this->TstatusPembayaran->save($this->data)) {
					$this->TstatusPembayaran->saveField("totalbiaya", $totalbiaya);
					$this->TstatusPembayaran->saveField("maxsks", $sks);
					if($this->data['TstatusPembayaran']['keterangan'] == 'cicilan'){
						$id_status = $this->TstatusPembayaran->find('first');
						$this->loadModel('Tmahasiswa');
						$data_mhs = $this->TstatusPembayaran->Tmahasiswa->find('first',array('conditions'=>array('Tmahasiswa.NIM'=>$id_status['TstatusPembayaran']['NIM'])));
						$this->loadModel('Tcicilan');
						$jur = $data_mhs['Tjurusan']['kodejurusan'];
						$fak = $data_mhs['Tfakultase']['id'];
						$thn = $data_mhs['TtahunAjaran']['id'];
						$this->Tcicilan->create();
						$this->Tcicilan->saveField("tstatus_pembayaran_id",$id_status['TstatusPembayaran']['id']);
						$this->Tcicilan->saveField("tjurusan_id",$jur);
						$this->Tcicilan->saveField("tfakultas_id", $fak);
						$this->Tcicilan->saveField("tahun_ajaran_id",$this->data['TstatusPembayaran']['tahun_ajaran']);
						$this->Tcicilan->saveField("semester",$this->data['TstatusPembayaran']['semester']);
						$this->Tcicilan->saveField("tanggal", $id_status['TstatusPembayaran']['created']);
						$this->Tcicilan->saveField("cicilan_ke", "1");
						$this->Tcicilan->saveField("jumlah_pembayaran", $this->data['TstatusPembayaran']['cicilan_ke']);
						$sisa = $totalbiaya - $this->data['TstatusPembayaran']['cicilan_ke'];
						$this->Tcicilan->saveField("sisa", $sisa);
						$this->Tcicilan->saveField("status", "Belum lunas");

					}

					$this->Session->setFlash(__('The TstatusPembayaran has been saved', true));
					$this->redirect(array (	'action' => 'index'));
				}

			}
			///////
			
			
		}
		/*if($nim){
			$this->set("nim",$nim);
		$this->loadModel('Tmahasiswa');
		$this->loadModel('TstatusPembayaran');
			$mahasiswa = $this->TstatusPembayaran->Tmahasiswa->findByNim($nim);
			$this->set("mahasiswa",$mahasiswa);
<<<<<<< .mine
			//pr($mahasiswa);
		}
=======
		}*/

		$tmahasiswas = $this->TstatusPembayaran->Tmahasiswa->find('list');
		$ttahunajarans = $this->TstatusPembayaran->TtahunAjaran->find('list');
		$tsemesters = $this->TstatusPembayaran->Tsemester->find('list');
		$this->set(compact('tmahasiswas', 'ttahunajarans', 'tsemesters'));
		$this->loadModel('Option');
		$this->Option->recursive = -1;
		$option = $this->Option->find('first');
		$this->data['TstatusPembayaran']['tahun_ajaran'] = $option['Option']['ttahun_ajaran_id'];
		$this->data['TstatusPembayaran']['semester'] = $option['Option']['tsemester_id'];
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
			$this->loadModel('TstatusPembayaran');
			$this->loadModel('Tmahasiswa');
			$mahasiswa = $this->TstatusPembayaran->Tmahasiswa->findByNim($nim);
			if($mahasiswa){
				$payments = $this->TstatusPembayaran->find("all",array("conditions"=>array("TstatusPembayaran.NIM"=>$nim)));
				if(empty($payments)){
					$this->set("error","Tidak ada history pembayaran");
				}
				$this->set("payments",$payments);
			}
			else{
				$this->set("error","Mahasiswa dengan NIM : $nim tidak ditemukan.");
			}
			$this->data["Mahasiswa"]["NIM"] = $nim;
			$this->set("nim",$nim);
		}
	}

	function edit($id = null) {
		if (!$id && empty ($this->data)) {
			$this->Session->setFlash(__('Invalid Status Pembayaran', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if (!empty ($this->data)) {
			$this->loadModel('TstatusPembayaran');
			if ($this->TstatusPembayaran->save($this->data)) {
				$this->Session->setFlash(__('The TstatusPembayaran has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
				$this->Session->setFlash(__('The Status Pembayaran could not be saved. Please, try again.', true));
			}
		}
		if (empty ($this->data)) {

			$this->data = $this->TstatusPembayaran->read(null, $id);
		}
		$tmahasiswas = $this->TstatusPembayaran->Tmahasiswa->find('list');
		$ttahunajarans = $this->TstatusPembayaran->TtahunAjaran->find('list');
		$tsemesters = $this->TstatusPembayaran->Tsemester->find('list');
		$this->set(compact('tmahasiswas', 'ttahunajarans', 'tsemesters'));
	}

	function delete($id = null) {
		$this->loadModel('TstatusPembayaran');
		if (!$id) {
			$this->flash(__('Invalid TstatusPembayaran', true));
			$this->Session->setFlash(__('Invalid Status Pembayaran', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if ($this->TstatusPembayaran->del($id)) {
			$this->Session->setFlash(__('The TstatusPembayaran has been deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

	 function gettext() {
	 	$this->loadModel('TstatusPembayaran');
		$this->layout="ajax";
		//pr($this->data['TstatusPembayaran']['keterangan']);
		$cicil = $this->data['TstatusPembayaran']['keterangan']=='cicilan';

		if($this->data['TstatusPembayaran']['keterangan']=='cicilan'){

			//echo "test";

			$tstatuspembayarans = $this->TstatusPembayaran->find('first', array ('conditions'=>array('TstatusPembayaran.keterangan'=>$this->data['TstatusPembayaran']['keterangan']['cicilan'])));
			$this->set(compact('tstatuspembayarans'));
		//	$this->set('tstatuspembayarans',$tstatuspembayarans);
		}else{
			$this->autoRender = false;
			//echo "kosong";
		}

		//$this->set(cicil,$cicil);



	}

}
?>
