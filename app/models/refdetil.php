<?php
class Refdetil extends AppModel {

	var $name = 'Refdetil';
	var $useTable = 'refdetil';
	var $order = 'Refdetil.code ASC';

	var $validate = array(
		'refmaster_id' => array('notempty'),
		'code' => array('notempty'),
		'value' => array('notempty')
	);

	var $belongsTo = array(
		'Refmaster' => array(
			'className' => 'Refmaster',
			'foreignKey' => 'refmaster_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function generateList($code){
		$references =$this->find('all',array('conditions'=>array('Refmaster.code'=>$code),'order'=>'Refdetil.id'));
		$list = array();
		foreach($references as $ref){
			$list[$ref['Refdetil']['id']] = $ref['Refdetil']['value'];
		}
		return $list;
	}

}
?>
