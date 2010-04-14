
<div class="tmahasiswas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Pilih Mata Kuliah Konversi');?></span></h2>

               <?php echo $form->create('Tkonversi',array('url'=>'/tcalon_mahasiswas/pindahan','class'=>'plain', "type"=>"file"));?>
<table class="report">
    <?php
     $counter=0;
        foreach($matakuliah as $row):
             $counter++;
         $Matkul = $row['Tmatakuliah']['NAMA_KULIAH'];
    ?>
	<tr>
		<td>
                        <?php
                          echo $form->input("Tkonversi.$counter.KD_KULIAH", array('type'=>'checkbox','value'=>$row['Tmatakuliah']['KD_KULIAH'],'label'=>FALSE,'fieldset'=>FALSE));
                          echo $form->label($Matkul);
                        ?>
		</td>
                <td>
                    <?php        ?>
                </td>
                <td>
                    <?php
                        echo $form->input("Tkonversi.$counter.NILAI", array('label'=>'Nilai Konversi','type'=>'select', 'options'=>array('A'=>'A','B'=>'B','C'=>'C','D'=>'D')));
                    ?>
                </td>
	</tr>
         <?php
                        echo $form->hidden("Tkonversi.$counter.NO_REGISTRASI", array('label'=>'NO','type'=>'text','value'=>$NO_REGISTRASI));
                    ?>
     <?php endforeach;?>
                   


        <tr>
            <td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Simpan') ?>
		</td>

        </tr>
</table>
</form>

        </div>
</div>
