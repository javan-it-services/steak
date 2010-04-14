<?php
class FrontController extends AppController {
	var $paginate = array (
		'fields' => array (
			'User.id',
			'User.USERNAME',
			'User.ENABLED_USER',
			'User.VALID_START_USER',
			'User.VALID_FINISH_USER',
			'User.TYPE',
			'Tmahasiswa.NAMA',
			'Tdosen.NAMA_DOSEN',
			'Tpegawai.NAMA_pegawai'
		)
	);
	var $uses = array ();

	var $helpers = array('Html', 'Form','Tinymce');

	function view($id = null) {
	/*	if (!$id) {
			$this->Session->setFlash(__('Invalid Tberita.', true));
			$this->redirect(array('action'=>'index'));
		}
	*/
		$this->layout='front';
		$this->set('tberita', $this->Tberita->read(null, $id));
	}

	function index() {
		$this->layout = 'front';
		$this->loadModel('Tberita');
		$this->loadModel('Tpengumuman');

		$this->set("beritas", $this->Tberita->find('all', array (
			"order" => "created DESC, JUDUL_BERITA DESC",
			"limit" => 5,
			'conditions' => array (
				'END_VALID_BERITA >= ' => date('Y-m-d'),
				'START_VALID_BERITA <= ' => date('Y-m-d')
			)
		)));
		$this->Tpengumuman->recursive = 2;
		$this->set("pengumumans", $this->Tpengumuman->find('all', array (
			"order" => "created DESC",
			"limit" => 5,
			'conditions' => array (
				'TGL_BERAKHIR >= ' => date('Y-m-d'),
				'tanggal_mulai <= ' => date('Y-m-d')
			)
		)));
	}
	function login(){
		$this->layout="login";
	}
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index','login');
	}
}
