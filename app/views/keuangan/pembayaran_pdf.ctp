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
        <h2>Daftar Pembayaran</h2>
        <?php if((!empty($tanggal))&&(!empty($tjurusan_id))){ ?>
        	<h4> Tanggal : <?php echo $tanggal ?> Jurusan : <?php echo $listMahasiswa['0']['Keuangan']['0']['tjurusans']['namaJurusan'] ?> </h4>
        <?php }elseif(!empty($tanggal) && empty($tjurusan_id)){ ?>
        	<h4>Tanggal : <?php echo $tanggal ?> </h4>
        <?php //}elseif(empty($tanggal) && isset($tjurusan_id)){ ?>
        		<h4>Jurusan : <?php pr($listMahasiswa);
        		
        		//echo $listMahasiswa['0']['Keuangan']['0']['tjurusans']['namaJurusan'] ?>  </h4>
        <?php 
       // }else{ 
        
        }
        ?>
       
        <table cellpadding=0 cellspacing=0>
            <thead>
                <tr>
                <th style="width:2px">No</th>
                <th style="width:10px">NIM</th>
                <th style="width:15px">Nama Mahasiswa</th>
                <th style="width:20px">Jurusan</th>
                <th style="width:10px">No Kwitansi</th>
                <th style="width:10px">Tanggal</th>
                <th style="width:10px">Bank</th>
                <th style="width:10px">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php 
                foreach($listMahasiswa as $mhs): 
                
                ?>
                
                <?php $sum=0; ?>
                	<tr id="row<?php echo $mhs['KeuanganTransaksi']['mahasiswa_id'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['mahasiswa_id'] ?></td>
                    <td><?php echo $mhs['Keuangan']['0']['tmahasiswas']['NAMA'] ?></td>
                    <td><?php echo $mhs['Keuangan']['0']['tjurusans']['namaJurusan'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['no_kwitansi'] ?></td>
                    <td><?php echo $mhs['KeuanganTransaksi']['tanggal'] ?></td>
                    <td><?php echo $mhs['Keuangan']['0']['tbanks']['nama'] ?></td>
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
	$html2pdf->Output('rekap_nilai_usm.pdf');
?>
