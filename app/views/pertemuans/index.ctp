<div class="pertemuans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Pertemuan');?></span></h2>
		<?php echo $form->create('Filter', array('url'=>'/pertemuans/search',"id"=>"IdFilter", "class" => "filter"))?>
			<?php echo $form->input('program_studi_id', array("type"=>"select","id"=>"PROGRAM_STUDI","options"=>$tprograms,'empty'=>'-pilih-',"label"=>"Jenjang Studi"));?>
			<?php echo $form->input('FAKULTAS', array("id"=>"FAKULTAS","type"=>"select","options"=>$tfakultases,'empty'=>'-pilih-',"label"=>"Fakultas"))?>
			<?php echo $ajax->observeForm('IdFilter', array ("url"=>'/pertemuans/getjurusan','update'=>'daftar_jurusan'))?>

			<div id="daftar_jurusan">
			<?php
				echo $form->input('JURUSAN', array("id"=>"KD_JURUSAN","type"=>"select","options"=>$tjurusans,'empty'=>'-pilih-',"label"=>"Jurusan"));
				echo $ajax -> observeField('KD_JURUSAN', array ("url"=>'/pertemuans/getmatkuls','update'=>'matkuls'));
			?>
			</div>
		</form>

			<?php echo $form->create('Pertemuan', array('url'=>'/pertemuans/index',"id"=>"IdFilter"))?>

 			<?php
			echo "<div id='matkuls'>";
			echo $form->input('KD_KULIAH', array("label"=>"Kode Kuliah","type"=>"select","id"=>"KD_KULIAH","options"=>$tmatakuliahs,'empty'=>'-pilih-'));
			echo "</div>";
			?>


			<div id="daftar_kelas">
			</div>

		<?php echo $form->end('Cari');?>

<table cellpadding="0" cellspacing="0" class='Design'>
<thead>

<tr>
<th><?php echo $paginator->sort('Pertemuan Ke','pertemuan_ke');?></th>
<th><?php echo $paginator->sort('Kode Kuliah','kelas_id');?></th>
	<th><?php echo $paginator->sort('kelas_id');?></th>
	<th><?php echo $paginator->sort('tanggal');?></th>
	<th><?php echo $paginator->sort('jam');?></th>
	<th><?php echo $paginator->sort('ruang_id');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($pertemuans as $pertemuan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
<td>
			<?php echo $pertemuan['Pertemuan']['pertemuan_ke']; ?>
		</td>
		<td>
			<?php echo $pertemuan['Tkelase']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $pertemuan['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $pertemuan['Pertemuan']['tanggal']; ?>
		</td>
		<td>
			<?php echo $pertemuan['Pertemuan']['jam']; ?>
		</td>
		<td>
			<?php echo $html->link($pertemuan['TruangKuliah']['RUANG_NAME'], array('controller'=> 'truang_kuliahs', 'action'=>'view', $pertemuan['TruangKuliah']['RUANG_ID'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $pertemuan['Pertemuan']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $pertemuan['Pertemuan']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $pertemuan['Pertemuan']['id']),false); ?>

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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Pertemuan', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>

<script type='text/javascript'>
	$('IdFilter').reset();
</script>
