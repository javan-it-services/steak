<?php
class Tfakultase extends AppModel {

	var $name = 'Tfakultase';
	var $validate = array(
		'id' => array('notempty'),
		'kode' => array('notempty'),
		'nama' => array('notempty')
	);
	var $displayField = 'nama';

}
?>
