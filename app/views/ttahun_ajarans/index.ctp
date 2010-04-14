<div class="ttahun_ajarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tahun Ajaran');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/ttahunAjarans/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('nama', array('label'=>'Nama', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php echo $form->input('kodeAngkatan', array('label'=>'Kode Angkatan', 'div'=>'filter', 'fieldset'=>false))?>
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

	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('Kode Angkatan','kodeAngkatan');?></th>
	<th><?php echo $paginator->sort('Biaya','biaya');?></th>
	<th><?php echo $paginator->sort('Biaya Per SKS','persks');?></th>
	<th><?php echo $paginator->sort('Paket SKS','skspaket');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php foreach ($ttahunAjarans as $ttahunAjaran): ?>
<tbody>
	<tr>

		<td>
			<?php echo $ttahunAjaran['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $ttahunAjaran['TtahunAjaran']['kodeAngkatan']; ?>
		</td>
		<td>
			<?php echo $number->currency($ttahunAjaran['TtahunAjaran']['biaya'],'Rp ', rupiah()); ?>
		</td>
		<td>
			<?php echo $number->currency($ttahunAjaran['TtahunAjaran']['persks'],'Rp ', rupiah()); ?>
		</td>
		<td>
			<?php echo $ttahunAjaran['TtahunAjaran']['skspaket']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $ttahunAjaran['TtahunAjaran']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $ttahunAjaran['TtahunAjaran']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $ttahunAjaran['TtahunAjaran']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Tahun Ajaran', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
