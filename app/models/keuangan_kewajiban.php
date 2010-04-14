<?php
class KeuanganKewajiban extends AppModel {

	var $name = 'KeuanganKewajiban';
	var $useTable = 'keuangan_kewajiban';
    var $primaryKey = 'id';

    var $belongsTo = array (
		'Tbank' => array (
			'className' => 'Tbank',
			'foreignKey' => 'nama',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'KeuanganMaster' => array (
			'className' => 'KeuanganMaster',
			'foreignKey' => 'keuangan_master_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
?>
