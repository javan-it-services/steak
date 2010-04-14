<?php
class TsilabusMingguan extends AppModel {

	var $name = 'TsilabusMingguan';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	

	var $hasMany = array(
		'Tfile' => array(
			'className' => 'Tfile',
			'foreignKey' => 'tsilabus_mingguan_id',
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