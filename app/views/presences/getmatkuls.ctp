<?

        echo $form->input('KD_KULIAH', array("name"=>"data[Tkelase][KD_KULIAH]","label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$matkuls,'empty'=>'-pilih-'));
		echo $ajax -> observeField('KD_KULIAH', array ("url"=>'/presences/getkelas','update'=>'daftar_kelas'));
?>	