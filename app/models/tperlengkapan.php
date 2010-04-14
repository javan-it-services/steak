<?php
class Tperlengkapan extends AppModel {

	var $name = 'Tperlengkapan';
	var $primaryKey = 'id';
	var $displayField = 'jenis';
	//var $actsAs = array('SoftDeletable' => array('find' => false));
	var $validate = array(
		'jenis' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Jenis Perlengkapan Pendaftaran tidak boleh kosong"))
	);

	var $belongsTo = array (
		'GelombangPendaftaran' => array (
			'className' => 'GelombangPendaftaran',
			'foreignKey' => 'gelombang_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

	);
	var $hasAndBelongsToMany = array(
		'TcalonMahasiswa' => array(
			'className' => 'TcalonMahasiswa',
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

    function getAllPembayaran($gelombang_id) {
        $conditions = array(
                            'Tperlengkapan.gelombang_id' => $gelombang_id,
                            'Tperlengkapan.jumlah > 0'
                            );
        $this->unbindAll();
        return $this->find('all', array('conditions' => $conditions));
    }
}
?>
