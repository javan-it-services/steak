<div class="tberitas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Berita');?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Judul','JUDUL_BERITA');?></th>
	
	<th><?php echo $paginator->sort('Pembuat','USER_ENTRY_BERITA');?></th>	
	<th><?php echo $paginator->sort('Mulai Valid','START_VALID_BERITA');?></th>
	<th><?php echo $paginator->sort('Akhir Valid','END_VALID_BERITA');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($tberitas as $tberita):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tberita['Tberita']['id']; ?>
		</td>
		<td>
			<?php echo $tberita['Tberita']['JUDUL_BERITA']; ?>
		</td>
		
		<td>
			<?php echo $tberita['Tberita']['USER_ENTRY_BERITA']; ?>
		</td>
		<td>
			<?php echo $tberita['Tberita']['START_VALID_BERITA']; ?>
		</td>
		<td>
			<?php echo $tberita['Tberita']['END_VALID_BERITA']; ?>
		</td>
		<td>
			<?php echo $tberita['Tberita']['created']; ?>
		</td>
		<td class="actions">
			
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tberita['Tberita']['id']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tberita['Tberita']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tberita['Tberita']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tberita['Tberita']['id']),false); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="pagination">
			<div class="paging">
				<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
				<?php echo $paginator->numbers(array('separator'=>''));?>
				<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Berita', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>