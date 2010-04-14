<?php
class TsilabusAkademikController extends AppController {

	var $name = 'TsilabusAkademik';
	var $helpers = array (
		'Html',
		'Form'
	);
	var $uses = array ();

	
	function index(/*$front = null*/) {
		//pr($this->params);
		//if ($front)
		//$this->layout = 'front';
			//$this->loadModel('TsilabusAkademik');
		//$this->TsilabusAkademik->recursive = 0;		
		$params = null;
		//if filtered
		if (isset ($this->data['Filter'])) {
			$this->loadModel('Tmatakuliah');
			$url = array (
				'action' => 'index'
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$conditions = array ();
		if (!empty ($this->params['named'])) {
			foreach ($this->params['named'] as $key => $value) {
				if ($key != "page" && $key != "sort" && $key != "direction") {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}
			$this->data['Filter'] = $this->params['named'];
		}
		$this->loadModel('Tmatakuliah');
		$this->set('tsilabusAkademiks', $this->Tmatakuliah->find('all', array (			
			'order' => 'Tmatakuliah.SIFAT, Tmatakuliah.semester', 'conditions'=>$conditions
		)));
		//Get list of faculty/programs/division
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$this->set('jenjang_studi',$tprograms);
		//$tprograms = $this->Tmatakuliah->Tprogram->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list', $params);
		$this->set(compact('tfakultases', 'tprograms', 'tjurusans'));
		
		if (($tfakultases != "") || ($tprograms != "")) {
			$this->set("lblforeignkey", "Jurusan");
		}
		//$this->set('tsilabusAkademiks', $this->paginate('tsilabusAkademiks'));
		//pr($this>paginate);
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid TsilabusAkademik', true), array (
				'action' => 'index'
			));
		}
$this->loadModel('Tmatakuliah');
		$this->set('tsilabusMatakuliah', $this->Tmatakuliah->read(null, $id));

		$this->set('tfile', $this->Tmatakuliah->read(null, $id));
$this->loadModel('TsilabusMingguan');
		$this->set('tjadwalmgg', $this->TsilabusMingguan->find('all', array (
			'conditions' => array (
				'TsilabusMingguan.KD_KULIAH' => $id
			),
			'order' => 'TsilabusMingguan.MINGGU_KE'
		)));

	}

	function viewsilabus($id = null, $front = null) {
		if (!$id) {
			$this->flash(__('Invalid TsilabusAkademik', true), array (
				'action' => 'index'
			));
		}

		// $this->TsilabusMingguan->recursive = 0;
		$this->layout = 'front';
		$this->loadModel('Tmatakuliah');
		$this->set('tsilabusMatakuliah', $this->Tmatakuliah->read(null, $id));

		$this->set('tfile', $this->Tmatakuliah->read(null, $id));

		$this->loadModel('TsilabusMingguan');
		$this->set('tjadwalmgg', $this->TsilabusMingguan->find('all', array (
			'conditions' => array (
				'TsilabusMingguan.KD_KULIAH' => $id
			),
			'order' => 'TsilabusMingguan.MINGGU_KE'
		)));

	}

	function download($id) {
		Configure :: write('debug', 0);
		$this->loadModel('Tfile');
		$file = $this->Tfile->findById($id);

		header('Content-type: ' . $file['Tfile']['type']);
		header('Content-length: ' . $file['Tfile']['size']);
		header('Content-Disposition: attachment; filename="' . $file['Tfile']['name'] . '"');

		echo $file['Tfile']['data'];

		exit ();

	}

	function view_minggu($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TsilabusMingguanKelase.', true));
			$this->redirect(array (
				'action' => 'index'
			));
		}
		$this->loadModel('TsilabusMingguanKelase');
		$this->set('tsilabusMingguanKelases', $this->TsilabusMingguanKelase->read(null, $id));

		$this->set('tsilabusMingguanKelases', $this->paginate(), $this->TsilabusMingguanKelase->find('first', array (
			'conditions' => array (
				'TsilabusMingguanKelase.silabus_mingguan_id' => $id
			)
		)));

		//$this->set('tsilabusMingguanKelases', $this->paginate());  

	}

	function silabus($front = null) {
		if ($front)
		
		$this->layout = 'front';
		//$this->loadModel('TsilabusAkademik');
		$this->TsilabusAkademik->recursive = 0;
		$params = null;
		//if filtered
		if (isset ($this->data['Filter'])) {
			$this->loadModel('Tmatakuliah');
			$url = array (
				'action' => 'silabus/front'
			);
			foreach ($this->data['Filter'] as $key => $value) {
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$conditions = array ();
		if (!empty ($this->params['named'])) {
			foreach ($this->params['named'] as $key => $value) {
				if ($key != "page" && $key != "sort" && $key != "direction") {
					$conditions["Tmatakuliah.$key LIKE"] = "%" . trim($value) . "%";
				}
			}
			$this->data['Filter'] = $this->params['named'];
		}
		//$conditions['Tfakultase.id >'] = 0;
		$this->loadModel('Tmatakuliah');
		$this->set('tsilabusAkademiks', $this->Tmatakuliah->find('all', array (
			'conditions' => $conditions,
			'fields'=> array('Tmatakuliah.KD_KULIAH','Tmatakuliah.NAMA_KULIAH','Tmatakuliah.FAKULTAS','Tmatakuliah.program_studi_id','Tmatakuliah.JURUSAN','Tmatakuliah.KD_KULIAH','Tmatakuliah.SKS','Tmatakuliah.SIFAT',
					'Tmatakuliah.IS_BUKA','Tmatakuliah.semester','Tfakultase.*','JenjangStudi.*'
			),
			'order' =>  'Tmatakuliah.semester','Tmatakuliah.SIFAT'
		)));
		//Get list of faculty/programs/division
		$tfakultases = $this->Tmatakuliah->Tfakultase->find('list');
		$this->loadModel('Refdetil');
		$tprograms = $this->Refdetil->generateList($code = '04');
		$this->set('tprograms',$tprograms);
		//$tprograms = $this->Tmatakuliah->Tprogram->find('list');
		$tjurusans = $this->Tmatakuliah->Tjurusan->find('list', $params);
		$this->set(compact('tfakultases', 'tjurusans'));

		if (($tfakultases != "") || ($tprograms != "")) {
			$this->set("lblforeignkey", "Jurusan");
		}
	}

}
?>