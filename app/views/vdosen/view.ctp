<div class="tdosens view">
<h2><?php  __('Dosen Wali');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIP DOSEN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['NIP_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA DOSEN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AGAMA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['AGAMA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JENIS KELAMIN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['JENIS_KELAMIN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ALAMAT RUMAH'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['ALAMAT_RUMAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TELEPON'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tdosen['Tdosen']['TELEPON']; ?>
			&nbsp;
		</dd>
	</dl>
</div>




<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ubah Data Dosen', true), array('action'=>'edit', $tdosen['Tdosen']['NIP_DOSEN'])); ?> </li>
		<li><?php echo $html->link(__('Hapus Data Dosen', true), array('action'=>'delete', $tdosen['Tdosen']['NIP_DOSEN']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tdosen['Tdosen']['NIP_DOSEN'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Daftar Dosen', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Data Dosen', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
<script>
	function sembunyi(id){
		//alert("tes");
		document.getElementById(id).display='none';
		
	}
</script>
<table cellpadding="0" cellspacing="0" class="Design">
	<thead>
		<tr>
			<th>NIM</th>
			<th>NAMA</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tdosen['Tmahasiswa'] as $mahasiswa): ?>
		<tr onClick="sembunyi('daftar_nilai'+<?=$mahasiswa['NIM']?>)">
			<td>
				<?php echo $mahasiswa['NIM']; ?>
			</td>
			
			<td>
				<?php echo $mahasiswa['NAMA']; ?>
						
			</td>
			
			<td>	
				<?php echo $ajax -> link('View History',""	,array ("url"=>'/tdosen_walis/history_mahasiswa/'.$mahasiswa['NIM'],'update'=> "daftar_nilai".$mahasiswa['NIM']));?> |
				<?php echo $ajax -> link('View FRS',""	,array ("url"=>'/tdosen_walis/frs_mahasiswa/'.$mahasiswa['NIM'],'update'=> "daftar_nilai".$mahasiswa['NIM']));?> |
				<?php echo $ajax -> link('Setuju',""	,array ("url"=>'/tdosen_walis/setuju/'.$mahasiswa['NIM'],'update'=> "daftar_nilai".$mahasiswa['NIM']));?> |
				<?php echo $ajax -> link('Tolak',""	,array ("url"=>'/tdosen_walis/tolak/'.$mahasiswa['NIM'],'update'=> "daftar_nilai".$mahasiswa['NIM']));?> |
				<?php echo $ajax -> link('Isi Notes',""	,array ("url"=>'/tdosen_walis/isi_notes/'.$mahasiswa['NIM'],'update'=> "daftar_nilai".$mahasiswa['NIM']));?>
		</td>
			</td>	
		</tr>
		<tr>
			<td colspan="3">
				<div id=<?php echo "daftar_nilai".$mahasiswa['NIM'] ?>></div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
