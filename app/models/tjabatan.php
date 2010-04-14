<?php
class Tjabatan extends AppModel {

	var $name = 'Tjabatan';
	var $useTable = 'refdetil';
	var $code = "02";
	var $order = "Tjabatan.id ASC";

	var $validate = array(
		'refmaster_id' => array('notempty'),
		'code' => array('notempty'),
		'value' => array('notempty')
	);

	var $belongsTo = array(
		'Refmaster' => array(
			'className' => 'Refmaster',
			'foreignKey' => 'refmaster_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function beforeSave(){
		$this->Refmaster->recursive = -1;
		$refmaster = $this->Refmaster->find("first", array("conditions"=>array("code"=>$this->code)));
		$this->data['Tjabatan']['refmaster_id'] = $refmaster['Refmaster']['id'];
		return true;
	}
}
?>
