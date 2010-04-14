<?php
class TkabupatensController extends AppController {

	var $name = 'Tkabupatens';
	var $helpers = array('Html', 'Form');
	var $components = array('Jsax');

	function index(/*$propinsi_id = null*/) {
		$propinsi_id = (isset($this->params['named']['pid']))?$this->params['named']['pid']: null;
		$listPropinsi = $this->Tkabupaten->groupByProvince();
		$selectedPropinsi = null;

		$conditions = array();
		if ($propinsi_id) {
			$conditions = array('Tkabupaten.KD_PROP' => $propinsi_id);
			$this->Tkabupaten->Tpropinsi->recursive = -1;
			$selectedPropinsi = $this->Tkabupaten->Tpropinsi->read(null, $propinsi_id);
		}

		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Tkabupaten->recursive = 0;
		if(!empty($this->params['named'])) {
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && $key!="pid" && !empty($value)) {
                    $conditions["Tkabupaten.$key LIKE"] = "%".trim($value)."%";
                }
            }
			$this->data['Filter'] = $this->params['named'];
        }
		$this->paginate = array_merge($this->paginate,array(
			'conditions' => $conditions,
		));

		$this->set('tkabupatens', $this->paginate('Tkabupaten'));
		$this->set(compact('listPropinsi', 'selectedPropinsi'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tkabupaten, array('redirect'=>array('action'=>'index')));
		} else {
			$this->set('tpropinsis', $this->Tkabupaten->Tpropinsi->find('list'));
		}
	}

	function edit($id = null) {
		if (!empty($this->data)) {
			$this->Jsax->save($this->data, $this->Tkabupaten, array('redirect'=>array('action'=>'index')));
		} else {
			$this->data = $this->Tkabupaten->read(null, $id);
		}
	}

	function delete($id = null) {
		if(!empty($this->data)){
			$this->Jsax->delete($this->data['Tkabupaten']['KD_KAB'], $this->Tkabupaten);
		}else{
			$this->Jsax->confirmDelete($id, $this->Tkabupaten);
		}
	}

	function deleteBulk () {
		$this->Jsax->deleteAll($this->Tkabupaten, array("Tkabupaten.KD_KAB"=>$this->data['ids']));
	}

}
?>
