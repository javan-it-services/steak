<?php
class Role extends AppModel {

	var $name = 'Role';
	var $useTable = 'aros';
	var $displayField = 'alias';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'ParentRole' => array(
			'className' => 'Role',
			'foreignKey' => 'parent_id',
			'fields' => array('id','alias')
		)
	);
}
?>