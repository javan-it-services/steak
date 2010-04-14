<div class="frs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Registrasi Form Studi');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/frs/registrasi',"id"=>"IdFilter", 'class'=>'filter'))?>
	
	<?php echo $form->input('program_studi_id', array("label"=>__("Program Studi", true),"type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-'));?>
	<?php echo $form->input('FAKULTAS', array("label"=>__("Fakultas", true),"id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-'))?>
	<div class="input select">
	<span id="daftar_jurusan" >
	<?php
	echo $form->input('JURUSAN', array("label"=>__("Jurusan", true),"type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-', 'div'=>false));
	?>
	</span>

	<?php echo "<span id='loader' style='display:none'>".$html->image('loader_10.gif')."</span>";?>
	</div>

	<?php echo $ajax->submit('Filter',array('url'=>'/frs/getmatkul','update'=>'daftar_matkul','before'=>"$('loaderBar').show()", 'complete'=>"$('loaderBar').hide()"))?>
		
</form>
<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/frs/getjurusan','update'=>'daftar_jurusan', 'before'=>"preload()", 'complete'=>"postload()"))?>
<?php echo "<div id='loaderBar' style='display:none;text-align:center'>".$html->image('loader_bar.gif')."</div>";?>
<div id="daftar_matkul">

</div>


<script type="text/javascript">
	var ajaxCounter = 0;

	$("IdFilter").reset();

	function preload(){
		ajaxCounter++;
		$('loader').show();
	}

	function postload(){
		ajaxCounter--;
		if(ajaxCounter==0)
			$('loader').hide();
	}
</script>
</div>
</div>