<div class="mahasiswa index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Transkrip Akademik');?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mahasiswa['Tmahasiswa']['NIM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mahasiswa['Tmahasiswa']['NAMA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dosen Wali'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mahasiswa['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS Lulus/SKS Diambil'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sksLulus ."/".$sksTotal; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IPK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ipk; ?>
			&nbsp;
		</dd>		
	</dl>
<p>
<table class="Design">
<?php for($sem=1; $sem<=8; $sem++): ?>
		
	<thead>
		<tr>
			<th colspan='6'><?php echo __('Semester', true). " $sem" ?></th>
		</tr>
	</thead>
	<?php if(!empty($semester[$sem])):	 ?>
	
		<tr>
			<th><?php __('No') ?></th>
			
			<th><?php __('Nama Kuliah') ?></th>
			<th><?php __('SKS') ?></th>
			<th><?php __('Th. Kur.') ?></th>
			<th><?php __('Nilai') ?></th>
			<th><?php __('Status') ?></th>
		</tr>

		<?php $no=1; ?>
		<?php foreach($semester[$sem] as $s):  ?>
			<tr>
				<?php if(!empty($semester[$sem])): ?>
					<td><?php echo $no++ ?></td>
					
					<td><?php echo $s['nama_kuliah'] ?></td>
					<td><?php echo $s['sks'] ?></td>
					<td><?php echo $s['tahun_kur'] ?></td>
					<td><?php echo $s['kode'] ?></td>
					<td><?php echo $s['status_lulus'] ?></td>
				<?php else: ?>
					<td colspan='6'><?php __('Tidak ada kuliah') ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan='6'><?php __('Tidak ada kuliah diambil') ?></td></tr>
	<?php endif; ?>
<?php endfor; ?>
</table>
</div>
</div>