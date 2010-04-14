<div class="frs index grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('History Mata Kuliah Lulus');?></span></h2>

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
</div>
</div>

<div class="frs index grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('History Mata Kuliah Tidak Lulus');?></span></h2>
</div>

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
</div>
</div>
<br/>

<div class="frs index grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Form Studi');?></span></h2>
</div>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>  
<tr>	
	<th>Tahun Ajaran</th>
	<th>Semester</th>
	<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
$totalsks=0;
foreach ($formstudis as $row): ?>
	<tr>
		<td>
			<?php echo $row['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $row['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'lihatnilai', $row['FormStudi']['id']), array('title'=>'Lihat Nilai'),false,false); ?>
			
		</td>
	</tr>
<?php endforeach; ?>		
</tbody>
</table>
</div>
</div>