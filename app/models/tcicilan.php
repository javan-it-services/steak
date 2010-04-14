<?php
class Tcicilan extends AppModel {

	var $name = 'Tcicilan';
	var $primaryKey = 'id';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'tahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''

		),
			
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'tjurusan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tfakultase' => array (
			'className' => 'Tfakultase',
			'foreignKey' => 'tfakultas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''

		),
		'TstatusPembayaran' => array(
			'className' => 'TstatusPembayaran',
			'foreignKey' => 'tstatus_pembayaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''

		),
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'semester',
			'conditions' => '',
			'fields' => '',
			'order' => ''

		),
	
	);
	
	
}
?>