<?php
class User extends AppModel {

	var $name = 'User';
	var $actsAs = array('Acl' => array('requester'));
	var $validate = array(
		'USERNAME' => array('notempty'),
		'VALID_START_USER' => array('notempty'),
		'ENABLED_USER' => array('notempty'),
		'PASSWORD' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tmahasiswa' => array(
			'className' => 'Tmahasiswa',
			'foreignKey' => 'USERNAME',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('NAMA'),
			'order' => ''
		),
		'Tdosen' => array(
			'className' => 'Tdosen',
			'foreignKey' => 'USERNAME',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		),
		'Tpegawai' => array(
			'className' => 'Tpegawai',
			'foreignKey' => 'USERNAME',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('NAMA_pegawai'),
			'order' => ''
		)
	);
	var $hasOne = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'foreign_key',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('parent_id','alias'),
			'order' => ''
		),
	);
	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		$data = $this->data;
		if (empty($this->data)) {
			$data = $this->read();
		}
		if (!$data['User']['TYPE']) {
			return null;
		} else {
			return array('Group' => array('id' => Constant::$group[$data['User']['TYPE']]));
		}
	}
	/**
	 * After save callback
	 *
	 * Update the aro for the user.
	 *
	 * @access public
	 * @return void
	 */
	function afterSave($created) {
			//create
			if ($created) {
				$parent = $this->parentNode();
				$parent = $this->node($parent);
				$node = $this->node();
				$aro = $node[0];
				$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
				$aro['Aro']['alias'] = $this->data['User']['USERNAME'];
				$this->Aro->save($aro);
			}
			//update
			else{
				//$parent = $this->parentNode();
				//$parent = $this->node($parent);
				//$node = $this->node();
				//$aro = $node[0];
				//$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
				//$this->Aro->save($aro);
			}
	}

	function beforeSave(){
		if(empty($this->data['User']['VALID_FINISH_USER'])){
			$this->data['User']['VALID_FINISH_USER'] = NULL;
		}
        if(isset($this->data['User']['TYPE'])) {
    		$this->data['User']['group_id'] = Constant::$group[$this->data['User']['TYPE']] ;
        }
		return true;
	}
}
?>
