<?php
class Group extends JavanAppModel {

	var $name = 'Group';
	var $actsAs = array('Acl' => array('requester'));

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Parent' => array(
			'className' => 'Group',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
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

	var $hasAndBelongsToMany = array(
		'Link' => array(
			'className' => 'Link',
			'joinTable' => 'groups_links',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'link_id',
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

	function parentNode() {
        if(isset($this->data['Group']['parent_id']) && $this->data['Group']['parent_id'] != null){
			return array('Group'=>array('id' => $this->data['Group']['parent_id']));
        }else{
            return false;
        }
	}


	function afterSave($created) {
        //create
        if ($created) {
            $parent = $this->parentNode();

            $node = $this->node();
            $aro = $node[0];

            if($parent){
                $parent = $this->node($parent);
                $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            }else{
                $aro['Aro']['parent_id'] = null;
            }
            $aro['Aro']['alias'] = $this->data['Group']['name'];

            $this->Aro->save($aro);
        }
    }
}
?>
