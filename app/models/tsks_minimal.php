<?php
class TsksMinimal extends AppModel {

	var $name = 'TsksMinimal';
	var $primaryKey = 'id';
	var $belongsTo = array (
		
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'TJURUSAN_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Refdetil' => array (
			'className' => 'Refdetil',
			'foreignKey' => 'TPROGRAM_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
}
?>
