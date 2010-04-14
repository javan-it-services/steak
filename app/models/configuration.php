<?php
class Configuration extends AppModel {

	var $name = 'Configuration';
    var $hash = array();

	function getYYS(){
		$sql = "SELECT *
				FROM configurations AS Configuration
				WHERE name LIKE 'YYS_%'
				";
		$data = $this->query($sql);
		$yys = array();
		foreach($data as $d){
			$yys[$d['Configuration']['name']] = $d['Configuration']['value'];
		}

		return $yys;
	}

	function getPTI(){
		$sql = "SELECT *
				FROM configurations AS Configuration
				WHERE name LIKE 'PTI_%'
				";
		$data = $this->query($sql);
		$pti = array();
		foreach($data as $d){
			$pti[$d['Configuration']['name']] = $d['Configuration']['value'];
		}

		return $pti;
	}

    function getValue($name) {
        if(empty($this->hash)){
            $this->loadHash();
        }
        return (isset($this->hash[$name]))?$this->hash[$name]: false;
    }

    function setValue($name, $value) {
        $this->data = $this->find('first', array('conditions' => array('name' => $name)));
        if($this->data) {
            $this->data['Configuration']['value'] = $value;
        } else {
            $this->data['Configuration']['name'] = $name;
            $this->data['Configuration']['value'] = $value;
        }
        return $this->save($this->data);
    }

    function loadHash() {
        $data = $this->find('all');
        foreach($data as $row) {
            $this->hash[$row['Configuration']['name']] = $row['Configuration']['value'];
        }
    }
}
?>
