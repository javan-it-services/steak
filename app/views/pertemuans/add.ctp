<div class="pertemuans form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Pertemuan');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/frs/registrasi',"id"=>"IdFilter"))?>
<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-',"label"=>"Fakultas"))?>
<?php echo $form->input('program_studi_id', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-',"label"=>"Jenjang Studi"));?>
<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/pertemuans/getjurusan','update'=>'daftar_jurusan'))?>

<div id="daftar_jurusan">
<?php
		echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan"));
		echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/pertemuans/getmatkuls','update'=>'matkuls'));
?>
</div>




<div class="tkelases form">
 			<?php
		//echo $form->input('KD_KULIAH', array ('label'=>'KODE KULIAH'));

		echo "<div id='matkuls'>";
		//echo $form->label("KODE MATAKULIAH");
		echo $form->input('KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$tmatakuliahs,'empty'=>'-pilih-'));

		echo "</div>";

	?>
</div>

</form>

<?php echo $form->create('Pertemuan', array('url'=>'/pertemuans/add'))?>
<div id="daftar_kelas">

</div>
	<?php
        echo $form->input('pertemuan_ke');
		echo $form->input('tanggal',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-d-m-y divider-dash','value'=>date('d-m-Y')));

		echo $form->input('jam');
        echo $form->input('ruang_id',array('label'=>'Ruang','type'=>'select','options'=>$truangkuliahs));

	?>
	</fieldset>

<?php //echo $form->end('Submit');
echo $ajax -> submit('Simpan',array ("url"=>'simpan', 'update' => 'simpan'));
?>
<div id="simpan">

</div>
</form>
</div>


<div class="grid_4 omega" id="sidebar">

</div>
