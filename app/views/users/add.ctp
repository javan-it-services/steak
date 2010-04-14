<div class="tmahasiswas index grid_12 alpha" id='content'>
	<div class='box'>
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah User');?></span></h2>
<?php echo $form->create('User');?>
	<fieldset>

	<?php
		echo $form->input('TYPE',array('label'=>'Tipe',"type"=>"select","options"=>$types,"onchange"=>"this.form.submit()",'empty'=>'--Pilih Group--'));
		if($lblforeignkey){
			if($lblforeignkey=="Username"){
				echo $form->input('USERNAME',array("label"=>$lblforeignkey));
                        }elseif($lblforeignkey=="Mahasiswa"){
                                //echo $form->input('NIM',array("label"=>$lblforeignkey));

                        echo "<div class='input text'>";
			echo $form->label('UserName');
			echo $ajax->autoComplete('USERNAME', 'autoComplete');
			echo "</div>";

			}else{
				echo $form->input('USERNAME',array("label"=>$lblforeignkey, "type"=>"select", "options"=>$nims));
			}
			echo $form->input('PASSWORD',array('label'=>'Password'));
			echo $form->input('ENABLED_USER',array('label'=>'Enabled','type'=>'select','options'=>array('1'=>'Ya','0'=>'Tidak')));
			echo $form->input('VALID_START_USER',array('label'=>'Mulai Valid','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>date('Y-m-d')));
			echo $form->input('VALID_FINISH_USER',array('label'=>'Akhir Valid','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		}
	?>
	</fieldset>

<?php
	echo $form->submit('Simpan',array("name"=>"action"));
	echo $form->end();
?>

<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Daftar Pengguna', true), array('action'=>'index'));?></li>
	</ul>
</div>
</div>
</div>
