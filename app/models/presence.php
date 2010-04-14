<?php
class Presence extends AppModel {

	var $name = 'Presence';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Pertemuan' => array(
			'className' => 'Pertemuan',
			'foreignKey' => 'pertemuan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'nim',
			'conditions' => '',
			'fields' => array('NAMA'),
			'order' => ''
		)
		
	);
	
		
}

?>