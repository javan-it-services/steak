<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Isi Kehadiran Mahasiswa');?></span></h2>
<?php 
	if(isset($error)){
		echo "<p align='center'><b><font color='red'>$error</font></b></p>";
	}
?>
<?php echo $form->create('Presence', array('url'=>'add_absen'));?>
<?php echo $form->input('pertemuan_id', array("name"=>"data[Presence][pertemuan_id]","label"=>"Pertemuan","type"=>"select","id"=>"pertemuan_id","options"=>$data_pertemuans,'empty'=>'-pilih-')); ?>
<table class="Design">
</thead>
<tr>
<td>NIM</td>
<td>Nama</td>

</tr>
</thead>
<tbody>

<?

$i = 0;
foreach($kartustudis as $kartustudi) :
$i = $i + 1;
?>
   	<tr>
   		<td><?php echo $kartustudi['FormStudi']['NIM']; ?></td>
   		<td><?php echo $kartustudi['FormStudi']['Tmahasiswa']['NAMA']; ?></td>
   		
   		<td>
        <td>
        <?php
        echo $form->hidden('nim',array('name'=>'data[nim]['.$i.']','value'=> $kartustudi['FormStudi']['NIM']));
        echo $form->input('keterangan',array('name'=>'data[keterangan]['.$i.']','label'=>'','type'=>'select','options'=>array('m'=>'Masuk','i'=>'Ijin','a'=>'Tanpa Keterangan')));
        ?>
        </tr>
        <?php 
        endforeach;
        ?>
</tbody>
<table>

<?php 
	echo $form->end('Simpan');?>
</div>
</div>
