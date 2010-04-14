<?php
class KomponenNilai extends AppModel {

	var $name = 'KomponenNilai';
	var $useTable = 'komponen_nilai';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'tkelas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'KartuStudi' => array(
			'className' => 'KartuStudi',
			'joinTable' => 'kartu_studi_komponen_nilai',
			'foreignKey' => 'komponen_nilai_id',
			'associationForeignKey' => 'kartu_studi_id',
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
