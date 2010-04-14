<div class="tprograms index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Jenjang Studi');?></span></h2>

<table cellpadding="0" cellspacing="0" class = "Design">
<thead>
<tr>
	<th><?php echo $paginator->sort(__("Kode EPSBED", true),'code');?></th>
	<th><?php echo $paginator->sort(__('Nama', true),'value');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($refdetils as $ref):
?>

	<tr>

		<td>
			<?php echo $ref['Refdetil']['code']; ?>
		</td>
		<td>
			<?php echo $ref['Refdetil']['value']; ?>
		</td>
		<td class="actions">

			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $ref['Refdetil']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $ref['Refdetil']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $ref['Refdetil']['id']),false); ?>
		</td>
	</tr>

<?php endforeach; ?>
</tbody>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Jenjang Studi', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
