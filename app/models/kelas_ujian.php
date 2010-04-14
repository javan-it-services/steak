<?php
class KelasUjian extends AppModel {

	var $name = 'KelasUjian';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'TruangKuliah' => array(
			'className' => 'TruangKuliah',
			'foreignKey' => 'truang_kuliah_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmatakuliah' => array(
			'className' => 'Tmatakuliah',
			'foreignKey' => 'tmatakuliah_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'tsemester_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'ttahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Jenjang' => array(
			'className' => 'Refdetil',
			'foreignKey' => 'jenjang_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tfakultas' => array(
			'className' => 'Tfakultase',
			'foreignKey' => 'tfakultas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan' => array(
			'className' => 'Tjurusan',
			'foreignKey' => 'tjurusan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Absen' => array(
			'className' => 'TmahasiswasKelasUjian',
			'foreignKey' => 'kelas_ujian_id',
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

	var $hasAndBelongsToMany = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'joinTable' => 'tmahasiswas_kelas_ujians',
			'foreignKey' => 'kelas_ujian_id',
			'associationForeignKey' => 'tmahasiswa_id',
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
