<div class="tmahasiswas grid_12 alpha " id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Cari Sesuai Pilihan dibawah ini :');?></span></h2>
<fieldset>
<?php echo $form->create('Filter', array('url'=>'/frs/registrasi',"id"=>"IdFilter"))?>
<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-'))?>
<?php echo $form->input('program_studi_id', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-'));?>
<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/frs/getjurusan','update'=>'daftar_jurusan'))?>

<div class="input select">
<span id="daftar_jurusan">
<?php 
		echo $form->input('JURUSAN', array("type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-'));	
?>
</span>
</div>
</fieldset>
<?php echo $ajax->submit('Filter',array('url'=>'/form_studis/get_ksm','update'=>'ksm_mahasiswa'))?>
</form>

<div id="ksm_mahasiswa">
</div>

</div>
</div>