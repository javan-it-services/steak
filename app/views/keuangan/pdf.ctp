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
        <h2>Rekap Pembayaran Mahasiswa</h2>
        <h4>Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?> Tahun <?php echo $gelombang['TtahunAjaran']['nama'] ?></h4>
        <table cellpadding=0 cellspacing=0>
            <thead>
                <tr>
                <th style="width:30px">No</th>
                <th style="width:120px">NIM</th>
                <th style="width:120px">Nama Mahasiswa</th>
                <th style="width:80px">Jurusan</th>
                <th style="width:80px">No Kwitansi</th>
                <th style="width:80px">Tanggal</th>
                <th style="width:80px">Bank</th>
                <th style="width:80px">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($listMahasiswa as $mhs): ?>
                <?php $sum=0; ?>
                <tr id="row<?php echo $mhs['KeuanganTransaksi']['NIM'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['T2calonMahasiswa']['NAMA'] ?></td>
                    <td><?php echo $mhs['Tjurusan']['namaJurusan'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['no_kwitansi'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['tanggal'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['bank'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['jumlah'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php $content = ob_get_clean(); ?>
<?php
	App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content, false);
	$html2pdf->Output('rekap_pembayaran.pdf');
?>
