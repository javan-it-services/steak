<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Pengumuman');?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Kelas','tkelase_id');?></th>
	<th><?php echo $paginator->sort('tanggal_mulai');?></th>
	<th><?php echo $paginator->sort('Tanggal Berakhir','TGL_BERAKHIR');?></th>
	<th><?php echo $paginator->sort('Pengumuman','PENGUMUMAN');?></th>	
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($tpengumumen as $tpengumuman):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tpengumuman['Tpengumuman']['id'];?>
		</td>		
		<td>
			<?php  echo $tpengumuman['Tkelase']['KD_KULIAH']."-".$tpengumuman['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $tpengumuman['Tpengumuman']['tanggal_mulai']; ?>
		</td>
		<td>
			<?php echo $tpengumuman['Tpengumuman']['TGL_BERAKHIR']; ?>
		</td>
		<td>
			<?php echo $tpengumuman['Tpengumuman']['PENGUMUMAN']; ?>
		</td>
		<td>
			<?php echo $tpengumuman['Tpengumuman']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tpengumuman['Tpengumuman']['id']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'editbydosen', $tpengumuman['Tpengumuman']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tpengumuman['Tpengumuman']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tpengumuman['Tpengumuman']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Pengumuman', true), array('action'=>'addbydosen',$id), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>