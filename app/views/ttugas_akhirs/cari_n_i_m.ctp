<div class="ttugasakhirs index grid_12 alpha " id="content">
<div class="box">
	<h2 class="section_name"><span class="section_name_span"><?php __('Cari Tugas Akhir');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/ttugas_akhirs/cariNIM', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM1', array('label'=>'Masukan NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>


<div style="clear:both"></div>


<?php
	//if(empty($ttugasAkhirs)){
		
		
	if(isset($error1)){
		echo "<p>$error1</p>";
		
			
		echo $form->create('TtugasAkhir', array('type'=>'file','url'=>'/ttugas_akhirs/add'));
		echo "<div class='input text'>";
		echo $form->label("NIM");
		if(isset($nim)){
			echo $form->text("NIM1",array("value"=>$nim,"readonly"=>true));
		}
		else{
			echo $form->select('NIM1',$tmahasiswas1);
		}
		echo "</div>";
		echo $form->input('topik');
		
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 1");
		echo $form->select('pembimbing1',$tdosens1);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 2");
		echo $form->select('pembimbing2',$tdosens2);
		echo "</div>";
		echo $form->input('file_download', array('type'=>'file'));
		echo $form->end('Submit');
	//	}
	}
	
	if(isset($error2)){
		echo "<p>$error2</p>";
		
	}
	if(isset($ttugasAkhirs)){		
		if(!empty($ttugasAkhirs)):
	
		foreach ($ttugasAkhirs as $ttugasAkhir):
		echo $form->create('TtugasAkhir', array('type'=>'file','url'=>'/ttugas_akhirs/edit'));
		echo $form->input('NIM', array('value'=>$ttugasAkhir['TtugasAkhir']['NIM'],'readonly'=>true));
		echo $form->input('topik', array('value'=>$ttugasAkhir['TtugasAkhir']['topik']));
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 1");
		echo $form->select('pembimbing1',$tdosens1,array('value'=>$ttugasAkhir['TtugasAkhir']['pembimbing1']));
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 2");
		echo $form->select('pembimbing2',$tdosens2,array('value'=>$ttugasAkhir['TtugasAkhir']['pembimbing2']));
		echo "</div>";
		echo $form->input('file_download', array('type'=>'file'));
		echo "<div class='input text'>";
		echo $form->label("Download File"); 
		echo $html->link($ttugasAkhir['TtugasAkhir']['file_name'], array('action'=>'downloadfile', $ttugasAkhir['TtugasAkhir']['NIM']), array('title'=>'download file'),false,false);
		echo "</div>";
		echo $form->end('Submit');
		endforeach;
		
		endif;	
	}
?>