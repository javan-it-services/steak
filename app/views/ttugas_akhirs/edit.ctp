<div class="ttugasAkhirs form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Tugas Akhir');?></span></h2>
<?php echo $form->create('TtugasAkhir',array('type'=>'file'));?>
	<fieldset>
 		
	<?php
		
		echo "<div class='input text'>";
		echo $form->label("NIM 1");
		echo $form->select('NIM1',$tmahasiswas1);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("NIM 2");
		echo $form->select('NIM2',$tmahasiswas2);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("NIM 3");
		echo $form->select('NIM3',$tmahasiswas3);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 1");
		echo $form->select('pembimbing1',$tdosens1);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 2");
		echo $form->select('pembimbing2',$tdosens2);
		echo "</div>";
		echo $form->input('topik');
		echo "<div class='input text'>";
		echo $form->label("File");
		//echo $form->create('TtugasAkhir', array("action"=>"add", "type"=>"file"));
		echo $form->file('file_download');
		echo "</div>";
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('TtugasAkhir.NIM')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
