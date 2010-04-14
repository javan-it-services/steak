<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Kelas');?></span></h2>
		<?php echo $form->create('Filter', array('url'=>'/frs/registrasi',"id"=>"IdFilter", 'class'=>'filter'))?>
		<table class='filter' style='width:auto'>
			<tr>
				<td>
					<?php echo $form->input('PROGRAM_STUDI', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'--Pilih Jenjang Studi--',"label"=>"Jenjang Studi", 'div'=>false, 'fieldset'=>false));?>
				</td>
				<td>
					<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'--Pilih Fakultas--',"label"=>"Fakultas", 'div'=>false, 'fieldset'=>false))?>
				</td>
				<td>
					<div id="daftar_jurusan">
					<?php
						echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan", 'div'=>false, 'fieldset'=>false));
						echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/tkelases/getmatkuls','update'=>'matkuls'));
					?>
					</div>
				</td>
			</tr>
		</table>
		</form>
		<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/tkelases/getjurusan','update'=>'daftar_jurusan'))?>

<div class="tkelases form">
<?php echo $form->create('Tkelase',array("id"=>"id_kelase"));?>
	<fieldset>

 			<?php
		echo $form->input('ID');
		//echo $form->input('KD_KULIAH', array ('label'=>'KODE KULIAH'));

		echo "<div id='matkuls'>";
		//echo $form->label("KODE MATAKULIAH");
		echo $form->input('KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$tmatakuliahs,'empty'=>'-pilih-'));

		echo "</div>";
		echo $form->input('NAMA_KELAS', array ('label'=>'Nama Kelas'));
		//echo $form->input('TSEMESTER_ID', array ('label'=>'TIPE SEMESTER'));
		echo "<div >";
		//echo $form->label("TIPE SEMESTER");
		echo $form->input('TSEMESTER_ID', array("label"=>"Semester","type"=>"select","options"=>$tsemesters,'empty'=>'-pilih-'));
		echo "</div>";
		echo $form->input('TTAHUN_AJARAN_ID', array ('label'=>'TAHUN AJARAN', 'type'=>'select', 'options'=>$ttahunAjarans, 'empty'=>'--Pilih Tahun Ajaran--', 'label'=>'Tahun Ajaran'));
		//echo $form->input('TDOSEN_ID', array ('label'=>'DOSEN'));
		echo "<div >";
		echo $form->input('TDOSEN_ID', array("label"=>"Dosen","type"=>"select","options"=>$tdosens));
		echo $ajax -> observeForm('id_kelase', array ("url"=>'/tkelases/getkelas','update'=>'daftar_kelas'));
		echo "</div>";
	?>
	<?php echo $ajax->submit('Tambah',array('url'=>'tambah','update'=>'daftar_kelas'));?>
	</fieldset>
	</form>
</div>

<div id="daftar_kelas">


</div>
<div class="grid_4 omega" id="sidebar">

</div>


<script type='text/javascript'>
	$('IdFilter').reset();
</script>
