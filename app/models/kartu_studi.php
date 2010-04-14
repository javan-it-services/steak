<?php
class KartuStudi extends AppModel {

	var $name = 'KartuStudi';
	var $useTable = 'kartu_studi';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'FormStudi' => array(
			'className' => 'FormStudi',
			'foreignKey' => 'form_studi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'kelas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TmasterNilai' => array(
			'className' => 'TmasterNilai',
			'foreignKey' => 'tmaster_nilai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'KomponenNilai' => array(
			'className' => 'KomponenNilai',
			'joinTable' => 'kartu_studi_komponen_nilai',
			'foreignKey' => 'kartu_studi_id',
			'associationForeignKey' => 'komponen_nilai_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>
