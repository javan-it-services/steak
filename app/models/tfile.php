<?php
class Tfile extends AppModel {

	var $name = 'Tfile';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'TsilabusMingguan' => array(
			'className' => 'TsilabusMingguan',
			'foreignKey' => 'tsilabus_mingguan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>