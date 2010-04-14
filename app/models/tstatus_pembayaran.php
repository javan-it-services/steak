<?php
class TstatusPembayaran extends AppModel {

	var $name = 'TstatusPembayaran';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM',
			'conditions' => '',
			'fields' => array('NAMA','NIM'),
			'order' => ''
		),
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'tahun_ajaran',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'semester',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>