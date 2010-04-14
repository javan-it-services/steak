<?php
class KomponenNilaisController extends AppController {

	var $name = 'KomponenNilais';
	var $helpers = array('Html', 'Form');
    var $components = array("RequestHandler");

	function index() {
		$this->KomponenNilai->recursive = 0;
		$this->set('komponenNilais', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid KomponenNilai.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('komponenNilai', $this->KomponenNilai->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->KomponenNilai->create();
			if ($this->KomponenNilai->save($this->data)) {
				$this->Session->setFlash(__('The KomponenNilai has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KomponenNilai could not be saved. Please, try again.', true));
			}
		}
		$kartuStudis = $this->KomponenNilai->KartuStudi->find('list');
		$tkelases = $this->KomponenNilai->Tkelase->find('list');
		$this->set(compact('kartuStudis', 'tkelases'));
	}

    function ajax_add(){
        //$this->autoRender = false;
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
            if(!empty($this->data)){
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
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid KomponenNilai', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->KomponenNilai->save($this->data)) {
				$this->Session->setFlash(__('The KomponenNilai has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The KomponenNilai could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->KomponenNilai->read(null, $id);
		}
		$kartuStudis = $this->KomponenNilai->KartuStudi->find('list');
		$tkelases = $this->KomponenNilai->Tkelase->find('list');
		$this->set(compact('kartuStudis','tkelases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for KomponenNilai', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->KomponenNilai->del($id)) {
			$this->Session->setFlash(__('KomponenNilai deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
    function ajax_delete($id=null){
        $this->autoRender = false;
        $this->layout = 'ajax';
        if($this->RequestHandler->isAjax()){
            if ($this->KomponenNilai->del($id)) {
                echo $id;
            }
        }
    }

}
?>
