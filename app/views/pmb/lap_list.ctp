<?php ob_start(); ?>
<style type="text/css" media="all">
    table {
        width: 100%;
    }
    table th {
        background: #0965c1;
        color: #fff;
        font-weight: bold;
    }
    table td {
        padding: 6px;
        border-bottom: 1px solid #cde;
    }
</style>
        <h2>Nilai USM</h2>
        <h4>Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?> Tahun <?php echo $gelombang['TtahunAjaran']['nama'] ?></h4>
        <table cellpadding=0 cellspacing=0>
            <thead>
                <tr>
                <th style="width:30px">No</th>
                <th style="width:120px">Nomor Registrasi</th>
                <th style="width:120px">Nama Mahasiswa</th>
                <th style="width:80px">Ruangan</th>
                <?php foreach($jenisNilai as $nilai): ?>
                <th style="width:80px"><?php echo $nilai['JenisNilaiPendaftaran']['name'] ?></th>
                <?php endforeach; ?>
                <th style="width:80px">Nilai Rata-rata</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
<?php $content = ob_get_clean(); ?>
<?php
	App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content, false);
	$html2pdf->Output('rekap_nilai_usm.pdf');
?>
