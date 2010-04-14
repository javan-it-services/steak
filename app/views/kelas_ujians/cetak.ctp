<?php ob_start();?>
<style type="text/css" media="all">
    table {
        withh: 100%;
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

<h2 class="section_name"><span class="section_name_span"><?php  __('Kelas Ujian');?></span></h2>
	<table><?php $i = 0; $class = ' class="altrow"';?>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $kelasUjian['KelasUjian']['id']; ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Ruang Kuliah'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['TruangKuliah']['RUANG_NAME'], array('controller' => 'truang_kuliahs', 'action' => 'view', $kelasUjian['TruangKuliah']['RUANG_ID'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Matakuliah'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['Tmatakuliah']['NAMA_KULIAH'], array('controller' => 'tmatakuliahs', 'action' => 'view', $kelasUjian['Tmatakuliah']['KD_KULIAH'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Semester'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['Tsemester']['NAME'], array('controller' => 'tsemesters', 'action' => 'view', $kelasUjian['Tsemester']['ID'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['TtahunAjaran']['nama'], array('controller' => 'ttahun_ajarans', 'action' => 'view', $kelasUjian['TtahunAjaran']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenjang'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['Jenjang']['id'], array('controller' => 'refdetils', 'action' => 'view', $kelasUjian['Jenjang']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakultas'); ?></th>
			<td<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($kelasUjian['Tfakultas']['nama'], array('controller' => 'tfakultases', 'action' => 'view', $kelasUjian['Tfakultas']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
		<th<?php if ($i % 2 == 0) echo $class;?>><?php __('Jurusan'); ?></th>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Tjurusan']['namaJurusan'], array('controller' => 'tjurusans', 'action' => 'view', $kelasUjian['Tjurusan']['kodejurusan'])); ?>
			&nbsp;
		</td>
		</tr>
	</table>

<br/><br/>
<div class="related">
	<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Peserta');?></span></h2>
	<?php if (!empty($kelasUjian['Tmahasiswa'])):?>
	<table cellpadding = "0" cellspacing = "0" class="Design">
	<tr>
		<th>No</th>
		<th><?php __('NIM'); ?></th>
		<th><?php __('NAMA'); ?></th>
		<th><?php __('Present'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kelasUjian['Absen'] as $tmahasiswa):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr <?php echo $class;?>>
			<td><?php echo $i?></td>
			<td><?php echo $tmahasiswa['Tmahasiswa']['NIM'];?></td>
			<td><?php echo $tmahasiswa['Tmahasiswa']['NAMA'];?></td>
			<td>&nbsp;</td>
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
$html2pdf->Output('kelas_ujian.pdf');
?>
