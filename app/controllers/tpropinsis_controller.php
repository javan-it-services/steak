<?php
class TpropinsisController extends AppController {

	var $name = 'Tpropinsis';
	var $helpers = array('Html', 'Form');
	var $components = array('Jsax');

	function index() {
		//$this->loadModel('Tjabatan');
		$this->Tpropinsi->recursive = 0;
		if(isset($this->data['Filter'])) {
            $conditions = array();
            foreach($this->data['Filter'] as $key => $value) {
                if(!empty($value)) {
                    $conditions["Tpropinsi.$key LIKE"] = "%".trim($value)."%";

                }
            }
            $this->paginate = array('conditions' => $conditions);
        }
		$this->set('tpropinsis', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tpropinsi, array('redirect'=>array('action'=>'index')));
		}
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tpropinsi, array('redirect'=>array('action'=>'index')));
		} else {
			$this->data = $this->Tpropinsi->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tpropinsi']['KD_PROP'], $this->Tpropinsi);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tpropinsi);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tpropinsi, array("Tpropinsi.KD_PROP"=>$this->data['ids']));
	}
}
?>
