  <table border="1" cellpadding="0" cellspacing="0">
  
<tr>
	<th>No Registrasi</th>
	<th>Nama Lengkap</th>
	<th>Alamat</th>
	<th>Jurusan</th>
	<th>Tempat Tgl Lahir</th>
	<th>Kenal STMIK</th>
	<th>Status</th>
	<th>Agama</th>
	<th>Telepon</th>
	
	
</tr>

<?php

foreach ($calonMahasiswas as $row):
	
?>
	<tr>
		<td>
			<?php echo $row['TcalonMahasiswa']['NO_REGISTRASI']; ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['NAMA']; ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['ALAMAT']; ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['TPROGRAM_ID'] ."-".$row['Tjurusan']['namaJurusan']; ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['TEMPAT_LAHIR'].", ". date('d-m-y',strtotime($row['TcalonMahasiswa']['TGL_LAHIR'])); ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['kenal_stmik']; ?>
		</td>
		<td>
			<?php 
				if($row['TcalonMahasiswa']['status']=="1"){
					echo "Di terima";
				}else{
				 	echo "Di tolak";
				 }
			
			?>
		</td>
		<td>
			<?php echo $row['Tagama']['AGAMA_NAME']; ?>
		</td>
		<td>
			<?php echo $row['TcalonMahasiswa']['TELEPON']; ?>
		</td>
	</tr>
<?php endforeach; ?>

    </table>

