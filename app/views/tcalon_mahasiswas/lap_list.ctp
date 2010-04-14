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
        <h2>LAPORAN PENERIMAAN MAHASISWA BARU</h2>
        <h4>Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?> Tahun <?php echo $gelombang['TtahunAjaran']['nama'] ?></h4>
        <table cellpadding=0 cellspacing=0>
            <thead>
                <tr>
                <th style="width:2px">No</th>
                <th style="width:10px">Nomor Registrasi</th>
                <th style="width:15px">Nama Mahasiswa</th>
                <th style="width:15px">Tempat Tgl Lahir</th>
				<th style="width:10px">Kenal STMIK</th>
				<th style="width:7px">Status</th>
                 <th style="width:10px">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($listMahasiswa as $mhs):
                
                ?>
                <?php $sum=0; ?>
                <tr id="row<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NAMA'] ?></td>
                    	<td>
			<?php echo $mhs['TcalonMahasiswa']['TEMPAT_LAHIR'].", ". date('d-m-y',strtotime($mhs['TcalonMahasiswa']['TGL_LAHIR'])); ?>
		</td>
		<td>
			<?php echo $mhs['TcalonMahasiswa']['kenal_stmik']; ?>
		</td>
		
		
                    <td><?php
                    if($mhs['TcalonMahasiswa']['status']){
                    echo "Diterima";
                    }else{
                    echo "Tidak diterima";    
                    }
                    ?>
                    </td>
                    <td><?php
                    if($mhs['TcalonMahasiswa']['status']){
                    echo $mhs['lap_list']['0']['refdetil']['value']." - ". $mhs['lap_list']['0']['tjurusans']['namaJurusan'];
                        
                    }else{
                        echo "--";
                    }
                    
                    ?>
                    </td>
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
