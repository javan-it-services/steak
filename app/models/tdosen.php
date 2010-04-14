<?php
class Tdosen extends AppModel {

	var $name = 'Tdosen';
	var $primaryKey = 'NIP_DOSEN';
	var $displayField = 'NAMA_DOSEN';
	var $validate = array(
		'NIP_DOSEN' => array('notempty'),
		'NIDN' => array('notempty'),
		'NAMA_DOSEN' => array('notempty'),
		'AGAMA' => array('notempty'),
		'JENIS_KELAMIN' => array('notempty'),
		'INISIAL' => array('notempty'),
		'status_kerja_id' => array('notempty'),
		'status_aktivitas_id' => array('notempty'),
		'jabatan_akademik_id' => array('notempty'),
		'pendidikan_tertinggi_id' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIP_WALI',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('NIM','NAMA'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
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
		),

		'StatusAktivitas' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'status_aktivitas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'StatusKerja' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'status_kerja_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'JabatanAkademik' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'jabatan_akademik_id	',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'PendidikanTertinggi' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'pendidikan_tertinggi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function isDosenWali($NIP){
		$sql = "select count(*) as wali from tmahasiswas where NIP_WALI='$NIP'";
		return $this->query($sql);
	}

}
?>
