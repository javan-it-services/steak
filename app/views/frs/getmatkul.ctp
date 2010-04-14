<?php echo $form->create('Frs', array('url'=>'/frs/simpanFrs',"id"=>"IdFilter"))?>
<?php if(!empty($matkuls)):?>
<table class="Design">
    <thead>
        <tr>
        	<th>Ambil</th>
            <th colspan='2'>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Pilih Kelas</th>
        </tr>
    </thead>
    <?php
    $row = 0;
    //pr($matkuls );
    foreach($matkuls as $matkul):

  $kelases = $matkul['Tkelase'];
  $ruang = array();
  foreach($kelases as $kelase){
  	$ruang[$kelase['ID']]=$kelase['NAMA_KELAS'];
  }
  $kode = $matkul['Tmatakuliah']['KD_KULIAH'];
  ?>
    <tr>
    <td><input type="checkbox"  name="data[<?=$row?>][check]"></td>
        <td>
        <?php echo $html->link($matkul['Tmatakuliah']['KD_KULIAH'],array("controller"=>"frs","action"=>"view",$matkul['Tmatakuliah']['KD_KULIAH'])); ?>
       </td>
        <td><?php echo $matkul['Tmatakuliah']['NAMA_KULIAH']?></td>
        <td><?php echo $matkul['Tmatakuliah']['SKS'];?></td>
        <td align='center'><?php echo $form->input("kelas",array("name"=>"data[$row][kelas]","type"=>"select","options"=>$ruang,"label"=>false,"id"=>"id_kelas".$matkul['Tmatakuliah']['KD_KULIAH']))?></td>
    </tr>
    <?php
    $row++;
    endforeach;
//pr($sks_ambil);
    ?>
</table>
<?php echo $form->end('ambil')?>
<?php else:?>
<i>Tidak ada mata kuliah yang bisa diambil</i>
<?php endif;?>