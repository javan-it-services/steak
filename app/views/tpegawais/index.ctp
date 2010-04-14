<?php $jenkel = array('L'=>'Laki-laki', 'P'=>'Perempuan');?>
<?php $paginator->options(array("url"=>$params));?>

<div class="tpegawais index grid_12 alpha" id="content">
	<div class='box'>
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Pegawai');?></span></h2>

		<?php echo $form->create('Filter', array('url'=>'/tpegawais/index', 'class'=>'filter'))?>
		<table class="filter">
			<tr>
				<td>
					<?php echo $form->input('NIP_pegawai', array('label'=>'Nip', 'div'=>'filter', 'fieldset'=>false))?>
				</td>
				<td>
					<?php echo $form->input('NAMA_pegawai', array('label'=>'Nama', 'div'=>'filter', 'fieldset'=>false))?>
				</td>
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
			<th>&nbsp;</th>
			<th><?php echo $paginator->sort('NIP','NIP_pegawai');?></th>
			<th><?php echo $paginator->sort('Nama','NAMA_pegawai');?></th>
			<th><?php echo $paginator->sort('Agama','AGAMA');?></th>
			<th><?php echo $paginator->sort('Email','EMAIL');?></th>
			<th class="actions"><?php __('Aksi');?></th>
		</tr>
		<thead>
		<tbody>
		<?php
		$i = 0;
		foreach ($tpegawais as $tpegawai):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class;?>>
				<td>

				<?php $img_file = ($tpegawai['Tpegawai']['JENIS_KELAMIN'])?$tpegawai['Tpegawai']['JENIS_KELAMIN'].'.png':'question_16.jpg' ?>
						<?php $title = (isset($jenkel[$tpegawai['Tpegawai']['JENIS_KELAMIN']]))?$jenkel[$tpegawai['Tpegawai']['JENIS_KELAMIN']]:__('tidak diketahui',true) ?>

						<?php echo $html->image($img_file, array('title'=>$title)); ?>

				</td>
				<td>
					<?php echo $tpegawai['Tpegawai']['NIP_pegawai']; ?>
				</td>
				<td>
					<?php echo $tpegawai['Tpegawai']['NAMA_pegawai']; ?>
				</td>

				<td>
					<?php echo $tpegawai['Tagama']['AGAMA_NAME']; ?>
				</td>
				<td>
					<?php echo $tpegawai['Tpegawai']['EMAIL']; ?>
				</td>
				<td class="actions">

					<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tpegawai['Tpegawai']['NIP_pegawai']), array('title'=>'Lihat data lengkap'),false,false); ?>
						<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tpegawai['Tpegawai']['NIP_pegawai']), array('title'=>'edit'),false,false); ?>
						<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tpegawai['Tpegawai']['NIP_pegawai']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tpegawai['Tpegawai']['NIP_pegawai']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Pegawai', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
