<div class="presences form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Input Kehadiran Mahasiswa');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/frs/registrasi',"id"=>"IdFilter"))?>
<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-',"label"=>"Fakultas"))?>
<?php echo $form->input('program_studi_id', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-',"label"=>"Program Studi"));?>
<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/presences/getjurusan','update'=>'daftar_jurusan'))?>

<div id="daftar_jurusan">
<?php
		echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan"));
		echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/presences/getmatkuls','update'=>'matkuls'));
?>
</div>




<div class="tkelases form">
 			<?php
			echo "<div id='matkuls'>";
			echo $form->input('KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$tmatakuliahs,'empty'=>'-pilih-'));

			echo "</div>";

	?>
</div>

</form>

<?php echo $form->create('Presence',array('action'=>'add'))?>
<div id="daftar_kelas">

</div>
<div id='students'>

</div>

<div id='pertemuans'>

</div>
<?php


echo $form->end('simpan');


?>
