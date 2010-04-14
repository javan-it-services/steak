<?
	echo $form->input('Tkelase.KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$matkuls,'empty'=>'--Pilih Mata Kuliah--', 'div'=>'required input text'));
	echo $ajax -> observeField('KD_KULIAH', array ("url"=>'/tkelases/getkelas','update'=>'daftar_kelas'));
?>
