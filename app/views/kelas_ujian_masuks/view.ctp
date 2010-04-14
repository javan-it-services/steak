<div class="kelasUjianMasuks view grid_12 alpha" id="content">
<div class="box">

<h2 class="section_name"><span class="section_name_span"><?php  __('Kelas Ujian Masuk');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kelas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelasUjianMasuk['KelasUjianMasuk']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gelombang'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelasUjianMasuk['GelombangPendaftaran']['nomor']; ?>
			Tahun <?php echo $kelasUjianMasuk['GelombangPendaftaran']['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenis Test'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjianMasuk['JenisNilaiPendaftaran']['name'], array('controller' => 'jenis_nilai_pendaftarans', 'action' => 'view', $kelasUjianMasuk['JenisNilaiPendaftaran']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ruang'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelasUjianMasuk['TruangKuliah']['RUANG_NAME']; ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h2 class="section_name"><span class="section_name_span"><?php __('Peserta Test');?></span></h2>
	<?php if (!empty($kelasUjianMasuk['TcalonMahasiswa'])):?>
	<table cellpadding = "0" cellspacing = "0" class="Design">
	<tr>
		<th>No</th>
		<th><?php __('NO REGISTRASI'); ?></th>
		<th><?php __('NAMA'); ?></th>
		
		<th class="actions"><?php __('Actions');?></th>
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
			<td><?php echo $i?></td>
			<td><?php echo $tcalonMahasiswa['NO_REGISTRASI'];?></td>
			<td><?php echo $tcalonMahasiswa['NAMA'];?></td>
			<td class="actions">
					<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete', $tcalonMahasiswa['NAMA']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tcalonMahasiswa['NAMA']),false); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div>
</div>

<div class="actions grid_4 omega" id="sidebar">
	<div class="special">
		<?php echo $html->link($html->image('pdf.png'). __('Ekspor ke PDF', true), array('action'=>'cetak', $kelasUjianMasuk['KelasUjianMasuk']['id']), array('class'=>'tombol'), null, false); ?>
	</div>
</div>


