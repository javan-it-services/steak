<div class="users form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Jadwal Kuliah');?></span></h2>
<p>
</p>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	
	
	<th>KELAS</th>
	<th>MULAI</th>
	<th>SELESAI</th>
	<th>HARI</th>
	<th>RUANG</th>
	
	
</tr>
</thead>
<?php foreach ($tjadwalKuliahs as $tjadwalKuliah): ?>

<tbody>
	<tr>
				
		<td>
			<?php echo $tjadwalKuliah['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $tjadwalKuliah['Twaktus']['WAKTU_BEGIN']; ?>
		</td>
		<td>
			<?php echo $tjadwalKuliah['Twaktus']['WAKTU_END']; ?>
		</td>		
		<td>
			<?php echo $tjadwalKuliah['Jadwal']['hari']; ?>
		</td>
		<td>
			<?php echo $html->link($tjadwalKuliah['TruangKuliah']['RUANG_NAME'],array("controller"=>"truang_kuliahs","action"=>"view",$tjadwalKuliah['TruangKuliah']['RUANG_ID'])); ?>
		</td>
		
				
	</tr>
</tbody>
<?php endforeach; ?>
</table>
</div>
</div>
