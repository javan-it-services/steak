<?php
class Mahasiswa extends AppModel {

	var $name = 'Mahasiswa';
	var $useTable = false;
	
	
	function getFRS($nim){
		$sql = "select * from tfrs where NIM = '$nim'";
		return $this->query($sql);
	}
}
?>