<?php
class Tjurusan extends AppModel {

	var $name = 'Tjurusan';
	var $primaryKey = 'kodejurusan';
	var $displayField = 'namaJurusan';

	var $validate = array(
		'kodejurusan' => array('notempty'),
		'namaJurusan' => array('notempty'),
		'program_studi_id' => array('notempty'),
		'fakultas' => array('notempty')
	);

	var $belongsTo = array(
		'JenjangStudi' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'program_studi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Refdetil' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'program_studi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tfakultase' => array(
			'className' => 'Tfakultase',
			'foreignKey' => 'fakultas',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	

    function getList() {
        $data = $this->find('all', array('order' => 'Tjurusan.namaJurusan'));
        $list = array();
        foreach($data as $row) {
            $list[$row['Tjurusan']['kodejurusan']] = $row['Tjurusan']['namaJurusan'] . " - " . $row['JenjangStudi']['value'];
        }
        return $list;
    }
}
?>
