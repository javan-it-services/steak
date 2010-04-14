<div class="tsilabusMatakuliahs index grid_12 alpha " id="content">

<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Silabus Akademik Program Studi');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/tsilabus_akademik/silabus/front', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('FAKULTAS', array("empty"=>"Semua",
                                          'label'=>'Fakultas',
                                          "type"=>"select",
                                          "options"=>$tfakultases,
                                          "onchange"=>"this.form.submit()", 'div'=>'filter', 'fieldset'=>false))?>
 		</td>
		<td>
			<?php 
				if($lblforeignkey=="Jurusan"){
					echo $form->input('JURUSAN', array("empty"=>"Semua",'label'=>'Jurusan',"type"=>"select","options"=>$tjurusans, 'div'=>'filter', 'fieldset'=>false));
				}
		?>
		</td>
		
		<td>                                         
			<?php echo $form->input('program_studi_id', array("empty"=>"Semua",
                                               'label'=>'Program Studi',
                                               "type"=>"select",
                                               "options"=>$tprograms,
                                               "onchange"=>"this.form.submit()", 'div'=>'filter', 'fieldset'=>false))?>
        </td>
		<td>
			<?php echo $form->input('IS_BUKA',array("empty"=>"Semua",
                                        'label'=>'Status',
                                        "type"=>"select",
                                        "options"=>array('0'=>'ditutup','1'=>'dibuka'), 'div'=>'filter', 'fieldset'=>false))?>
       </td>
		<td>
		<label>&nbsp;</label>                                 
		<?php echo $form->end('Show',array("name"=>"action"))?>
		
	</td>
	</tr>
</table>
</form>

<div style="clear:both"></div>
<?php if(empty($tsilabusAkademiks)){
echo "<h3>Data Tidak Ditemukan!</h3>";	
	
}else{ ?>
<!-- Show the mata kuliah list for each semester-->
<?php $i=0; $num = count($tsilabusAkademiks);$temp = $tsilabusAkademiks[0]['Tmatakuliah']['semester']; ?>
<?php while($i<$num): ?>
    <div><b>Semester <?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['semester']?></b></div>
    <table cellpadding="0" cellspacing="0" class="Design">
    <thead>
    <tr>
            <th>Kode Kuliah</th>
            <th>Nama Kuliah</th>
            <th>Fakultas</th>            
            <th>Jurusan</th>
            <th>Program Studi</th>
            <th>Sifat</th>
            <th>SKS</th>
            <th>Status</th>
    </tr>
    </thead>
        <tbody>
        
        <?php while($i<$num && $tsilabusAkademiks[$i]['Tmatakuliah']['semester'] == $temp) :?>
            <tr>
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH']; ?></td>
                    <td><?php echo $html->link($tsilabusAkademiks[$i]['Tmatakuliah']['NAMA_KULIAH'],array('action'=>'viewsilabus',$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH'])); ?></td>
                    <td><?php echo $tsilabusAkademiks[$i]['Tfakultase']['nama']?$tsilabusAkademiks[$i]['Tfakultase']['nama']:"Semua Fakultas"; ?></td>                    
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['JURUSAN']?$tsilabusAkademiks[$i]['Tmatakuliah']['JURUSAN']:"Semua Jurusan"; ?></td>
                    <td><?php
                    echo $tsilabusAkademiks[$i]['JenjangStudi']['value']?$tsilabusAkademiks[$i]['JenjangStudi']['value']:"Semua Program Studi"; ?></td>
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['SIFAT']; ?></td>
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['SKS']; ?></td>
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['IS_BUKA']?"dibuka":"ditutup"; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile;?>
        <?php $temp = (($i < $num) ? $tsilabusAkademiks[$i]['Tmatakuliah']['semester'] : null);
        ?>
        </tbody>
    </table>
    <br />
<?php endwhile;?>
</div>
</div>
<?php } ?>