  <table border="1" cellpadding="0" cellspacing="0">
  
<tr>
	<th>NIM</th>
	<th>Nama Lengkap</th>
	<th>Jurusan</th>
	<th>No Kwitansi</th>
	<th>Tanggal</th>
	<th>bank</th>
	<th>jumlah</th>
	
	
</tr>

<?php

foreach ($keuangans as $keuangan):
	
?>
	<tr>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['mahasiswa_id']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tmahasiswa']['NAMA']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tjurusan']['Refdetil']['value'] ."-".$keuangan['Tjurusan']['namaJurusan']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['no_kwitansi']; ?>
		</td>
		<td>
			<?php echo date('d-m-y',strtotime($keuangan['KeuanganTransaksi']['tanggal'])); ?>
		</td>
		<td>
			<?php echo $keuangan['Tbank']['nama']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['jumlah']; ?>
		</td>
	</tr>
<?php endforeach; ?>

    </table>

