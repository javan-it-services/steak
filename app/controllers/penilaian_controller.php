<?php

class PenilaianController extends AppController
{
	//var $name = 'Penilaian';

    var $helpers = array("Html","Form","Ajax","Fpdf");
	var $components = array("RequestHandler");
	var $uses = array();

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

			//$this->data['Filter'] = $this->params['named'];
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

		/*$this->set('kelas', $this->paginate("Tkelase"));
        $TTAHUN_AJARAN_IDs = $this->Tkelase->TtahunAjaran->find("list");
		$TSEMESTER_IDs = $this->Tkelase->Tsemester->find("list");
        $this->set(compact("dosen","TTAHUN_AJARAN_IDs","TSEMESTER_IDs",'option' ));*/
    }

    function komponen($kelas_id=null){
        //$nip=130515655;//todo: parameter nip dari session atau url
        $this->loadModel('User');
		$user = $this->Session->read("Auth");
		$nip= $user['User']['USERNAME'];
		$this->loadModel('Tkelase');
        $kelas = $this->Tkelase->findById($kelas_id);

        if(!$kelas_id || empty($kelas) || $kelas['Tkelase']['TDOSEN_ID']!=$nip)
            $this->redirect("/penilaian/index");

        $this->set(compact("kelas"));

    }
    function komponen_add(){
        //$this->autoRender = false;
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
            if(!empty($this->data)){
            	$this->loadModel('KomponenNilai');
                $this->KomponenNilai->create();
                if ($this->KomponenNilai->save($this->data)) {
                    $this->KomponenNilai->recursive = -1;
                    $komponenNilai = $this->KomponenNilai->findById($this->KomponenNilai->getLastInsertID());
                    $this->set("komp", $komponenNilai['KomponenNilai']);
                } else {
                    //$this->Session->setFlash(__('The KomponenNilai could not be saved. Please, try again.', true));
                }
            }
        }
    }
    function komponen_delete($id=null){
        $this->autoRender = false;
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
        	$this->loadModel('KomponenNilai');
            if ($this->KomponenNilai->del($id)) {
                echo $id;
                exit();
            }
        }
    }

    function edit($kelas_id){

		$this->loadModel('Tkelase');
        $kelas = $this->Tkelase->find("first", array("conditions"=>array("Tkelase.id"=>$kelas_id)));

        $listKomponenNilai = array();
        foreach($kelas['KomponenNilai'] as $komp){
            $listKomponenNilai[$komp['id']] = $komp['nama'];
        }

        $this->set(compact("kelas","listKomponenNilai"));
    }

    function editAkhir($kelas_id){

		//if form submit
		if(!empty($this->data)){
			
            $this->loadModel('KartuStudi');
			foreach($this->data['KartuStudi'] as $data) {
				//pr($data);
				$this->loadModel('TmasterNilai');
				$status = $this->TmasterNilai->find('first', array('conditions' => array('TmasterNilai.id'=>$data['tmaster_nilai_id'])));
				//pr($status);
				$this->KartuStudi->saveField('id',$data['id']);
				$this->KartuStudi->saveField('nilai_angka',$data['nilai_angka']);
				$this->KartuStudi->saveField('tmaster_nilai_id',$data['tmaster_nilai_id']);
				if($status['TmasterNilai']['lulus'] == '1' ){
					$this->KartuStudi->saveField('status_lulus','LULUS');
				}elseif($status['TmasterNilai']['lulus'] == '0'){
					$this->KartuStudi->saveField('status_lulus','TIDAK LULUS');
				}


			}
			/*pr($this->data);
			$this->loadModel('KartuStudi');

			if($this->KartuStudi->saveAll($this->data["KartuStudi"]))
				$message="Data nilai mahasiswa berhasil disimpan.";
			else
				$message="Perubahan gagal dilakukan.";*/

			//redirect, biar POST datanya ilang
			$this->redirect("/penilaian/editAkhir/".$kelas_id);
		}

		$this->loadModel('Tkelase');
        $kelas = $this->Tkelase->find("first", array("conditions"=>array("Tkelase.id"=>$kelas_id)));
		if($kelas){
			$this->loadModel('TmasterNilai');
			$masterNilai = $this->TmasterNilai->find("all", array("conditions"=>array("aktif"=>1), "order"=>"angka_min DESC"));


			$this->loadModel('KartuStudi');
			$this->KartuStudi->recursive = 2;
			$kartuStudi = $this->KartuStudi->find("all", array("conditions"=>array("kelas_id"=>$kelas_id)));
			foreach($kartuStudi as $key=>$ks){
				$nilaiSeharusnya = 0;
				$hurufSeharusnya = array();
				$hurufSeharusnya['kode'] = "";
				$hurufSeharusnya['id'] = "";

				foreach($ks['KomponenNilai'] as $key2=>$komp){
					$kartuStudi[$key]["Nilai"][$komp['id']] = $komp['KartuStudiKomponenNilai']['nilai'];
					$nilaiSeharusnya += ($komp['persentase']/100*$komp['KartuStudiKomponenNilai']['nilai']);
				}
				$kartuStudi[$key]['NilaiSeharusnya'] = $nilaiSeharusnya;
				foreach($masterNilai as $mn){
					if($nilaiSeharusnya >= $mn['TmasterNilai']['angka_min']){
						$hurufSeharusnya['kode'] = $mn['TmasterNilai']['kode'];
						$hurufSeharusnya['id'] = $mn['TmasterNilai']['id'];
						break;
					}
				}
				$kartuStudi[$key]['HurufSeharusnya'] = $hurufSeharusnya;
			}
			$this->loadModel('TmasterNilai');
			$opsiNilai = $this->TmasterNilai->find("list");
			$this->set(compact("kelas","kartuStudi", "opsiNilai"));
		}else{
			$this->redirect("/penilaian/index");
		}
    }

    function getMahasiswaByKelas($kelas_id){
        //$this->autoRender = false;
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
            if($kelas_id){
                $sql = "SELECT
                            KartuStudiKomponenNilai.komponen_nilai_id, KartuStudiKomponenNilai.nilai,KartuStudiKomponenNilai.id,
                            Mahasiswa.NIM, Mahasiswa.NAMA,
							KartuStudi.id
                        FROM
                            `kartu_studi` KartuStudi
                        LEFT JOIN (
                            SELECT
                                *
                            FROM
                                kartu_studi_komponen_nilai
                            WHERE
                                komponen_nilai_id ={$this->data['KomponenNilai']['id']}
                            ) KartuStudiKomponenNilai
                            ON ( KartuStudiKomponenNilai.kartu_studi_id = KartuStudi.id )
                        LEFT JOIN
                            form_studi fs
                            ON ( fs.id = KartuStudi.form_studi_id )
                        LEFT JOIN
                            tmahasiswas Mahasiswa
                            ON ( Mahasiswa.NIM = fs.nim )
                        WHERE
                            KartuStudi.kelas_id = $kelas_id";
				//pr($sql);
				$this->loadModel('KartuStudi');
				$komponenNilaiId = $this->data['KomponenNilai']['id'];
				$this->loadModel('KartuStudi');
                $listKartuStudi = $this->KartuStudi->query($sql);
                $this->set(compact("komponenNilaiId","listKartuStudi"));
            }
        }
    }

	function save(){
		$this->autoRender = false;
		$this->layout = "ajax";
		if($this->RequestHandler->isAjax() && (!empty($this->data))){
				$this->loadModel('KartuStudiKomponenNilai');
				$this->KartuStudiKomponenNilai->saveAll($this->data["KartuStudiKomponenNilai"]);
		}
	}

	function pdf($kelas_id){
		$this->layout = "pdf";
		$this->loadModel('Tkelase');
        $kelas = $this->Tkelase->find("first", array("conditions"=>array("Tkelase.id"=>$kelas_id)));

		if($kelas){
			$this->loadModel('KartuStudi');
			$this->KartuStudi->recursive = 2;
			$kartuStudi = $this->KartuStudi->find("all", array("conditions"=>array("kelas_id"=>$kelas_id)));
			$data = array();
			$no=1;
			foreach($kartuStudi as $key=>$ks){
				$row["Nilai"]['no'] = $no++;
				$row["Nilai"]['nim'] = $ks['FormStudi']['Tmahasiswa']['NIM'];
				$row["Nilai"]['nama'] = $ks['FormStudi']['Tmahasiswa']['NAMA'];
				$row["Nilai"]['nilai'] = $ks['KartuStudi']['nilai_angka'];
				$row["Nilai"]['huruf'] = $ks['TmasterNilai']['kode'];
				$data[] = $row;
			}

			$this->loadModel('TmasterNIlai');

			$this->loadModel('TmasterNilai');

			$opsiNilai = $this->TmasterNilai->find("list");
			$this->set(compact("data","kelas"));
		}else{
			$this->redirect($this->referer());
		}

	}

	function beforeFilter(){
		parent::beforeFilter();
		$this->set('isDosenWali',$this->Session->read('isDosenWali'));
	}
}
