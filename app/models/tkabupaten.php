<?php
class Tkabupaten extends AppModel {

	var $name = 'Tkabupaten';
	var $primaryKey = 'KD_KAB';
	var $displayField = 'KAB_NAME';
	var $validate = array(
		'KD_KAB' => array('notempty'=>array('rule'=>'notempty', 'message'=>'Kode kabupaten tidak boleh kosong')),
		'KAB_NAME' => array('notempty'=>array('rule'=>'notempty', 'message'=>'Nama kabupaten tidak boleh kosong')),
		'KD_PROP' => array('notempty'=>array('rule'=>'notempty', 'message'=>'Propinsi tidak boleh kosong'))
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tpropinsi' => array(
			'className' => 'Tpropinsi',
			'foreignKey' => 'KD_PROP',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function groupByProvince () {
		return $this->find('all',
					array( 'fields' =>
						  array( 'Tpropinsi.KD_PROP',
								 'Tpropinsi.PROP_NAME',
								 'count(Tkabupaten.KD_KAB) as jumlah'
								),
						  'conditions' => 'Tpropinsi.KD_PROP IS NOT NULL',
						  'group'=>'Tkabupaten.KD_PROP'
						  )
					);
}
	}
?>
