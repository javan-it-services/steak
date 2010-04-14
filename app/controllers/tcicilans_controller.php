<?php
class TcicilansController extends AppController {

	var $name = 'Tcicilans';
	var $helpers = array('Html', 'Form');
	//var $uses = array('Tcicilan','TstatusPembayaran','Tfakultase','Tjurusan');

	function index() {
		$this->loadModel('Tcicilan');

		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Tcicilan->recursive = 0;
		
	//pr($this->params['named']['NIM']);	
	
		if(!empty($this->params['named'])) {
            /*$conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tcicilan.$key LIKE"] = "%".trim($value)."%" ;
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];*/
			
			$conditions = array();
			if(isset($this->params['named']['tahun_ajaran_id'])){
				$conditions['Tcicilan.tahun_ajaran_id'] = $this->params['named']['tahun_ajaran_id'];
			}
			if(isset($this->params['named']['semester'])){
				$conditions['Tcicilan.semester'] = $this->params['named']['semester'];
			}
			if(isset($this->params['named']['TJURUSAN_ID'])){
				$conditions['Tcicilan.tjurusan_id'] = $this->params['named']['TJURUSAN_ID'];
			}
			if(isset($this->params['named']['TFAKULTAS_ID'])){
				$conditions['Tcicilan.tfakultas_id'] = $this->params['named']['TFAKULTAS_ID'];
			}
			if(isset($this->params['named']['NIM'])){
				$conditions['TstatusPembayaran.NIM like '] = "%".$this->params['named']['NIM']."%";
			}
			$this->paginate = array_merge($this->paginate, array (
				'conditions' => $conditions,

			));
			$this->data['Filter'] = $this->params['named'];
			
        }
        
        elseif(!empty($this->params['named']['NIM'])){
        		//foreach($this->params['named']['NIM'] as $key => $value) {
                //if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                 //   $conditions["TstatusPembayaran.$key LIKE"] = "%".trim($value)."%" ;
                //}
    //      }
    $conditions["TstatusPembayaran.NIM LIKE"] = "%".trim($this->params['named']['NIM'])."%" ;
            
            $this->paginate =array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];
        }
		$this->set('tcicilans', $this->paginate('Tcicilan'));
		$tahunajarans = $this->Tcicilan->TtahunAjaran->find('list');
		$tjurusans = $this->Tcicilan->Tjurusan->find('list');
		$tfakultases = $this->Tcicilan->Tfakultase->find('list');
		$tsemesters = $this->Tcicilan->Tsemester->find('list');
		$this->set(compact('tahunajarans','tjurusans','tfakultases','tsemesters'));
	}

	/*function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tcicilan', true), array('action'=>'index'));
		}
		$this->set('tcicilan', $this->Tcicilan->read(null, $id));
	}*/

	function add($id = null) {
		$this->set('id', $id);

		if (!empty($this->data)) {
				$this->Tcicilan->create();

				// Cari status pembayaran
				$status = $this->Tcicilan->TstatusPembayaran->find('first', array('conditions' => array('TstatusPembayaran.id' => $this->data['Tcicilan']['tstatus_pembayaran_id'] )));
				$status_id = $status['TstatusPembayaran']['id'];
				// Cari Mahasiswa
				$mhs = $this->Tcicilan->TstatusPembayaran->Tmahasiswa->find('first', array('conditions' => array('Tmahasiswa.NIM' => $status['TstatusPembayaran']['NIM'])));
				$status_mhs = $status['TstatusPembayaran']['NIM'];
				$status_sem = $status['TstatusPembayaran']['semester'];
				$status_thn = $status['TstatusPembayaran']['tahun_ajaran'];
				//$mhs = $this->Tcicilan->TstatusPembayaran->Tmahasiswa->find('first', array('conditions' => array('Tmahasiswa.NIM' => $status['TstatusPembayaran']['NIM'])));
				$jur = $mhs['Tmahasiswa']['TJURUSAN_ID'];
				$fak = $mhs['Tmahasiswa']['TFAKULTAS_ID'];
				// Cari Mahasiswa status pembayaran Lunas
				$condLunas = array('Tcicilan.tstatus_pembayaran_id' => $this->data['Tcicilan']['tstatus_pembayaran_id'], 'Tcicilan.sisa' => 0, 'Tcicilan.status' => 'Lunas' );
				$mhsLunas = $this->Tcicilan->find('first', array('conditions' => $condLunas, 'order' => 'Tcicilan.id DESC'));
				$this->set('mhsLunas', $mhsLunas);

			if(!empty($mhsLunas)){
				//Tidak bisa add karena sudah lunas
					$this->set("error","Cicilan Pembayaran NIM: ".$status_mhs." Tahun Ajaran: ".$mhsLunas['TtahunAjaran']['nama']." Semester: ".$mhsLunas['Tcicilan']['semester']." Sudah Lunas");
			}else{
				// Cari Mahasiswa status pembayaran Belum Lunas
				$condNot = array('Tcicilan.tstatus_pembayaran_id' => $status['TstatusPembayaran']['id'], 'Tcicilan.sisa > ' => 0 );
				$condNot = array('Tcicilan.tstatus_pembayaran_id' => $this->data['Tcicilan']['tstatus_pembayaran_id'], 'Tcicilan.sisa > ' => 0 );
				$mhsNot = $this->Tcicilan->find('first', array('conditions' => $condNot, 'order' => 'Tcicilan.id DESC'));
				$ke = $mhsNot['Tcicilan']['cicilan_ke'] + 1;

			if (!empty($mhsNot)) {
				//Mahasiswa belum lunas (Cari data cicilan sebelumnya)
				$saldo = $mhsNot['Tcicilan']['sisa'];
				$sisa =  $saldo - $this->data['Tcicilan']['jumlah_pembayaran'];

				if ($this->Tcicilan->save($this->data)) {
					$this->Tcicilan->saveField("tstatus_pembayaran_id",$mhsNot['Tcicilan']['tstatus_pembayaran_id']);
					$this->Tcicilan->saveField("sisa",$sisa);
					$this->Tcicilan->saveField("cicilan_ke",$ke);
					$this->Tcicilan->saveField("tjurusan_id",$jur);
					$this->Tcicilan->saveField("tfakultas_id",$fak);
					$this->Tcicilan->saveField("tahun_ajaran_id",$status_thn);
					$this->Tcicilan->saveField("semester",$status_sem);
					if($sisa > 0){
						$this->Tcicilan->saveField("status","Belum lunas");
					}else{
						$this->Tcicilan->saveField("status","Lunas");
					}
					$this->flash(__('Tcicilan saved.', true), array('action'=>'index'));
					$this->redirect(array('controller'=>'TstatusPembayarans', 'action'=>'index'));
				} else {}
			}else{
				//Mahasiswa belum bayar (ambil data dari status pembayaran)
				$conditions = array('TstatusPembayaran.NIM' => $mhs['Tmahasiswa']['NIM']);
				$pembayaran = $this->Tcicilan->TstatusPembayaran->find('first',array('conditions'=>$conditions));
				$sisa =  $pembayaran['TstatusPembayaran']['totalbiaya'] - $this->data['Tcicilan']['jumlah_pembayaran'];

				if ($this->Tcicilan->save($this->data)) {
					$this->Tcicilan->saveField("tstatus_pembayaran_id",$pembayaran['TstatusPembayaran']['id']);
					$this->Tcicilan->saveField("sisa",$sisa);
					$this->Tcicilan->saveField("cicilan_ke",1);
					$this->Tcicilan->saveField("tjurusan_id",$jur);
					$this->Tcicilan->saveField("tfakultas_id",$fak);
					if($sisa > 0){
						$this->Tcicilan->saveField("status","Belum lunas");
					}else{
						$this->Tcicilan->saveField("status","lunas");
					}
					$this->flash(__('Tcicilan saved.', true), array('action'=>'index'));
					$this->redirect(array('controller'=>'TstatusPembayarans', 'action'=>'index'));
				} else {}

			}
			}
		}
		$tahunajarans = $this->Tcicilan->TtahunAjaran->find('list');
		$tsemesters = $this->Tcicilan->Tsemester->find('list');
		$this->set(compact('tmahasiswas','tahunajarans','tsemesters'));


	}

	function edit($id = null) {
		$this->set('id', $id);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Tcicilan saved.', true));
			$this->redirect(array('action'=>'index'));
		}
			if (!empty($this->data)) {
				if ($this->Tcicilan->save($this->data)) {
					$mhsstat = $this->Tcicilan->find('first', array('conditions' => array('Tcicilan.id'=>$id)));
					$nim = $this->Tcicilan->TstatusPembayaran->find('first', array('conditions'=>array('TstatusPembayaran.id'=> $mhsstat['Tcicilan']['tstatus_pembayaran_id'])));
					$cicil_terakhir = $mhsstat['Tcicilan']['cicilan_ke'];
					$sisa_terakhir = $mhsstat['Tcicilan']['sisa'];
					//Cari Cicilan
					$edited = $this->Tcicilan->find('first', array('conditions' => array('Tcicilan.id'=>$this->data['Tcicilan']['id'])));
					$nim = $this->Tcicilan->TstatusPembayaran->find('first', array('conditions'=>array('TstatusPembayaran.id'=>$edited['Tcicilan']['tstatus_pembayaran_id'])));
					$saldo = $edited['Tcicilan']['sisa'] + $edited['Tcicilan']['jumlah_pembayaran'];
					$ke = $edited['Tcicilan']['cicilan_ke'];
					if($this->data['Tcicilan']['jumlah_pembayaran'] > $saldo){
						//Tidak bisa edit karena jumlah pembayaran lebih
						$this->set("error","Sisa Pembayaran Tinggal Sebesar ".$saldo);
					}else{
						$sisa = $mhsstat['TstatusPembayaran']['totalbiaya'] - $mhsstat['Tcicilan']['jumlah_pembayaran'];
					}
					if ($this->Tcicilan->save($this->data)) {
						$sisa = $saldo - $this->data['Tcicilan']['jumlah_pembayaran'];
						$this->Tcicilan->saveField("sisa",$sisa);
						if($sisa > 0){
							$this->Tcicilan->saveField("status","Belum lunas");
						}else{
						$this->Tcicilan->saveField("status","lunas");
						}

						$this->Session->setFlash(__('Tcicilan saved.', true));
						$this->redirect(array('action'=>'index'));

					} else {}
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Tcicilan->read(null, $id);
			}

	}


	function delete($id = null) {
		//$this->loadModel('Tcicilan');
		if (!$id) {
			$this->flash(__('Invalid Tcicilan', true), array('action'=>'index'));
		}
		if ($this->Tcicilan->del($id)) {
			$this->flash(__('Tcicilan deleted', true), array('action'=>'index'));
			$this->redirect(array('action'=>'index'));
		}
	}

	
}
?>
