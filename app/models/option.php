<?php
class Option extends AppModel {

	var $name = 'Option';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'ttahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'tsemester_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tkurikulum' => array(
			'className' => 'Tkurikulum',
			'foreignKey' => 'tkurikulum_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>