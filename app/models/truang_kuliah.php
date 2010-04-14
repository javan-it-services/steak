<?php
class TruangKuliah extends AppModel {

	var $name = 'TruangKuliah';
	var $primaryKey = 'RUANG_ID';
	var $displayField = 'RUANG_NAME';
	var $validate = array(
		'RUANG_NAME' => array('notempty'),
		'LOKASI' => array('notempty'),
		'KAPASITAS' => array('notempty')
	);

}
?>
