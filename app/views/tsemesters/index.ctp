<div class="tsemesters index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Semester');?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	
	<th><?php echo $paginator->sort('Nama','NAME');?></th>
	<th><?php echo $paginator->sort('Keterangan','DESC');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php foreach ($tsemesters as $tsemester): ?>
<tbody>
	<tr>
		
		<td>
			<?php echo $tsemester['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $tsemester['Tsemester']['DESC']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tsemester['Tsemester']['ID']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tsemester['Tsemester']['ID']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tsemester['Tsemester']['ID']),false); ?>
		</td>
	</tr>
</tbody>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Semester', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
