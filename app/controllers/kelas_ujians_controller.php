<?php
class KelasUjiansController extends AppController {

	var $name = 'KelasUjians';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->KelasUjian->recursive = 0;
		
		
		if(isset($this->data['Filter'])) {
			$conditions = array();
			foreach($this->data['Filter'] as $key => $value) {
				if(!empty($value)) {
					$conditions["KelasUjian.$key"] = $value;
				}
			}
			$this->paginate = array(
				'conditions' => $conditions
			);
		}
		$this->set('kelasUjians', $this->paginate());
		
		$tmatakuliahs = $this->KelasUjian->Tmatakuliah->find('list');
		$tsemesters = $this->KelasUjian->Tsemester->find('list');
		$ttahunAjarans = $this->KelasUjian->TtahunAjaran->find('list');
		$jenjangs = $this->KelasUjian->Jenjang->find('list',array(
			'fields' => array('Jenjang.value'),
			'conditions' => array('Jenjang.refmaster_id' => '4'),
			'order' => array('Jenjang.id')
		));
		$tfakultas = $this->KelasUjian->Tfakultas->find('list');
		$tjurusans = $this->KelasUjian->Tjurusan->find('list');
		$this->set(compact('tmahasiswas','truangKuliahs','tmatakuliahs',
			'tsemesters','ttahunAjarans','jenjangs','tfakultas','tjurusans'));

	}

	function view($id = null) {
		$this->KelasUjian->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid KelasUjian.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kelasUjian', $this->KelasUjian->read(null, $id));
	}
	
	function cetak($id)
	{
		
		$this->view($id);
		$this->render(null,"pdf","cetak");
	}

	function add() {
		if (!empty($this->data)) {
			$this->KelasUjian->create();
			if ($this->KelasUjian->save($this->data)) {
				$this->Session->setFlash(__('The KelasUjian has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KelasUjian could not be saved. Please, try again.', true));
			}
		}
		$tmahasiswas = $this->KelasUjian->Tmahasiswa->find('list',array('fields' => array('Tmahasiswa.NAMA')));
		$truangKuliahs = $this->KelasUjian->TruangKuliah->find('list');
		$tmatakuliahs = $this->KelasUjian->Tmatakuliah->find('list');
		$tsemesters = $this->KelasUjian->Tsemester->find('list');
		$ttahunAjarans = $this->KelasUjian->TtahunAjaran->find('list');
		$jenjangs = $this->KelasUjian->Jenjang->find('list',array(
			'fields' => array('Jenjang.value'),
			'conditions' => array('Jenjang.refmaster_id' => '4'),
			'order' => array('Jenjang.id')
		));
		
		$tfakultas = $this->KelasUjian->Tfakultas->find('list');
		$tjurusans = $this->KelasUjian->Tjurusan->find('list');
		$this->set(compact('tmahasiswas', 'truangKuliahs', 'tmatakuliahs', 'tsemesters', 'ttahunAjarans', 'jenjangs', 'tfakultas', 'tjurusans'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid KelasUjian', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->KelasUjian->save($this->data)) {
				$this->Session->setFlash(__('The KelasUjian has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KelasUjian could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->KelasUjian->read(null, $id);
		}
		$tmahasiswas = $this->KelasUjian->Tmahasiswa->find('list');
		$truangKuliahs = $this->KelasUjian->TruangKuliah->find('list');
		$tmatakuliahs = $this->KelasUjian->Tmatakuliah->find('list');
		$tsemesters = $this->KelasUjian->Tsemester->find('list');
		$ttahunAjarans = $this->KelasUjian->TtahunAjaran->find('list');
		$jenjangs = $this->KelasUjian->Jenjang->find('list',array(
			'fields' => array('Jenjang.value'),
			'conditions' => array('Jenjang.refmaster_id' => '4'),
			'order' => array('Jenjang.id')
		));
		$tfakultas = $this->KelasUjian->Tfakultas->find('list');
		$tjurusans = $this->KelasUjian->Tjurusan->find('list');
		$this->set(compact('tmahasiswas','truangKuliahs','tmatakuliahs','tsemesters','ttahunAjarans','jenjangs','tfakultas','tjurusans'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for KelasUjian', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->KelasUjian->del($id)) {
			$this->Session->setFlash(__('KelasUjian deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function action_all(){
		//var_dump($this->data);
		//return;
		$this->loadModel('TmahasiswasKelasUjian');
		foreach($this->data['ActionAll']['ids'] as $id){
			$this->TmahasiswasKelasUjian->read(null, $id);
			$this->TmahasiswasKelasUjian->set('present', $this->data['ActionAll']['present']);
			$this->TmahasiswasKelasUjian->save();
		}
		$this->redirect(array('action'=>'view',$this->data['ActionAll']['kelas_ujian_id']));
	}
	
	function delete_peserta($id = null) {
		$this->loadModel('TmahasiswasKelasUjian');
		if (!$id) {
			$this->Session->setFlash(__('Peserta KelasUjian', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$kelas = $this->TmahasiswasKelasUjian->read(null, $id);
		if ($this->TmahasiswasKelasUjian->del($id)) {
			$this->Session->setFlash(__('Peserta deleted', true));
			$this->redirect(array('action'=>'view',$kelas['TmahasiswasKelasUjian']['kelas_ujian_id']));
		}
	}

}
?>
