<?php
class TmatakuliahsController extends AppController {

	var $name = 'Tmatakuliahs';
	var $helpers = array (
		'Html',
		'Form'
	);


	function index() {

		$this->Tmatakuliah->recursive = 0;
		$params = null;
		if (isset ($this->data['Filter'])) {
			$url = array (
				'action' => 'index'
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);

		}
		if (!empty($this->params['named'])) {
			$conditions = array ();
			foreach ($this->params['named'] as $key => $value) {
				if ($key!="page"&&$key!="sort"&&$key!="direction") {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}

			$this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter']=$this->params['named'];
			$this->set('tmatakuliahs', $this->paginate());
		}
		$this->set('tmatakuliahs', $this->paginate());

		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('jenjang_studi',$jenjang_studi);
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list',$params);
		$tkurikulums = $this->Tmatakuliah->Tkurikulum->find('list');
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans','tkurikulums'));

		if (($tfakultases != "") || ($jenjang_studi != "")) {
			$this->set("lblforeignkey", "Jurusan");

		}

	}

	function indexbuka() {
		$this->Tmatakuliah->recursive = 0;
		if (isset ($this->data['Filter'])) {
			$conditions = array ();
			foreach ($this->data['Filter'] as $key => $value) {
				if (!empty ($value)) {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}
			$this->paginate = array (
				'conditions' => $conditions
			);
		}

		if (!empty($this->params['named'])) {
			$conditions = array ();
			foreach ($this->params['named'] as $key => $value) {
				if ($key!="page"&&$key!="sort"&&$key!="direction") {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}

			$this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter']=$this->params['named'];
			$this->set('tmatakuliahs', $this->paginate());
		}

		$this->set('tmatakuliahs', $this->paginate(array (
			'IS_BUKA' => 1
		)));
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list');
		$tkurikulums = $this->Tmatakuliah->Tkurikulum->find('list');
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans','tkurikulums'));
	}

	function indextutup() {
		$this->Tmatakuliah->recursive = 0;
		if (isset ($this->data['Filter'])) {
			$conditions = array ();
			foreach ($this->data['Filter'] as $key => $value) {
				if (!empty ($value)) {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}
			$this->paginate = array (
				'conditions' => $conditions
			);
		}

		if (!empty($this->params['named'])) {
			$conditions = array ();
			foreach ($this->params['named'] as $key => $value) {
				if ($key!="page"&&$key!="sort"&&$key!="direction") {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}

			$this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));

			$this->data['Filter']=$this->params['named'];
			$this->set('tmatakuliahs', $this->paginate());
		}

		$this->set('tmatakuliahs', $this->paginate(array (
			'IS_BUKA' => 0
		)));
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list');
		$tkurikulums = $this->Tmatakuliah->Tkurikulum->find('list');
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans','tkurikulums'));
	}

	function dobuka($id = null) {
		$this->Tmatakuliah->read(null, $id);
		$this->Tmatakuliah->saveField('IS_BUKA', 1);
		header('Location:' . $_SERVER['HTTP_REFERER']);

	}
	function dotutup($id = null) {
		$this->Tmatakuliah->read(null, $id);
		$this->Tmatakuliah->saveField('IS_BUKA', 0);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tmatakuliah', true), array (
				'action' => 'index'
			));
		}
		$this->loadModel('Tmatakuliah');

		$this->Tmatakuliah->recursive = 0;
		$tmatakuliah = $this->Tmatakuliah->read(null, $id);
		$this->set('tmatakuliah', $tmatakuliah);

		$this->loadModel('Option');
		$this->Option->recursive = -1;
		$option = $this->Option->find('first');
		$this->Tmatakuliah->Tkelase->recursive = -1;
		$tkelase = $this->Tmatakuliah->Tkelase->find('all',array(
			'conditions'=>array('Tkelase.KD_KULIAH'=>$tmatakuliah['Tmatakuliah']['KD_KULIAH'],
								'TTAHUN_AJARAN_ID'=>$option['Option']['ttahun_ajaran_id'],
								'TSEMESTER_ID'=>$option['Option']['tsemester_id'])
		));
		$kelases = array();
		for($i=0;$i<count($tkelase);$i++){
			$kelases[$i] = $tkelase[$i]['Tkelase']['ID'];
		}
		$this->loadModel('Tpengumuman');
		$this->Tpengumuman->recursive = 1;
		$pengumumans = $this->Tpengumuman->find('all',array(
			'conditions'=>array('Tpengumuman.tkelase_id'=>$kelases,'Tpengumuman.tanggal_mulai <='=>date('Y-m-d'),'Tpengumuman.TGL_BERAKHIR'=>date('Y-m-d'))
		));
		$this->set('pengumumans',$pengumumans);
	}

	function add() {

		if (!empty ($this->data)) {

			$this->Tmatakuliah->create();
			if ($this->Tmatakuliah->save($this->data)) {
				$this->loadModel('Tmatakuliah');
				$this->Session->setFlash(__('The MataKuliah has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
			}
		}
		$this->loadModel('Refdetil');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('jenjang_studi',$jenjang_studi);
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list');
		$tkurikulums = $this->Tmatakuliah->Tkurikulum->find('list');
		$sifats = array('Wajib'=>'Wajib', 'Pilihan'=>'Pilihan');
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans', 'tkurikulums', 'sifats'));
	}

	function edit($id = null) {
		if (!$id && empty ($this->data)) {
			$this->flash(__('Invalid Tmatakuliah', true), array (
				'action' => 'index'
			));
		}
		if (!empty ($this->data)) {
			if ($this->Tmatakuliah->save($this->data)) {
				$this->Session->setFlash(__('The MataKuliah has been saved', true));
				$this->redirect(array (
					'action' => 'index'
				));
			} else {
			}
		}
		if (empty ($this->data)) {
			$this->data = $this->Tmatakuliah->read(null, $id);
		}
		$this->loadModel('Refdetil');
		$sifats = array('Wajib'=>'Wajib', 'Pilihan'=>'Pilihan');
		$jenjang_studi = $this->Refdetil->generateList($code = '04');
		$this->set('jenjang_studi',$jenjang_studi);
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list');
		$tkurikulums = $this->Tmatakuliah->Tkurikulum->find('list');
		$this->set(compact('tfakultases',  'tjurusans', 'tkurikulums', 'sifats'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('The MataKuliah has been deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		if ($this->Tmatakuliah->del($id)) {
			$this->loadModel('Tmatakuliah');
			$this->Session->setFlash(__('The MataKuliah has been deleted', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
	}

}
?>
