<?php
class KartuStudiKomponenNilai extends AppModel {

	var $name = 'KartuStudiKomponenNilai';
	var $useTable = 'kartu_studi_komponen_nilai';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'KartuStudi' => array(
			'className' => 'KartuStudi',
			'foreignKey' => 'kartu_studi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'KomponenNilai' => array(
			'className' => 'KomponenNilai',
			'foreignKey' => 'komponen_nilai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>