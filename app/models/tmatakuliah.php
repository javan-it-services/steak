<?php
class Tmatakuliah extends AppModel {

	var $name = 'Tmatakuliah';
    var $useTable = 'tmatakuliahs';
	var $primaryKey = 'KD_KULIAH';
	var $displayField = 'NAMA_KULIAH';

 	var $kelas_conditions ;
	var $validate = array(
		'KD_KULIAH' => array('notempty'),
		'NAMA_KULIAH' => array('notempty'),
		'FAKULTAS' => array('notempty'),
		'program_studi_id' => array('notempty'),
		'JURUSAN' => array('notempty'),
		'tkurikulum_id' => array('notempty'),
		'semester' => array('notempty'),
		'IS_BUKA' => array('notempty'),
		'SKS' => array('notempty'),
		'SIFAT' => array('notempty')
	);


	var $belongsTo = array(
		'Tfakultase' => array(
			'className' => 'Tfakultase',
			'foreignKey' => 'FAKULTAS',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'JenjangStudi' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'program_studi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan' => array(
			'className' => 'Tjurusan',
			'foreignKey' => 'JURUSAN',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		,
		'Tkurikulum' => array(
			'className' => 'Tkurikulum',
			'foreignKey' => 'tkurikulum_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Tkelase' => array(
			'className' => 'Tkelase',
			'foreignKey' => 'KD_KULIAH',
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
