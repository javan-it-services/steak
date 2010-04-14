<?php
class Tpengumuman extends AppModel {

	var $name = 'Tpengumuman';
	var $useTable = 'tpengumumans';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'tkelase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>