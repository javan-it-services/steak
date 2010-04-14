<div class="tangkatans index">
<h2><?php __('Angkatan');?></h2>
<div class="pagination">
	<div class="additional">
	<ul>
	<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Angkatan', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
	</ul>
	</div>
<p class="paging_info">
<?php	
	$paginator->options(array("url"=>$params));
?>
<?php
echo $paginator->counter(array(
'format' => __('Jumlah data ditemukan', true).': <strong>%count%</strong>'
));
?>
</p>
</div>
<div style="clear:both"></div>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('ANGKATAN');?></th>
	<th><?php echo $paginator->sort('SEM');?></th>
	<th><?php echo $paginator->sort('THN');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
foreach ($tangkatans as $tangkatan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tangkatan['Tangkatan']['ANGKATAN']; ?>
		</td>
		<td>
			<?php echo $tangkatan['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $tangkatan['Tangkatan']['THN']; ?>
		</td>
			<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tangkatan['Tangkatan']['ANGKATAN']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tangkatan['Tangkatan']['ANGKATAN']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tangkatan['Tangkatan']['ANGKATAN']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tangkatan['Tangkatan']['ANGKATAN']),false); ?>
		</td>
		
	</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="pagination">
<div class="paging">
	<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false), null, array('class'=>'disabled'));?>
 	<?php echo $paginator->numbers(array('separator'=>''));?>
	<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false), null, array('class'=>'disabled'));?>
</div>
<p class="paging_info">
<?php	
	$paginator->options(array("url"=>$params));
?>
<?php
echo $paginator->counter(array(
'format' => __('Halaman %page% dari %pages%', true)
));
?>
</p>
</div>
<div style="clear:both"></div>