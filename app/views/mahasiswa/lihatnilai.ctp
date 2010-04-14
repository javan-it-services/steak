<?php 
	$formstudi = $nilais[0]['FormStudi'];
?>
<div class="Mahasiswa form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span">Nilai Semester <?php echo $formstudi['Tsemester']['NAME']?> Tahun Ajaran <?php echo $formstudi['TtahunAjaran']['nama']?></span></h2>

<table class="Design">
<thead>
	<tr>
		<th>Kode Kuliah</th>
		<th>Nama Kelas</th>
		<th>Status</th>
		<th>Nilai Angka</th>	
		<th>Nilai Akhir</th>	
	</tr>
</thead>
<?php if(!empty($nilais)):
$totalsks = 0;
$totalnilai = 0;
?>
<?php foreach($nilais as $row):
if(isset($row['TmasterNilai']['kode'])){
	$totalsks += $row['Tkelase']['Tmatakuliah']['SKS'];
	$totalnilai += $row['Tkelase']['Tmatakuliah']['SKS']*$row['TmasterNilai']['nilai'];	
	
}
?>
	<tr>
		<td><?php echo $row['Tkelase']['KD_KULIAH']?></td>
		<td><?php echo $row['Tkelase']['NAMA_KELAS']?></td>
		<td><?php echo $row['KartuStudi']['status_lulus']?></td>
		<td><?php echo $row['KartuStudi']['nilai_angka']?></td>	
		<td><?php echo isset($row['TmasterNilai']['kode'])?$row['TmasterNilai']['kode']:'Belum Diisi'?></td>		
	</tr>
<?php endforeach;?>
<tr>
	<td colspan='4' align='right'><b>Total SKS</b></td>
	<td><?php echo $totalsks?></td>
</tr>
<tr>
	<td colspan='4' align='right'><b>IP</b></td>
	<td><?php
		if($totalsks)	
	 		echo $ip = $totalnilai/$totalsks;
	 	else
	 		echo '0';
	 ?></td>
</tr>
<?php endif;?>
</table>