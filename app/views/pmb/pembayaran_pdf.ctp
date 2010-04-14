<?php
$subtotal = array();
$total = 0;
?>
<?php ob_start(); ?>
<style type="text/css" media="all">
    table {
        width: 100%;
    }
    table th {
        background: #0965c1;
        color: #fff;
        font-weight: bold;
        padding: 8px;
    }
    table td {
        padding: 6px;
        border-bottom: 1px solid #cde;
    }
</style>
<h2>Penerimaan Uang PMB</h2>
<h4 style="font-weight:normal">
    <span >Tahun</span> <?php echo $gelombang['TtahunAjaran']['nama'] ?>
    &nbsp;&nbsp;&nbsp;&nbsp;Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?>
    <?php if($tanggal): ?>
    &nbsp;&nbsp;&nbsp;&nbsp;Tanggal <?php echo $tanggal ?>
    <?php endif; ?>
</h4>

<table cellpadding=0 cellspacing=0>
    <thead>
        <tr>
        <th>No</th>
        <th>Nomor Registrasi</th>
        <th>Nama Mahasiswa</th>
        <?php foreach($listPembayaran as $key => $pembayaran): ?>
        <?php $subtotal[$key] = 0 ?>
        <th><?php echo $pembayaran['Tperlengkapan']['jenis'] ?></th>
        <?php endforeach; ?>
        <th>Petugas</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach($listMahasiswa as $mhs): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?></td>
            <td><?php echo $mhs['TcalonMahasiswa']['NAMA'] ?></td>
            <?php foreach($mhs['Pembayaran'] as $key=>$pembayaran): ?>
            <td class='money'>
                <?php
                    if ($pembayaran['TperlengkapanTcalonMahasiswa']['tcalon_mahasiswa_id']) {
                        echo $number->currency($pembayaran['Tperlengkapan']['jumlah'],'Rp ', rupiah());
                        $subtotal[$key] += $pembayaran['Tperlengkapan']['jumlah'];
                    }
                ?>
            </td>
            <?php endforeach; ?>
            <td>&nbsp;</td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan='3' align="center">Jumlah</td>
            <?php foreach($listPembayaran as $key => $pembayaran): ?>
                <?php $total += $subtotal[$key] ; ?>
                <td><?php echo $number->currency($subtotal[$key], 'Rp ', rupiah()) ?></td>
            <?php endforeach; ?>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th align='right' colspan="<?php echo 4 + count($subtotal) ?>">
                Total Penerimaan: <?php echo $number->currency($total, "Rp ", rupiah()) ?>
            </th>
        </tr>
    </tfoot>
   </table>
<?php $content = ob_get_clean(); ?>
<?php
	App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content, false);
	$html2pdf->Output('rekap_pembayaran.pdf');
?>
