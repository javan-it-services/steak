<div class="tprograms form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Jenjang Studi');?></span></h2>
	<?php echo $form->create('Tprogram', array("url"=>array("controller"=>"tprograms","action"=>"edit")));?>
	<fieldset>
	<?php
		echo $form->hidden('id',array('value'=>$id));
		echo $form->input('code', array ('label'=>'Kode EPSBED','value'=>$kode));
		echo $form->input('value', array ('label'=>'Nama','value'=>$value));
	?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>
</div>

<div class="grid_4 omega" id="sidebar">
		<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Refdetil.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
