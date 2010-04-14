<?php
	echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'--Pilih Jurusan--',"label"=>"Jurusan", 'div'=>false, 'fieldset'=>false));
	echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/tkelases/getmatkuls','update'=>'matkuls'));
?>
