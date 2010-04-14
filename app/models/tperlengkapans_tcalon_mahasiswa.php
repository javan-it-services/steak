<?php
class TperlengkapansTcalonMahasiswa extends AppModel {

	var $name = 'TperlengkapansTcalonMahasiswa';
	//var $primaryKey = 'id';
	//var $displayField = 'jenis';
	//var $actsAs = array('SoftDeletable' => array('find' => false));
    //var $useTable = tperlengkapans_tcalon_mahasiswas;
	var $validate = array(
		'tperlengkapan_id' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Jenis Perlengkapan Pendaftaran tidak boleh kosong"))
	);

	/*var $belongsTo = array (
		'TcalonMahasiswa' => array (
			'className' => 'TcalonMahasiswa',
			'foreignKey' => 'tcalon_mahasiswa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        	'Tperlengkapan' => array (
			'className' => 'Tperlengkapan',
			'foreignKey' => 'tperlengkapan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
    
    var $hasMany = array (
		'TcalonMahasiswa' => array (
			'className' => 'TcalonMahasiswa',
			'foreignKey' => 'tcalon_mahasiswa_id',
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
    */
        var $hasAndBelongsToMany = array(
		'Tperlengkapan' => array(
			'className' => 'Tperlengkapan',
			'joinTable' => 'tperlengkapans_tcalon_mahasiswas',
			'foreignKey' => 'tperlengkapan_id',
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
