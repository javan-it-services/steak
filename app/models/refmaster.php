<?php
class Refmaster extends AppModel {

	var $name = 'Refmaster';
	var $useTable = 'refmaster';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Refdetil' => array(
			'className' => 'Refdetil',
			'foreignKey' => 'refmaster_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>