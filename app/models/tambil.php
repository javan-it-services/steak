<?php
class Tambil extends AppModel {

	var $name = 'Tambil';
	var $primaryKey = 'NO_REGISTRASI';
	var $belongsTo = array (
		
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'TJURUSAN_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		);
}
?>
