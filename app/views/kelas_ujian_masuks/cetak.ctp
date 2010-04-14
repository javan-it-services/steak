<?php ob_start();?>
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

<h2 class="section_name"><span class="section_name_span"><?php  __('Kelas Ujian Masuk');?></span></h2>
<table>
    <?php $i = 0; $class = ' class="altrow"';?>
    
    <tr>
        <th <?php if ($i % 2 == 0) echo $class;?>><?php __('Kelas'); ?></th>
        <td <?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $kelasUjianMasuk['KelasUjianMasuk']['nama']; ?>
            &nbsp;
        </td>
    </tr>
    
    <tr>
        <th <?php if ($i % 2 == 0) echo $class;?>><?php __('Gelombang'); ?></th>
        <td <?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $kelasUjianMasuk['GelombangPendaftaran']['nomor']; ?>
            Tahun <?php echo $kelasUjianMasuk['GelombangPendaftaran']['TtahunAjaran']['nama']; ?>
            &nbsp;
        </td>
    </tr>
    
    <tr>
        <th <?php if ($i % 2 == 0) echo $class;?>><?php __('Jenis Test'); ?></th>
        <td <?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $html->link($kelasUjianMasuk['JenisNilaiPendaftaran']['name'], array('controller' => 'jenis_nilai_pendaftarans', 'action' => 'view', $kelasUjianMasuk['JenisNilaiPendaftaran']['id'])); ?>
            &nbsp;
        </td>
    </tr>
    
    <tr>
        <th <?php if ($i % 2 == 0) echo $class;?>><?php __('Ruang'); ?></th>
        <td <?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $kelasUjianMasuk['TruangKuliah']['RUANG_NAME']; ?>
            &nbsp;
        </td>
    </tr>
</table>


<div class="related">
	<h2 class="section_name"><span class="section_name_span"><?php __('Peserta Test');?></span></h2>
	<?php if (!empty($kelasUjianMasuk['TcalonMahasiswa'])):?>
	<table cellpadding = "0" cellspacing = "0" class="Design">
	<tr>
		<th>No</th>
		<th><?php __('NO REGISTRASI'); ?></th>
		<th><?php __('NAMA'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kelasUjianMasuk['TcalonMahasiswa'] as $tcalonMahasiswa):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $i ?></td>
			<td><?php echo $tcalonMahasiswa['NO_REGISTRASI'];?></td>
			<td><?php echo $tcalonMahasiswa['NAMA'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>


<?php
$content = ob_get_clean();

App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content, false);
$html2pdf->Output('kelas_ujian_masuk.pdf');
?>
