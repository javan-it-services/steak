<div class="tberitas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Berita');?></span></h2>
<?php
if(isset($error)){		
		echo "<p align='center'><b><font color='red'>$error</font></b></p>";
}
?>
<div class="tcicilans form">
<?php echo $form->create('Tcicilan',array('action'=>'edit/'.$id));?>
	<fieldset>
	<?php
		echo $form->input('id');

		//echo $form->input('NIM',array('value'=>$nim,'type'=>'hidden'));
		
		echo $form->input('tstatus_pembayaran_id', array('value'=>$id,'type'=>'hidden'));


		echo $form->input('tanggal',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $form->input('cicilan_ke',array('readonly'=>'true'));
		echo $form->input('jumlah_pembayaran');
	?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>
</div>

<div class="grid_4 omega" id="sidebar">

</div>
