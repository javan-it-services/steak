<div class="tjurusans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Jurusan');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/tjurusans/index', 'class'=>'filter'))?>
<table class="filter" style='width:50%'>
	<tr>
		<td>
			<?php echo $form->input('namaJurusan', array('label'=>'Nama', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
			<?php //echo $form->input('descJurusan', array('label'=>'Deskripsi', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
	</tr>
</table>
</form>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('Kode Jurusan','kodejurusan');?></th>
	<th><?php echo $paginator->sort('Nama','namaJurusan');?></th>


	<th><?php echo $paginator->sort('Jenjang Studi','program_studi_id');?></th>

	<th><?php echo $paginator->sort('Fakultas','fakultas');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($tjurusans as $tjurusan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tjurusan['Tjurusan']['kodejurusan']; ?>
		</td>
		<td>
			<?php echo $tjurusan['Tjurusan']['namaJurusan']; ?>
		</td>

		<td>
			<?php echo $tjurusan['JenjangStudi']['value']; ?>
		</td>
		<td>
			<?php echo $tjurusan['Tfakultase']['kode']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tjurusan['Tjurusan']['kodejurusan']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tjurusan['Tjurusan']['kodejurusan']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tjurusan['Tjurusan']['kodejurusan']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tjurusan['Tjurusan']['namaJurusan']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Jurusan', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
