<?php
class Tprogram extends AppModel {

	var $name = 'Tprogram';
	var $useTable = 'refdetil';
	var $code = "04";

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
}
?>
