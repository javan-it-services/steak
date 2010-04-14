<?php
class TtahunAjaran extends AppModel {

	var $name = 'TtahunAjaran';
	var $displayField = 'nama';
	var $order = 'nama DESC';
	var $validate = array(
		'nama' => array('notempty'),
		'kodeAngkatan' => array('notempty'),
		'noUrut' => array('numeric')
	);

}
?>
