<?php
class Tkelase extends AppModel {

	var $name = 'Tkelase';
	var $primaryKey = 'ID';
	var $displayField = 'NAMA_KELAS';
	var $validate = array(
		'KD_KULIAH' => array('notempty'),
		'NAMA_KELAS' => array('notempty'),
		'TSEMESTER_ID' => array('notempty'),
		'TTAHUN_AJARAN_ID' => array('notempty'),
		'TDOSEN_ID' => array('notempty')
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'TSEMESTER_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmatakuliah' => array(
			'className' => 'Tmatakuliah',
			'foreignKey' => 'KD_KULIAH',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'TTAHUN_AJARAN_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tdosen' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'TDOSEN_ID',
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		)
	);
var $hasMany = array(
		'Jadwal' => array(
			'className' => 'Jadwal',
			'foreignKey' => 'kelas_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'KomponenNilai' => array(
			'className' => 'KomponenNilai',
			'foreignKey' => 'tkelas_id',
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
