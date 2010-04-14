<?php
/*
 * Created on Jul 16, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class StatistiksController extends AppController {

	var $name = 'Statistiks';
	var $uses = array();
	var $helpers = array('Html', 'Form', 'FlashChart','Ajax', 'Number');

	function index(){
	}

	function keuangan(){

		if(!empty($this->data)){
			$url = array("action"=>"keuangan");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Statistik->recursive = 0;


		if(empty($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["TstatusPembayaran.$key LIKE"] = "%".trim($value)."%" ;
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];
        }


        $this->loadModel('Periode');

      //$this->Statistik->recursive = 1;

	//	$this->set('Statistiks', $this->paginate('Statistik'));
		$tahunajarans = $this->Periode->TtahunAjaran->find('list');
		$tsemesters = $this->Periode->Tsemester->find('list');
		$this->set(compact('tahunajarans','tsemesters'));
	}


	function get_uang() {
		$this->layout = 'ajax';
		$this->loadModel('FormStudi');

		$jum = $this->FormStudi->query('select count(form_studi.NIM) as jml_mhs From form_studi');
		foreach($jum as $jml){
		$jml_mhs = $jml['0']['jml_mhs'];
		$tstatuspembayarans = $this->FormStudi->query('Select sum(ttahun_ajarans.biaya * ' . $jml_mhs .' ) as jumlah_seharusnya' .
				', sum(tcicilans.jumlah_pembayaran) as jumlah_masuk From ttahun_ajarans, tcicilans, form_studi Where form_studi.ttahun_ajaran_id ='.$this->data['Filter']['tahun_ajaran_id']. ' and form_studi.tsemester_id='.$this->data['Filter']['semester'].
				' and form_studi.ttahun_ajaran_id = ttahun_ajarans.id and ttahun_ajarans.id = '.$this->data['Filter']['tahun_ajaran_id'].' group by form_studi.ttahun_ajaran_id');

		$this->set(compact('tstatuspembayarans'));

		$this->loadModel('Tcicilan');
		$status_lunas = $this->Tcicilan->query('Select count(tstatus_pembayarans.NIM) as jml From tstatus_pembayarans, tcicilans where tcicilans.tstatus_pembayaran_id = tstatus_pembayarans.id and tcicilans.tahun_ajaran_id= '.$this->data['Filter']['tahun_ajaran_id'].' and tcicilans.semester='. $this->data['Filter']['semester'].' and tcicilans.status= "Lunas" group by tcicilans.status');

		$this->set('status_lunas', $status_lunas);

		$status_blm_lunas = $this->Tcicilan->query('Select count(tstatus_pembayarans.NIM) as jml From tstatus_pembayarans, tcicilans where tcicilans.tstatus_pembayaran_id = tstatus_pembayarans.id and tcicilans.tahun_ajaran_id= '.$this->data['Filter']['tahun_ajaran_id'].' and tcicilans.semester='. $this->data['Filter']['semester'].' and tcicilans.status= "Belum Lunas" group by tcicilans.status');

		$this->set('status_blm_lunas', $status_blm_lunas);

		$this->loadModel('TstatusPembayaran');
		$this->loadModel('Tmahasiswa');
		$status_blm_bayar = $this->Tmahasiswa->query('Select count(tmahasiswas.NIM) as jml From tstatus_pembayarans, tmahasiswas where tmahasiswas.NIM not in (SELECT tstatus_pembayarans.NIM from tstatus_pembayarans) and tstatus_pembayarans.tahun_ajaran= '.$this->data['Filter']['tahun_ajaran_id'].' and tstatus_pembayarans.semester='. $this->data['Filter']['semester'].' group by tstatus_pembayarans.id');

		$this->set('status_blm_bayar', $status_blm_bayar);
		}



	}

}

?>
