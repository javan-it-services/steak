<table class="report">
<thead>
<tr>
	<td>
		DOSEN MENGAJAR : <b> <?php echo $get_dosens; 
		
		?> </b>
	</td>
</tr>
</thead>
<tbody>
<tr>
	<td>
		Keterangan : <?php 
		echo $form->hidden('id',array('name'=>'data[Pertemuan][id]','value'=>$pertemuans['0']['Presence']['pertemuan_id']));
		echo $form->input('status_dosen',array('name'=>'data[Pertemuan][status_dosen]','label'=>'','type'=>'select','options'=>array('m'=>'Masuk','i'=>'Ijin','a'=>'Tanpa Keterangan'),'selected'=>$status));?>
	</td>
</tr>
</tbody>
</table>

<table class="Design">
<thead>

<tr>
<td>NIM</td>
<td>Nama</td>
<td>Keterangan</td>
</tr>
</thead>
<tbody>

<?php
$i = 0;
foreach($pertemuans as $pertemuan) :
$i = $i + 1;
?>
   	<tr>
   		<td><?php echo $pertemuan['Presence']['nim']; ?></td>
   		<td><?php echo $pertemuan['Tmahasiswa']['NAMA']; ?></td>
   		<td><?php echo $pertemuan['Presence']['keterangan']; ?></td>
   		<td>
        <td>
        <?php

        echo $form->hidden('id',array('name'=>'data[id]['.$i.']','value'=>$pertemuan['Presence']['id']));
        echo $form->input('keterangan',array('name'=>'data[keterangan]['.$i.']','label'=>'','type'=>'select','options'=>array('m'=>'Masuk','i'=>'Ijin','a'=>'Tanpa Keterangan')));
        ?>
        </tr>
        <?php 
        endforeach;
        ?>
        
</tbody>
<table>