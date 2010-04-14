<?php
class JenisNilaiPendaftaran extends AppModel {

	var $name = 'JenisNilaiPendaftaran';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'GelombangPendaftaran' => array(
			'className' => 'GelombangPendaftaran',
			'foreignKey' => 'gelombang_pendaftaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>