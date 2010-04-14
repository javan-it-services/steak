
<div class="tdosenWalis index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Dosen Wali');?></span></h2>


<?php $jenkel = array('L'=>'Laki-laki', 'P'=>'Perempuan');?>

<?php echo $form->create('Filter', array('url'=>'/tdosen_walis/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIP_DOSEN', array('label'=>'Nip Dosen', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php echo $form->input('NAMA_DOSEN', array('label'=>'Nama Dosen', 'div'=>'filter', 'fieldset'=>false))?>			
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
	<th><?php echo $paginator->sort('NIP_DOSEN');?></th>
	<th><?php echo $paginator->sort('NAMA_DOSEN');?></th>
	
	<th><?php echo $paginator->sort('AGAMA');?></th>
	<th><?php echo $paginator->sort('JENIS_KELAMIN');?></th>
	<th><?php echo $paginator->sort('STATUS_DOSEN');?></th>
	
	
	<th><?php echo $paginator->sort('ALAMAT_RUMAH');?></th>
	<th><?php echo $paginator->sort('TELEPON');?></th>
	<th><?php echo $paginator->sort('SELULAR');?></th>
	<th><?php echo $paginator->sort('EMAIL');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($tdosens as $tdosen): ?>
	<tr>
		<td>
			<?php echo $tdosen['Tdosen']['NIP_DOSEN']; ?>
		</td>
		<td>
			<?php echo $tdosen['Tdosen']['NAMA_DOSEN']; ?>
		</td>
		
		<td>
			<?php echo $tdosen['Tagama']['AGAMA_NAME']; ?>
		</td>
		<td>
			<?php echo $tdosen['Tdosen']['JENIS_KELAMIN']; ?>
		</td>
		<td>
		
		<?php $img_file = ($tdosen['Tdosen']['JENIS_KELAMIN'])?$tdosen['Tdosen']['JENIS_KELAMIN'].'.png':'question_16.jpg' ?>
				<?php $title = (isset($jenkel[$tdosen['Tdosen']['JENIS_KELAMIN']]))?$jenkel[$tdosen['Tdosen']['JENIS_KELAMIN']]:__('tidak diketahui',true) ?>

				<?php echo $html->image($img_file, array('title'=>$title)); ?>
			
		</td>
				
		<td>
			<?php echo $tdosen['Tdosen']['ALAMAT_RUMAH']; ?>
		</td>
		<td>
			<?php echo $tdosen['Tdosen']['TELEPON']; ?>
		</td>
		<td>
			<?php echo $tdosen['Tdosen']['SELULAR']; ?>
		</td>
		
		<td>
			<?php echo $tdosen['Tdosen']['EMAIL']; ?>
		</td>
	
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view',  $tdosen['Tdosen']['NIP_DOSEN']), array('title'=>'Lihat data lengkap'),false,false); ?>
			
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
			<li><?php /*echo $html->link($html->image('add_16.png'). __('Tambah Berita', true), array('action'=>'add'), array('class'=>'tombol'), null, false);*/ ?></li>
		</ul>
	</div>
</div>