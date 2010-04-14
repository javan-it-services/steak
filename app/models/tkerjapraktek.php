<?php
class Tkerjapraktek extends AppModel {

	var $name = 'Tkerjapraktek';
	var $primaryKey = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'NIM3',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	'Tdosen1' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'pembimbing1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
	),
	'Tdosen2' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'pembimbing2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
	)
	);

}
?>