<div class="presences index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Presences');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/presences/search',"id"=>"IdFilter"))?>
<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-',"label"=>"Fakultas"))?>
<?php echo $form->input('PROGRAM_STUDI', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-',"label"=>"Program Studi"));?>
<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/presences/getjurusan','update'=>'daftar_jurusan'))?>

<div id="daftar_jurusan">
<?php
		echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan"));
		echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/presences/getmatkuls','update'=>'matkuls'));
?>
</div>
</form>

<?php echo $form->create('Presences', array('url'=>'/presences/index',"id"=>"IdFilter"))?>

 		<?php
		echo "<div id='matkuls'>";
		echo $form->input('KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$tmatakuliahs,'empty'=>'-pilih-'));
		echo "</div>";
		?>





<div id="daftar_kelas">

</div>
<?php echo $ajax->submit('Cari',array('url'=>'rekaps','update'=>'rekap'));?>
</form>
<div id='rekap'></div>
<script>
	function sembunyi(id){
		//alert("tes");
		document.getElementById(id).display='none';
		
	}
</script>