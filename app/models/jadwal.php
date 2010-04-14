<?php
class Jadwal extends AppModel {

	var $name = 'Jadwal';
	//var $useTable = false;

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'kelas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Twaktus' => array(
			'className' => 'Twaktus',
			'foreignKey' => 'waktu_id',
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

}
?>
