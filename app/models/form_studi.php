<?php
class FormStudi extends AppModel {

	var $name = 'FormStudi';
	var $useTable = 'form_studi';

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
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'KartuStudi' => array(
			'className' => 'KartuStudi',
			'foreignKey' => 'form_studi_id',
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