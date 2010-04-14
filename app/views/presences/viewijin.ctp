<div id="<?php echo $NIM?>">
<table cellpadding="0" cellspacing="0" class='Design' border="1">
<thead>
<tr>
	<td><b>Pertemuan</b></td>
	<td><b>Tanggal</b></td>
	<td><b>Jam</b></td>
	<td><b>Ruang</b></td>
</tr>
</thead>
<?php foreach ($waktu as $wakt): ?>
	<tr>
		<td>
			<?php echo $wakt['Pertemuan']['pertemuan_ke']; ?>
		</td>
		<td>
			<?php echo $wakt['Pertemuan']['tanggal']; ?>
		</td>
		<td>
			<?php echo $wakt['Pertemuan']['jam']; ?>
		</td>
		<td>
			<?php echo $wakt['Pertemuan']['TruangKuliah']['RUANG_NAME']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<p align="right"><a href="#" onclick="$('<?= $NIM?>').toggle();return false;" align="right"><b>Tutup</b></a></p>
</div>