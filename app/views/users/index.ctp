<?php $jenkel = array('L'=>'Laki-laki', 'P'=>'Perempuan');?>
<?php $paginator->options(array("url"=>$params));?>

<div class="tmahasiswas index grid_12 alpha" id='content'>
	<div class='box'>
		<h2 class="section_name"><span class="section_name_span"><?php __('Data User');?></span></h2>

		<?php echo $form->create('Filter', array('url'=>'/users/index', 'class'=>'filter'))?>
		<table class="filter">
			<tr>
				<td>
					<?php echo $form->input('USERNAME', array('label'=>'Username', 'div'=>'filter', 'fieldset'=>false))?>
				</td>
				<td>
					<?php echo $form->input('TYPE',array('label'=>'Type','empty'=>'SEMUA','options' => array('ADMIN'=>'ADMIN','MAHASISWA'=>'MAHASISWA','PEGAWAI'=>'PEGAWAI','DOSEN'=>'DOSEN'), 'div'=>'filter', 'fieldset'=>false));?>
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
			<th><?php echo $paginator->sort('Username','USERNAME');?></th>
			<th>Nama</th>
			<th><?php echo $paginator->sort('Status','ENABLED_USER');?></th>
			<th><?php echo $paginator->sort('Role','TYPE');?></th>
			<th class="actions"><?php __('Aksi');?></th>
		</tr>
		</thead>
		<?php
		$i = 0;
		foreach ($users as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $user['User']['USERNAME']; ?>
				</td>
				<td>
					<?php
					switch($user['User']['TYPE']){
						case ADMIN:
							echo '-';
							break;
						case MAHASISWA:
							echo $user['Tmahasiswa']['NAMA'];
							break;
						case DOSEN:
							echo $user['Tdosen']['NAMA_DOSEN'];
							break;
						case PEGAWAI:
							echo $user['Tpegawai']['NAMA_pegawai'];
							break;
						default:
							echo 'Undefined';
					}
					 ?>
				</td>
				<td align='center'>
					<?php echo $user['User']['ENABLED_USER']?"Enabled":"Disabled"; ?>
				</td>
				<td align='center'>
					<?php echo$user['User']['TYPE'] ?>
				</td>
				<td class="actions">
					<?php
					if($user['User']['ENABLED_USER']){
						echo $html->link(__('disable', true), array('action'=>'disable', $user['User']['id']));
					} else {
						echo $html->link(__('enable', true), array('action'=>'enable', $user['User']['id']));
					}
					?>
					<?php echo $html->link(__('Ubah Password', true), array('action'=>'edit', $user['User']['id'])); ?>
					<?php
						$url = $params;
						$url['action'] = 'delete';
						$url[] = $user['User']['id'];
					?>
					<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $user['User']['id']), array('title'=>'hapus'), sprintf(__('Apakah anda akan menghapus pengguna dengan id # %s?', true), $user['User']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah User', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
