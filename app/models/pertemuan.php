<?php
class Pertemuan extends AppModel {

	var $name = 'Pertemuan';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'kelas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TruangKuliah' => array(
			'className' => 'TruangKuliah',
			'foreignKey' => 'ruang_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	
	var $hasMany = array(
		'Presence' => array(
			'className' => 'Presence',
			'foreignKey' => 'pertemuan_id',
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