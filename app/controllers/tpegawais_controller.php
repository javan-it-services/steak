<?php
class TpegawaisController extends AppController {

	var $name = 'Tpegawais';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
	//var $uses = array('Tpegawai','User');
	var $components = array("RequestHandler");

	function index() {
		$this->loadModel('Tpegawai');
		$this->Tpegawai->recursive = 0;
		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Tdosen->recursive = 0;
		if(isset($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tpegawai.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];
        }
		$this->set('tpegawais', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tpegawai', true), array('action'=>'index'));
		}
		$this->set('tpegawai', $this->Tpegawai->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tpegawai->create();
			if ($this->Tpegawai->save($this->data)) {
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		$tagamas = $this->Tpegawai->Tagama->find('list');
		$tpangkats = $this->Tpegawai->Tpangkat->find('list');
		$tpropinsis = $this->Tpegawai->Tpropinsi->find('list');
		$tkabupatens = $this->Tpegawai->Tkabupaten->find('list');
		$tkabupatens2 = $this->Tpegawai->Tkabupaten->find('list');
		$this->set(compact('tagamas','tjabatans','tpangkats','tpropinsis','tkabupatens','tkabupatens2'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Tpegawai', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tpegawai->save($this->data)) {
				$filename = $this->data['Tpegawai']['file_foto']['name'];
				move_uploaded_file(WWW_ROOT.'files/'.$filename,"files/".$id);
				$this->data['Tpegawai']["FOTO"] = "files/".$id;
				$this->Tpegawai->saveField("FOTO","files/".$filename);
				$this->Session->setFlash(__('The Pegawai has been saved', true));
					$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tpegawai->read(null, $id);
		}
		$tagamas = $this->Tpegawai->Tagama->find('list');
		$tpangkats = $this->Tpegawai->Tpangkat->find('list');
		$tpropinsis = $this->Tpegawai->Tpropinsi->find('list');
		$tkabupatens = $this->Tpegawai->Tkabupaten->find('list');
		$tkabupatens2 = $this->Tpegawai->Tkabupaten->find('list');

		$this->set(compact('tagamas','tjabatans','tpangkats','tpropinsis','tkabupatens','tkabupatens2'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid', true));
					$this->redirect(array('action'=>'index'));
		}
		if ($this->Tpegawai->del($id)) {
			$this->Session->setFlash(__('The Pegawai has been saved', true));
					$this->redirect(array('action'=>'index'));
		}
	}

	function getkabupateninstansi() {
		$this->layout="ajax";
		$tkabupatens = $this->Tpegawai->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tpegawai']['KD_PROP_INSTANSI'])));
		$this->set(compact('tkabupatens'));
	}

	function getkabupatenrumah() {
		$this->layout="ajax";
		$tkabupatens2 = $this->Tpegawai->Tkabupaten->find('list', array ('conditions'=>array('Tkabupaten.KD_PROP'=>$this->data['Tpegawai']['KD_PROP_RUMAH'])));
		$this->set(compact('tkabupatens2'));
	}

	function upload(){
		$session = $this->Session;
		$this->layout = 'ajax';
		$filename = $this->data['Tpegawai']['file_foto']['name'];
		$this->set("filename",$filename);
		if(move_uploaded_file($this->data['Tpegawai']['file_foto']['tmp_name'],WWW_ROOT.'files/'.$filename)){
		}
		else{
		}
	}


	function ajax_upload(){
		$this->layout = 'ajax';
		Configure::write('debug', 0);
		$filename = $_FILES['file']['name'];
		echo $_FILES['file']['tmp_name'];
		if (move_uploaded_file($_FILES['file']['tmp_name'], WWW_ROOT .'files/'.$filename)) {
			echo $filename;
		}
	}


}
?>
