<?php
class TmahasiswasKelasUjian extends AppModel {

	var $name = 'TmahasiswasKelasUjian';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'tmahasiswa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'KelasUjian' => array(
			'className' => 'KelasUjian',
			'foreignKey' => 'kelas_ujian_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>