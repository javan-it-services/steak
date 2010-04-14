<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Jenjang Studi');?></span></h2>
<?php echo $form->create('Tprogram', array("url"=>array("controller"=>"tprograms","action"=>"add")));?>
	<fieldset>
	<?php
		echo $form->input('code', array ('label'=>'Kode EPSBED'));
		echo $form->input('value', array ('label'=>'Nama'));
	?>
	</fieldset>
	<?php echo $form->end('Tambah');?>
</div>
<div class="grid_4 omega" id="sidebar">

</div>
