<?php
class TpengumumansController extends AppController {

	var $name = 'Tpengumumans';
	var $helpers = array('Html', 'Form','Tinymce');

	function index() {
		$this->Tpengumuman->recursive = 0;
		$this->paginate = array(
		'order'=>'TGL_BERAKHIR DESC');
		$this->set('tpengumumen', $this->paginate());
	}
	
	function viewbykelas($id) {
		$dosen = $this->Session->read('Auth');
		$this->Tpengumuman->recursive = 0;
		$this->paginate = array(
		'order'=>'TGL_BERAKHIR DESC',
		'conditions'=>array('tkelase_id'=>$id)
		);
		$this->set('tpengumumen', $this->paginate());
		$this->set('id',$id);
	}
	
	function addbydosen($id=null) {
		if(!empty($this->data)){
			$user = $this->Session->read('Auth');			
			$this->data['Tpengumuman']['ANNOUNCER'] = $user['User']['USERNAME'];
			$this->Tpengumuman->create();
			if ($this->Tpengumuman->save($this->data)) {
				$this->Session->setFlash(__('The Tpengumuman has been saved', true));
				$this->redirect(array('controller'=>'tpengumumans','action'=>'viewbykelas',$this->data['Tpengumuman']['tkelase_id']));
			} else {
				$this->Session->setFlash(__('The Tpengumuman could not be saved. Please, try again.', true));
			}
		}
		$tkelase = $this->Tpengumuman->Tkelase->recursive = 0;
		$tkelase = $this->Tpengumuman->Tkelase->findById($id);		
		$this->set("tkelase",$tkelase);
	}
	
	function editbydosen($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tpengumuman', true));
			$this->redirect(array('controller'=>'tpengumumans','action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tpengumuman->save($this->data)) {
				$this->Session->setFlash(__('The Tpengumuman has been saved', true));
				$this->redirect(array('controller'=>'tpengumumans','action'=>'viewbykelas',$this->data['Tpengumuman']['tkelase_id']));
			} else {
				$this->Session->setFlash(__('The Tpengumuman could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tpengumuman->read(null, $id);
		}		
		$tkelase = $this->Tpengumuman->Tkelase->recursive = 0;
		$tkelase = $this->Tpengumuman->Tkelase->findById($this->data['Tpengumuman']['tkelase_id']);		
		$this->set("tkelase",$tkelase);
		$this->set(compact('tkelases'));
		
	}
	

	function view($id = null, $front=null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tpengumuman.', true));
			$this->redirect(array('action'=>'index'));
		}
		if($front)$this->layout = 'front';
		$this->set('tpengumuman', $this->Tpengumuman->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$user = $this->Session->read('Auth');			
			$this->data['Tpengumuman']['ANNOUNCER'] = $user['User']['USERNAME'];
			$this->Tpengumuman->create();
			if ($this->Tpengumuman->save($this->data)) {
				$this->Session->setFlash(__('The Tpengumuman has been saved', true));
				$this->redirect(array('controller'=>'tpengumumans','action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tpengumuman could not be saved. Please, try again.', true));
			}
		}
		
		$result = $this->Tpengumuman->query("select ID, concat(KD_KULIAH,'-',NAMA_KELAS) as nama from tkelases");		
		$tkelases = array();
		foreach($result as $row){
			$tkelases[$row['tkelases']['ID']] = $row[0]['nama'];
		}		
		$this->set(compact('tkelases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tpengumuman', true));
			$this->redirect(array('controller'=>'tpengumumans','action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tpengumuman->save($this->data)) {
				$this->Session->setFlash(__('The Tpengumuman has been saved', true));
				$this->redirect(array('controller'=>'tpengumumans','action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Tpengumuman could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tpengumuman->read(null, $id);
		}
		
		$result = $this->Tpengumuman->query("select ID, concat(KD_KULIAH,'-',NAMA_KELAS) as nama from tkelases");		
		$tkelases = array();
		foreach($result as $row){
			$tkelases[$row['tkelases']['ID']] = $row[0]['nama'];
		}
		$this->set(compact('tkelases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tpengumuman', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tpengumuman->del($id)) {
			$this->Session->setFlash(__('Tpengumuman deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allowedActions = array ("view");
		}
	}
?>