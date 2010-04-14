<?php
class T2calonMahasiswa extends AppModel {

	var $name = 'Tmahasiswas';
	var $primaryKey = 'NIM';
	//var $displayField = 'AGAMA_NAME';
	//var $actsAs = array('SoftDeletable' => array('find' => false));
	var $validate = array(
		'NIM' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"NIM tidak boleh kosong"))
	);
	
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
			'fields' => '',
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

}
?>
