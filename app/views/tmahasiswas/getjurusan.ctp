<?php 
		echo $form->input('Filter.TJURUSAN_ID', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan", 'div'=>'filter', 'fieldset'=>false));
		//echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/pertemuans/getmatkuls','update'=>'matkuls'));
?>