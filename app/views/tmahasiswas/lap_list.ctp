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
        <h2>CETAK KARTU STUDI MAHASISWA</h2>
        <h4>Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?> Tahun <?php echo $gelombang['TtahunAjaran']['nama'] ?></h4>
        <table cellpadding=0 cellspacing=0>
            <thead>
                <tr>
                <th style="width:30px">No</th>
                <th style="width:120px">Kode Kuliah</th>
                <th style="width:120px">Nama Kuliah</th>
                <th style="width:80px">SKS</th>
                 <th style="width:80px">Sifat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($MataKuliah as $mhs):
                //pr($MataKuliah);
                
                ?>
                <?php $sum=0; ?>
                <tr id="row<?php echo $mhs['Tmatakuliah']['KD_KULIAH'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['Tmatakuliah']['KD_KULIAH'] ?></td>
                    <td><?php echo $mhs['Tmatakuliah']['NAMA_KULIAH'] ?></td>
                    <td><?php echo $mhs['Tmatakuliah']['SKS'] ?></td>
                    <td><?php echo $mhs['Tmatakuliah']['SIFAT'] ?></td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php $content = ob_get_clean(); ?>
<?php
	App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content, false);
	$html2pdf->Output('cetak_ksm.pdf');
?>
