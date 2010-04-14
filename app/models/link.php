<?php
class Link extends AppModel {

	var $name = 'Link';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Parentlink' => array(
			'className' => 'Link',
			'foreignKey' => 'parent_id'
		)
	);

	var $hasMany = array(
	    'Childlink' => array(
			'className' => 'Link',
			'foreignKey' => 'parent_id'
		)
    );

	var $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'groups_links',
			'foreignKey' => 'link_id',
			'associationForeignKey' => 'group_id',
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

	function getMenu($type){
		$conditions = array('Link.parent_id'=>NULL,'Link.is_show'=>1);
		$order = 'Link.position ASC';
		$modules = $this->find('all',array('conditions'=>$conditions,'order'=>$order));
		return $modules;
	}
}
?>
