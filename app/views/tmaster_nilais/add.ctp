<div class="tmasterNilais form">
<div class="tmasterNilais form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Master Nilai');?></span></h2>

<?php echo $form->create('TmasterNilai');?>
	<fieldset>
	<?php
		echo $form->input('kode',array('label'=>'Kode'));
		echo "<div align='left' class='input text'>";
		echo $form->label("Lulus");
		echo $form->input('lulus',array("label"=>false,"type"=>"select","options" => array('1'=>'lulus','0'=>'tidak lulus')));
		echo "</div>";
		echo"<br>";
	//	echo "<div class='input text'>";
		echo $form->input('keterangan',array('label'=>'Keterangan'));
	//	echo "</div>";
		echo $form->input('angka_min', array ('label'=>'Angka Min'));
		echo $form->input('nilai', array ('label'=>'Nilai'));
	?>
	</fieldset>
<?php echo $form->end('Tambah');?>
</div>
<div class="grid_4 omega" id="sidebar">

</div>