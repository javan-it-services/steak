<?php
class KelasUjianMasuk extends AppModel {

	var $name = 'KelasUjianMasuk';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'GelombangPendaftaran' => array(
			'className' => 'GelombangPendaftaran',
			'foreignKey' => 'gelombang_pendaftaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'JenisNilaiPendaftaran' => array(
			'className' => 'JenisNilaiPendaftaran',
			'foreignKey' => 'jenis_nilai_pendaftaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TruangKuliah' => array(
			'className' => 'TruangKuliah',
			'foreignKey' => 'truang_kuliah_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'TcalonMahasiswa' => array(
			'className' => 'TcalonMahasiswa',
			'joinTable' => 'kelas_ujian_masuks_tcalon_mahasiswas',
			'foreignKey' => 'kelas_ujian_masuk_id',
			'associationForeignKey' => 'tcalon_mahasiswa_id',
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
