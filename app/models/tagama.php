<?php
class Tagama extends AppModel {

	var $name = 'Tagama';
	var $primaryKey = 'AGAMA_ID';
	var $displayField = 'AGAMA_NAME';
	//var $actsAs = array('SoftDeletable' => array('find' => false));
	var $validate = array(
		'AGAMA_NAME' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Nama agama tidak boleh kosong"))
	);

}
?>
