  <table border="1" cellpadding="0" cellspacing="0">
    
<tr>
	<th>N0</th>
        <th>No Registrasi</th>
	<th>Nama Lengkap</th>
	<th>Ruangan</th>
	<?php foreach($jenisNilai as $nilai): ?>
                <th><?php echo $nilai['JenisNilaiPendaftaran']['name'] ?></th>
                <?php endforeach; ?>
                <th>Nilai Rata-rata</th>
</tr>

                <?php $no=1; ?>
                <?php foreach($listMahasiswa as $mhs): ?>
                <?php $sum=0; ?>
                <tr id="row<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NAMA'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['ruang_test'] ?></td>
                    <?php foreach($mhs['Nilai'] as $nilai): ?>
                    <td id="nilai<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'].$nilai['JenisNilaiPendaftaran']['id'] ?>"><?php echo $nilai['PmbNilai']['nilai']; $sum+=$nilai['PmbNilai']['nilai']; ?></td>
                    <?php endforeach; ?>
                    <td id="mean<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?>"><?php echo (count($mhs['Nilai']) > 0)? $sum/count($mhs['Nilai']):"" ?></td>
                </tr>
                <?php endforeach; ?>
            
    </table>

