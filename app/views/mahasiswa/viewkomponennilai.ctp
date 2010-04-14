<?php if(!isset($isAjax)):?>
<h2>Komponen Penilaian kelas <?php echo $tkelase['Tkelase']['NAMA_KELAS']?> mata kuliah <?php echo $tkelase['Tkelase']['KD_KULIAH'];?></h2>
<?php else:?>
<a href='#' onclick="sembunyikan('jadwal_kelas<?=$tkelase['Tkelase']['ID']?>');return false;">Sembunyikan</a>
<?php endif;?>
<?php if(!empty($tkelase['KomponenNilai'])):?>
<table class='Design'>
	<thead>
		<tr>
			<th>Aspek Penilaian</th>
			<th>Persentase</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<?php foreach($tkelase['KomponenNilai'] as $row):?>
	<tbody>
	<tr>
		<td><?php echo $row['nama']?></td>
		<td align="center"><?php echo $row['persentase']?> %</td>
		<td align="center"><?php echo $row['KartuStudiKomponenNilai']['nilai']?></td>
	<tr>
	</tbody>
	<?php endforeach;?>
</table>
<?php else:?>
<i>Belum diisi</i>
<?php endif;?>