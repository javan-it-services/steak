<div id="<?php echo $NIM?>">
<h4>History Mata Kuliah Lulus</h4>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>Mata Kuliah</th>
	<th>Tahun Ajaran</th>
	<th>Semester</th>
	<th>SKS</th>
</tr>
</thead>
<tbody>

<?php 
$totalsks=0;
foreach ($form_studis_lulus as $lulus): ?>
	<tr>
		<td>
			<?php echo $lulus['Tkelase']['Tmatakuliah']['NAMA_KULIAH']; ?>
		</td>
		<td>
			<?php echo $lulus['FormStudi']['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $lulus['FormStudi']['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $lulus['Tkelase']['Tmatakuliah']['SKS']; 
			$totalsks+=$lulus['Tkelase']['Tmatakuliah']['SKS'];
			?>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td colspan="3">
			Jumlah SKS
		</td>
		<td>
			<?php echo $totalsks; ?>		
		</td>
	</tr>
</tbody>	

</table>


<h4>History Mata Kuliah Tidak Lulus</h4>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>  
<tr>
	<th>Mata Kuliah</th>
	<th>Tahun Ajaran</th>
	<th>Semester</th>
	<th>SKS</th>
</tr>
</thead>
<tbody>
<?php 
$totalsks=0;
foreach ($form_studis_tidak as $tidak): ?>
	<tr>
		<td>
			<?php echo $tidak['Tkelase']['Tmatakuliah']['NAMA_KULIAH']; ?>
		</td>
		<td>
			<?php echo $tidak['FormStudi']['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $tidak['FormStudi']['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $tidak['Tkelase']['Tmatakuliah']['SKS']; 
			$totalsks+=$tidak['Tkelase']['Tmatakuliah']['SKS'];
			?>	
		</td>
	</tr>
<?php endforeach; ?>	
	<tr>
		<td colspan="3">
			Jumlah SKS
		</td>
		<td>
			<?php echo $totalsks; ?>
		</td>
	</tr>
</tbody>
</table>
<a href="#" onclick="$('<?= $NIM?>').toggle();return false;">Tutup</a>
</div>