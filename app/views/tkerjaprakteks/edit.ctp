<div class="tkerjaprakteks form grid_12 alpha " id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Edit Kerja Praktek');?></span></h2>

<?php echo $form->create('Tkerjapraktek',array('type'=>'file'));?>

	<fieldset>
 	<?php
		if(isset($error)){
			echo "<p>$error</p>";			
		}
		if(isset($nim)){
			echo $form->text("NIM1",array("value"=>$nim,"readonly"=>true));
		}
		else{
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
		}
		echo "</div>";
		
		echo $form->input('topik');
		echo $form->input('lokasi');
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 1");
		echo $form->select('pembimbing1',$tdosens1);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 2");
		echo $form->select('pembimbing2',$tdosens2);
		echo "</div>";
		echo $form->input('file_kp', array('type'=>'file'));
		echo $form->input('mulai',array('label'=>'Tanggal Mulai','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $form->input('berakhir',array('label'=>'Tanggal Akhir','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tkerjapraktek.NIM')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>