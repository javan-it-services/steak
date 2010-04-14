<div class="rencana_studi index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit File Silabus');?></span></h2>
		<p>
<div class="tfiles form">
<?php echo $form->create('Tfile', array('type'=>'file', 'url'=>'editfile'));?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nama_file');
		echo "<div class='input text'>";
  		echo $form->label("File");
  		echo $form->file('file_tugas', array('type'=>'file'));
  		echo "</div>";
		echo $form->hidden('tsilabus_mingguan_id');
		echo $form->hidden('download_file', array('value'=>$f));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>
</div>
