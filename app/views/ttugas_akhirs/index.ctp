<div class="ttugasAkhirs index grid_12 alpha " id="content">
<div class="box">
	<h2 class="section_name"><span class="section_name_span"><?php __('Data Tugas Akhir');?></span></h2>


<?php echo $form->create('Filter', array('url'=>'/ttugas_akhirs/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM1', array('label'=>'Masukan NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		
		<td>
			<?php echo $form->input('topik', array('label'=>'Topik', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
</tr>
	<tr>
		<td>
			<?php echo $form->input('pembimbing1', array('label'=>'Pembimbing', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
	</tr>
<tr>		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('NIM');?></th>
	
	<th><?php echo $paginator->sort('topik');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
//pr($ttugasAkhirs);
foreach ($ttugasAkhirs as $ttugasAkhir):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM1']; ?>
			<br>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM2']; ?>
			<br>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM3']; ?>
		</td>
		
		
		<td>
			<?php echo $ttugasAkhir['TtugasAkhir']['topik']; ?>
		</td>
		
		<td>
			<?php echo $ttugasAkhir['TtugasAkhir']['created']; ?>
		</td>
		<td>
			<?php echo $ttugasAkhir['TtugasAkhir']['updated']; ?>
		</td>
		<td class="actions">
				<?php echo $html->link($html->image('Download.gif'), array('action'=>'downloadfile', $ttugasAkhir['TtugasAkhir']['id']), array('title'=>'download file'),false,false); ?>
				<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $ttugasAkhir['TtugasAkhir']['id']), array('title'=>'Lihat data lengkap'),false,false); ?>
				<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $ttugasAkhir['TtugasAkhir']['id']), array('title'=>'edit'),false,false); ?>
				<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $ttugasAkhir['TtugasAkhir']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $ttugasAkhir['TtugasAkhir']['id']),false); ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="pagination">
			<div class="paging">
				<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
				<?php echo $paginator->numbers(array('separator'=>''));?>
				<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
			</div>
			<div class="clear"></div>
		</div>
	</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Tugas Akhir', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>