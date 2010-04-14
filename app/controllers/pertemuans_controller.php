<?php
class PertemuansController extends AppController {

	var $name = 'Pertemuans';
	var $helpers = array('Html', 'Form','Ajax');

	function index() {

        if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Pertemuan'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		if(!empty($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Pertemuan.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter'] = $this->params['named'];
        }
        $this->set('pertemuans', $this->paginate('Pertemuan'));
       	$tkelases = $this->Pertemuan->Tkelase->find('list');
		$this->loadModel('Tmatakuliah');
        $tfakultases = $this->Tmatakuliah->Tfakultase->find('list');

		$this->loadModel('Tprogram');
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

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Pertemuan.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('pertemuan', $this->Pertemuan->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->layout = 'ajax';
			$this->Pertemuan->create();
            $this->data['Pertemuan']['tanggal'] = date('Y-m-d',strtotime($this->data['Pertemuan']['tanggal']));

			if ($this->Pertemuan->save($this->data)) {
				$this->set("simpan","Data Pertemuan Sudah Tersimpan");
			} else {
				$this->Session->setFlash(__('The Pertemuan could not be saved. Please, try again.', true));
			}
		}


		$tkelases = $this->Pertemuan->Tkelase->find('list');
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
			$this->Session->setFlash(__('Invalid Pertemuan', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pertemuan->save($this->data)) {
				$this->Session->setFlash(__('The Pertemuan has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Pertemuan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pertemuan->read(null, $id);
		}
		$tkelases = $this->Pertemuan->Tkelase->find('list');
		$truangKuliahs = $this->Pertemuan->TruangKuliah->find('list');
		$this->set(compact('tkelases','truangKuliahs'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Pertemuan', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pertemuan->del($id)) {
			$this->Session->setFlash(__('Pertemuan deleted', true));
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
		$this->loadModel('Tkelase');
		$this->Tmatakuliah->recursive = 0;
        $this->Tkelase->recursive = 0;
		$tmatakuliahs = $this->Tmatakuliah->findByKdKuliah($this->data['Tkelase']['KD_KULIAH']);
		$tkelases = $this->Tkelase->find('list',
					array ('conditions'=>$conditions,'fields'=>array('NAMA_KELAS')));

		$this->set(compact('tkelases','tmatakuliahs'));
	}

    function getjurusan() {
		$this->layout="ajax";
		$this->loadModel('Tjurusan');
		$tjurusans = $this->Tjurusan->find('list', array ('conditions'=>array('Tjurusan.program_studi_id'=>$this->data['Filter']['program_studi_id'],'Tjurusan.fakultas'=>$this->data['Filter']['FAKULTAS'])));
		$this->set(compact('tjurusans'));
	}

    function search(){

        $pertemuans = $this->Pertemuan->find('all',array('conditions'=>array('kelas_id'=>$this->data['Filter']['kelas_id'])));
        $this->set('pertemuans',$pertemuans);
        $this->redirect(array('action'=>'index'));
    }

    function simpan() {
		if (!empty($this->data)) {
			$this->layout = 'ajax';
			$this->Pertemuan->create();
            $this->data['Pertemuan']['tanggal'] = date('Y-m-d',strtotime($this->data['Pertemuan']['tanggal']));

			if ($this->Pertemuan->save($this->data)) {
				$this->set("simpan","Data Pertemuan Sudah Tersimpan");
			} else {
				$this->Session->setFlash(__('The Pertemuan could not be saved. Please, try again.', true));
			}
		}
		$tkelases = $this->Pertemuan->Tkelase->find('list');
		$this->loadModel('Tmatakuliah');
        $tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');

		$tjurusans = null;
		$this->loadModel('Tkelase');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$tmatakuliahs = null;//$this->Tkelase->Tmatakuliah->find('list', array('conditions'=> array('IS_BUKA'=>"1")));
		$ttahunAjarans = $this->Tkelase->TtahunAjaran->find('list');
		$this->loadModel('Jadwal');
        $truangkuliahs = $this->Jadwal->TruangKuliah->find('list');

		$this->set(compact('tsemesters', 'tmatakuliahs', 'ttahunAjarans', 'truangkuliahs','tfakultases','tprograms','tjurusans'));
	}
}
?>
