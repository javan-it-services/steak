
    <table cellpadding="0" cellspacing="0" class='Design'>
   <thead>
<tr>
	<th><?php echo $paginator->sort('NIM','NIM');?></th>
	<th><?php echo $paginator->sort('Nama Lengkap','nama');?></th>
	<th><?php echo $paginator->sort('Jurusan','namaJurusan');?></th>
	<th><?php echo $paginator->sort('No Kwitansi','no_kwitansi');?></th>
	<th><?php echo $paginator->sort('Tanggal','tanggal');?></th>
	<th><?php echo $paginator->sort('bank','bank');?></th>
	<th><?php echo $paginator->sort('jumlah','jumlah');?></th>
	
	
</tr>
</thead>
   <tbody>
<?php
$i = 0;
foreach ($keuangans as $keuangan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	//pr($keuangan);
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['mahasiswa_id']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tmahasiswa']['NAMA']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tjurusan']['Refdetil']['value'] ."-".$keuangan['Tjurusan']['namaJurusan']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['no_kwitansi']; ?>
		</td>
		<td>
			<?php echo date('d-m-y',strtotime($keuangan['KeuanganTransaksi']['tanggal'])); ?>
		</td>
		<td>
			<?php echo $keuangan['Tbank']['nama']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['jumlah']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
    </table>
<div class="pagination">
<div class="paging">
<?php

?>

	<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false), null, array('class'=>'disabled'));?>
 	<?php echo $paginator->numbers(array('separator'=>''));?>
	<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false), null, array('class'=>'disabled'));?>
</div>
<p class="paging_info">

<?php
echo $paginator->counter(array(
'format' => __('Halaman %page% dari %pages%', true)
));
?>&nbsp; &nbsp;
<?php
echo $paginator->counter(array(
'format' => __('Jumlah data ditemukan', true).': <strong>%count%</strong>'
));
?>
</p>
</div>

