<div>
<?
echo "Jumlah SKS Kuliah : ".$tmatakuliahs['Tmatakuliah']['SKS'];
?>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	
	<th>Kelas</th>
	<th>Semester</th>
	<th>Tahun Ajaran</th>
	<th>Dosen</th>
	<th>Action</th>
</tr>
</thead>
<?php foreach ($tkelases as $tkelase): ?>
<tbody>
	<tr>
		
		<td>
			<?php echo $tkelase['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $tkelase['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $tkelase['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $tkelase['Tdosen']['NAMA_DOSEN']; ?>
		</td>
		<td>			
			<?php echo $ajax->link('Jadwal','', array('url'=>'jadwal/'.$tkelase['Tkelase']['ID'], 'update'=>'jadwal_kelas'.$tkelase['Tkelase']['NAMA_KELAS'])); ?> | 
			<?php echo $ajax->link('Hapus','', array('url'=>'delete/'.$tkelase['Tkelase']['ID'], 'update'=>'daftar_kelas')); ?>
		</td>
	</tr>
	<tr><td colspan=5><div id="jadwal_kelas<?=$tkelase['Tkelase']['NAMA_KELAS']?>"></div></td></tr>
</tbody>
<?php endforeach; ?>
</table>
</div>