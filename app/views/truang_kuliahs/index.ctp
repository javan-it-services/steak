<div class="truang_kuliahs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Ruang Kuliah');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/truangKuliahs/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('RUANG_NAME', array('label'=>'Nama Ruangan', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>





<table cellpadding="0" cellspacing="0" class = "Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('Nama Ruang','RUANG_NAME');?></th>	
	<th><?php echo $paginator->sort('Kapasitas','KAPASITAS');?></th>
	<th><?php echo $paginator->sort('Fasilitas','FASILITAS');?></th>
	<th><?php echo $paginator->sort('Keterangan','RUANG_DESC');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php foreach ($truangKuliahs as $truangKuliah): ?>
<tbody>
	<tr>
		<td>
			<?php echo $truangKuliah['TruangKuliah']['RUANG_NAME']; ?>
		</td>
		<td>
			<?php echo $truangKuliah['TruangKuliah']['KAPASITAS']; ?>
		</td>
		<td>
			<?php echo $truangKuliah['TruangKuliah']['FASILITAS']; ?>
		</td>
		<td>
			<?php echo $truangKuliah['TruangKuliah']['RUANG_DESC']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $truangKuliah['TruangKuliah']['RUANG_ID']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $truangKuliah['TruangKuliah']['RUANG_ID']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $truangKuliah['TruangKuliah']['RUANG_ID']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $truangKuliah['TruangKuliah']['RUANG_ID']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Ruang Kuliah', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
