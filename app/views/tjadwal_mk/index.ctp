<div class="tsilabusMatakuliahs index">
<h2><?php __('Mata Kuliah');?></h2>

<?php echo $form->create('Filter', array('url'=>'/tsilabus_akademik/index'))?>
<?php echo $form->input('FAKULTAS', array("empty"=>"Semua",
                                          'label'=>'Fakultas',
                                          "type"=>"select",
                                          "options"=>$tfakultases,
                                          "onchange"=>"this.form.submit()"))?>
<?php echo $form->input('PROGRAM_STUDI', array("empty"=>"Semua",
                                               'label'=>'Program Studi',
                                               "type"=>"select",
                                               "options"=>$tprograms,
                                               "onchange"=>"this.form.submit()"))?>
<?php 
	if($lblforeignkey=="Jurusan"){	
		echo $form->input('JURUSAN', array("empty"=>"Semua",'label'=>'Jurusan',"type"=>"select","options"=>$tjurusans));
	}
?>
<?php echo $form->input('IS_BUKA',array("empty"=>"Semua",
                                        'label'=>'Status',
                                        "type"=>"select",
                                        "options"=>array('0'=>'ditutup','1'=>'dibuka')))?>
<?php echo $form->end('Show',array("name"=>"action"))?>
<!-- Show the mata kuliah list for each semester-->
<?php $i=0; $num = count($tsilabusAkademiks);$temp = $tsilabusAkademiks[0]['Tmatakuliah']['semester'];  ?>
<?php while($i<$num): ?>
    <div>Semester <?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['semester']?></div>
    <table cellpadding="0" cellspacing="0" class="Design">
    <thead>
    <tr>
            <th>KODE KULIAH</th>
            <th>NAMA KULIAH </th>
            
            <th>SKS</th>
            <th>ACTION</th>
    </tr>
    </thead>
        <tbody>
        <?php while($i<$num && $tsilabusAkademiks[$i]['Tmatakuliah']['semester'] == $temp) :?>
            <tr>
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH']; ?></td>
                    <td><?php echo $html->link($tsilabusAkademiks[$i]['Tmatakuliah']['NAMA_KULIAH'],array('action'=>'view',$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH'])); ?></td>
                   
                    <td><?php echo $tsilabusAkademiks[$i]['Tmatakuliah']['SKS']; ?></td>
                    <td class="action"><?php echo $ajax->link('Jadwal','', array('url'=>'jadwal/'.$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH'], 'update'=>'jadwal_kelas'.$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH'])); ?>
                    	<a href='#' onclick="sembunyikan('jadwal_kelas<?=$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH']?>');return false;">Sembunyikan</a>	
                    </td>
            </tr>
           <tr><td colspan=5><div id="jadwal_kelas<?=$tsilabusAkademiks[$i]['Tmatakuliah']['KD_KULIAH']?>"></div></td></tr>
            <?php $i++; ?>
        <?php endwhile;?>
        <?php $temp = (($i < $num) ? $tsilabusAkademiks[$i]['Tmatakuliah']['semester'] : null);
        ?>
        </tbody>
    </table>
    <br />
<?php endwhile;?>
</div>
<script type="text/javascript">
	function sembunyikan(id){
		document.getElementById(id).innerHTML = "";
	}
</script>