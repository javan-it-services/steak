<?php
class Tpegawai extends AppModel {

	var $name = 'Tpegawai';
	var $primaryKey = 'NIP_pegawai';
	var $validate = array(
		'NIP_pegawai' => array('notempty'),
		'NAMA_pegawai' => array('notempty'),
		'INISIAL' => array('notempty'),
		'AGAMA' => array('notempty'),
		'JENIS_KELAMIN' => array('notempty'),
		'STATUS_pegawai' => array('notempty'),
		'STATUS_KERJA' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tagama' => array(
			'className' => 'Tagama',
			'foreignKey' => 'AGAMA',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tpangkat' => array(
			'className' => 'Tpangkat',
			'foreignKey' => 'PANGKAT',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tpropinsi' => array(
			'className' => 'Tpropinsi',
			'foreignKey' => 'KD_PROP_INSTANSI',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			),

	'Tkabupaten' => array(
			'className' => 'Tkabupaten',
			'foreignKey' => 'KD_KAB_INSTANSI',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)
	);

}
?>
