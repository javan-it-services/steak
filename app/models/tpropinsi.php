<?php
class Tpropinsi extends AppModel {

	var $name = 'Tpropinsi';
	var $primaryKey = 'KD_PROP';
	var $displayField = 'PROP_NAME';
	var $validate = array(
		'KD_PROP' => array('notempty'),
		'PROP_NAME' => array('notempty')
	);

	var $hasMany = array(
		'Tkabupaten' => array(
			'className' => 'Tkabupaten',
			'foreignKey' => 'KD_PROP',
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
