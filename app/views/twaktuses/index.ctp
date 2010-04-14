<div class="twaktuses index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Waktu Kuliah');?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	
	<th><?php echo $paginator->sort('waktu mulai','WAKTU_BEGIN');?></th>
	<th><?php echo $paginator->sort('waktu selesai','WAKTU_END');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($twaktuses as $twaktus):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $twaktus['Twaktus']['WAKTU_BEGIN']; ?>
		</td>
		<td>
			<?php echo $twaktus['Twaktus']['WAKTU_END']; ?>
		</td>
		<td class="actions">
			
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $twaktus['Twaktus']['WAKTU_ID']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $twaktus['Twaktus']['WAKTU_ID']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $twaktus['Twaktus']['WAKTU_ID']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Waktu Kuliah', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
