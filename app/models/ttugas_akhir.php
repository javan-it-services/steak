<?php
class TtugasAkhir extends AppModel {

	var $name = 'TtugasAkhir';
	var $primaryKey = 'id';
	
var $belongsTo = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM3',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tdosen1' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'pembimbing1',
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		),
		'Tdosen2' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'pembimbing2',
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		)
	);
}
?>