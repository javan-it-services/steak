<div class="groups form">
		<h2 class="section_name"><span class="section_name_span"><?php __('Kelengkapan Pendaftaran Calon Mahasiswa baru dengan NO REGISTRASI : ');echo $NO_REGISTRASI;?></span></h2>

<?php echo $form->create('TcalonMahasiswa',array('url'=>'/tcalon_mahasiswas/kelengkapan'))?>
<table class="filter">
	
     
       <tr>
		<td>
        	<?php
               // $id = $row['Tperlengkapan']['id'];
               // $jenis = $row['Tperlengkapan']['jenis'];
                echo "<div id='input text'>";
               	//echo $form->input("kelengkapan",array('type'=>'checkbox','value'=>$id,'label'=>$jenis,'checked'=>FALSE, array('value'=>$jenis)));
               echo $form->hidden('NO_REGISTRASI',array('value'=>$NO_REGISTRASI));
        echo $form->input('Tperlengkapan', array('multiple'=>'checkbox', 'div' => false, 'label' =>false));
   
                echo "</div>";
            ?>
                       
		</td>
        </tr>
	
        
        
    <tr>
		<td>
			<label>&nbsp;</label>
			
		</td>
	</tr>
</table>
<?php echo $form->submit('Simpan');?>
</div>
