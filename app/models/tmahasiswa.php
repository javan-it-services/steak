<?php
class Tmahasiswa extends AppModel {

	var $name = 'Tmahasiswas';
	var $primaryKey = 'NIM';
	//var $useTable = 't2calon_mahasiswa';
	/*var $validate = array(
		'NIM' => array('notempty'),
		'NO_REGISTRASI' => array('notempty'),
		'NAMA' => array('notempty'),
		'AGAMA' => array('notempty'),
		'JENIS_KELAMIN' => array('notempty'),
		'TGL_LAHIR' => array('notempty'),
		'TTAHUN_AJARAN_ID' => array('notempty'),
		'TFAKULTAS_ID' => array('notempty'),
		'TJURUSAN_ID' => array('notempty'),
		'TPROGRAM_ID' => array('notempty')
	);*/
	
	var $validate = array(
		
		'No_Test' => array('notempty'),
		'NAMA' => array('notempty'),
		'AGAMA' => array('notempty'),
		'JENIS_KELAMIN' => array('notempty'),
		'TGL_LAHIR' => array('notempty'),
		'TGL_DAFTAR' => array('notempty'),
		'TJURUSAN_ID' => array('notempty'),
		'NAMA_SMU' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array (
		'FormStudi' => array (
			'className' => 'FormStudi',
			'foreignKey' => 'NIM',
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
		'Presence' => array (
			'className' => 'Presence',
			'foreignKey' => 'nim',
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
		'TstatusPembayaran' => array (
			'className' => 'TstatusPembayaran',
			'foreignKey' => 'NIM',
			'dependent' => '',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'KeuanganTransaksi' => array (
			'className' => 'KeuanganTransaksi',
			'foreignKey' => 'mahasiswa_id',
			'dependent' => '',
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array (
		'TcalonMahasiswa' => array (
			'className' => 'TcalonMahasiswa',
			'foreignKey' => 'NO_REGISTRASI',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tagama' => array (
			'className' => 'Tagama',
			'foreignKey' => 'AGAMA',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tfakultase' => array (
			'className' => 'Tfakultase',
			'foreignKey' => 'TFAKULTAS_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tprogram' => array (
			'className' => 'Tprogram',
			'foreignKey' => 'TPROGRAM_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'TJURUSAN_ID',
			'conditions' => '',
			'fields' => array('namaJurusan','program_studi_id'),
			'order' => ''
		),
	/*	'Tpropinsi' => array (
			'className' => 'Tpropinsi',
			'foreignKey' => 'KD_PROP_ASAL',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Tkabupaten' => array (
			'className' => 'Tkabupaten',
			'foreignKey' => 'KD_KAB_ASAL',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
*/
		'Tdosen' => array (
			'className' => 'Tdosen',
			'foreignKey' => 'NIP_WALI',
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		),

		'TtahunAjaran' => array (
			'className' => 'TtahunAjaran',
			'foreignKey' => 'TTAHUN_AJARAN_ID',

			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Tkelase' => array (
			'className' => 'Tkelase',
			'foreignKey' => 'KELAS',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Refkela' => array (
			'className' => 'Refkela',
			'foreignKey' => 'refkela_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'KeuanganTransaksi' => array (
			'className' => 'KeuanganTransaksi',
			'foreignKey' => 'NIM',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            'Tperguruan_tinggi' => array (
			'className' => 'Tperguruan_tinggi',
			'foreignKey' => 'UNIV_ASAL',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

	/*	'StatusAktif' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'status_aktif_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'StatusMasuk' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'status_masuk_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);

	function beforeSave(){
		if(empty($this->data['Tmahasiswa']['tanggal_masuk'])){
			$this->data['Tmahasiswa']['tanggal_masuk'] = NULL;
		}
		if(empty($this->data['Tmahasiswa']['tanggal_lulus'])){
			$this->data['Tmahasiswa']['tanggal_lulus'] = NULL;
		}
		return true;
	}
}
?>
