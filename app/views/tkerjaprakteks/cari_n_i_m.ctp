<div class="tkerjaprakteks index grid_12 alpha " id="content">
<div class="box">
	<h2 class="section_name"><span class="section_name_span"><?php __('Cari Kerja Praktek');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/tkerjaprakteks/cariNIM', 'class'=>'filter'))?>
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
	/*echo $form->create("Mahasiswa",array("url"=>"/tstatus_pembayarans/cariNIM"));
	echo $form->input("NIM");
	echo $form->end("Cari");*/
	if(isset($error1)){
		echo "<p>$error1</p>";
		//echo $html->link("Tambah Kerja Praktek","/tkerjaprakteks/add/$nim");
		echo $form->create('Tkerjapraktek', array('type'=>'file'));
		echo "<div class='input text'>";
		echo $form->label("NIM");
		if(isset($nim)){
			echo $form->text("NIM1",array("value"=>$nim,"readonly"=>true));
		}
		else{
			echo $form->select('NIM1',$tmahasiswas);
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
		echo $form->end('Submit');
	}
	if(isset($error2)){
		echo "<p>$error2</p>";
		
	}
	if(isset($tkerjaprakteks)){		
		if(!empty($tkerjaprakteks)):
	
		foreach ($tkerjaprakteks as $tkerjapraktek):
		echo $form->create('Tkerjapraktek', array('action'=>'edit/','type'=>'file'));
		echo $form->input('NIM', array('value'=>$tkerjapraktek['Tkerjapraktek']['NIM'],'readonly'=>true));
		echo $form->input('topik', array('value'=>$tkerjapraktek['Tkerjapraktek']['topik']));
		echo $form->input('lokasi', array('value'=>$tkerjapraktek['Tkerjapraktek']['lokasi']));
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 1");
		echo $form->select('pembimbing1',$tdosens1,array('value'=>$tkerjapraktek['Tkerjapraktek']['pembimbing1']));
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Pembimbing 2");
		echo $form->select('pembimbing2',$tdosens2,array('value'=>$tkerjapraktek['Tkerjapraktek']['pembimbing2']));
		echo "</div>";
		echo $form->input('file_kp', array('type'=>'file'));
		echo "<div class='input text'>";
		echo $form->label("Download File"); 
		echo $html->link($html->image('Download.gif'), array('action'=>'downloadfile', $tkerjapraktek['Tkerjapraktek']['NIM']), array('title'=>'Download '.$tkerjapraktek['Tkerjapraktek']['filename']),false,false);echo " ". $html->link($tkerjapraktek['Tkerjapraktek']['filename'], array('action'=>'downloadfile', $tkerjapraktek['Tkerjapraktek']['NIM']), array('title'=>'Download '.$tkerjapraktek['Tkerjapraktek']['filename']),false,false);
		echo "</div>";
		echo $form->input('mulai',array('label'=>'Tanggal Mulai','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','value'=>$tkerjapraktek['Tkerjapraktek']['mulai']));
		echo $form->input('berakhir',array('label'=>'Tanggal Akhir','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','value'=>$tkerjapraktek['Tkerjapraktek']['berakhir']));
		echo $form->end('Submit');
		endforeach;
		
		endif;	
	}
?>