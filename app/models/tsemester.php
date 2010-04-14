<?php
class Tsemester extends AppModel {

	var $name = 'Tsemester';
	var $primaryKey = 'ID';
	var $displayField = 'NAME';
	var $validate = array(
		'NAME' => array('notempty')
	);
}
?>
