<?php ob_start(); ?>
<table width="100%" cellspacing="10px">
	<tr>
		<td colspan=2  align="center">
			<!--title-->
			<h2><?php __('Transkrip Akademik') ?></h2>
			<br />			
		</td>
	</tr>		
	<tr>
		<td colspan=2 >
			<table width="40%">
				<tr>
					<td ><?php __('NIM') ?></td>
					<td>: <?php echo $mahasiswa['Tmahasiswa']['NIM'] ?></td>					
				</tr>
				<tr>
					<td><?php __('Nama') ?></td>
					<td>: <?php echo $mahasiswa['Tmahasiswa']['NAMA'] ?></td>					
				</tr>
				<tr>
					<td><?php __('Dosen Wali') ?></td>
					<td>: <?php echo $mahasiswa['Tdosen']['NAMA_DOSEN'] ?></td>					
				</tr>
				<tr>
					<td><?php __('SKS Lulus/SKS Diambil') ?></td>
					<td>: <?php echo $sksLulus ."/".$sksTotal; ?></td>					
				</tr>
				<tr>
					<td><?php __('IPK') ?></td>
					<td>: <?php echo $ipk ?></td>					
				</tr>								
			</table>
			<br />
			<br />			
			
		</td>
	</tr>
	<?php for($sem=1;$sem<=8;$sem += 2): ?>
		<tr>
			<td width="45%" valign="top" >
				<!--kolom ganjil-->
				<h4><?php echo __('Semester', true).' '.($sem) ?></h4>				
				<table style="border:1px solid #555;width:400px;">
					<tr>
						<th><?php __('No') ?></th>
						<th><?php __('Kode Kuliah') ?></th>
						<th><div style="width:200px;"><?php __('Nama Kuliah') ?></div></th>
						<th><?php __('SKS') ?></th>
						<th><?php __('Nilai') ?></th>
					</tr>
					<?php $no=1; ?>
					<?php foreach($semester[$sem] as $s):  ?>
					<tr>
						<?php if(!empty($semester[$sem])): ?>
							<td><?php echo $no++ ?></td>
							<td><?php echo $s['kode_kuliah'] ?></td>
							<td><div style="width:200px;"><?php echo $s['nama_kuliah'] ?></div></td>
							<td><?php echo $s['sks'] ?></td>
							<td><?php echo $s['kode'] ?></td>
						<?php else: ?>
							<td colspan='5'><?php __('Tidak ada kuliah') ?></td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>					
				</table>
				<br />
			</td>
			<td width="45%" valign="top">
				<!--kolom genap-->
				<h4><?php echo __('Semester', true).' '.($sem+1) ?></h4>
				<table style="border:1px solid #555;width:400px;">
					<tr>
						<th><?php __('No') ?></th>
						<th><?php __('Kode Kuliah') ?></th>
						<th><div style="width:200px;"><?php __('Nama Kuliah') ?></div></th>
						<th><?php __('SKS') ?></th>
						<th><?php __('Nilai') ?></th>
					</tr>
					<?php $no=1; ?>
					<?php $sks=1; ?>
					<?php foreach($semester[$sem+1] as $s):
							$sks = $sks + $s['sks'];
					  ?>
					<tr>
						<?php if(!empty($semester[$sem])): ?>
							<td><?php echo $no++ ?></td>
							<td><?php echo $s['kode_kuliah'] ?></td>
							<td><div style="width:200px;"><?php echo $s['nama_kuliah'] ?></div></td>
							<td><?php echo $s['sks'] ?></td>
							<td><?php echo $s['kode'] ?></td>
						<?php else: ?>
							<td colspan='5'><?php __('Tidak ada kuliah') ?></td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>					
				</table>
				<br />
			</td>
		</tr>
	<?php endfor; ?>

</table>

<?php $content = ob_get_clean(); ?>
<?php
	App::import('Vendor', 'html2pdf', array('file'=>'html2pdf/html2pdf.class.php'));
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content, false);
	$html2pdf->Output('file.pdf');
?>
