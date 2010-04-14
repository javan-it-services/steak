<?php
class Tkonversi extends AppModel {

	var $name = 'Tkonversi';
        var $useTable = 'tkonversi';
        //var $primaryKey = 'NO_REGISTRASI';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Tmatakuliah' => array(
			'className' => 'Tmatakuliah',
			'foreignKey' => 'KD_KULIAH',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>