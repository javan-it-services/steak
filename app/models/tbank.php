<?php
class Tbank extends AppModel {

	var $name = 'Tbank';
	var $primaryKey = 'id';
	var $displayField = 'nama';
	//var $actsAs = array('SoftDeletable' => array('find' => false));
	var $validate = array(
		'nama' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Nama Bank tidak boleh kosong"))
	);

}
?>
