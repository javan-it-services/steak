<?php 
		echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan"));
		echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/presences/getmatkuls','update'=>'matkuls'));
?>