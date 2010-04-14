<?php
class Tpangkat extends AppModel {

	var $name = 'Tpangkat';
	var $primaryKey = 'PANGKAT_ID';
	var $displayField = 'PANGKAT_NAME';
	var $validate = array(
		'PANGKAT_NAME' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Nama tidak boleh kosong")),
		'PANGKAT_DESC' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Keterangan tidak boleh kosong"))
	);
}
?>
