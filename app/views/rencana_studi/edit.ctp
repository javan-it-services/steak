<div class="rencana_studi index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Rencana Kuliah Mingguan');?></span></h2>
<?php echo $form->create('TsilabusMingguan', array("url"=>"/rencana_studi/edit", "type"=>"file"));?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->hidden('KD_KULIAH');
		echo $form->input('MINGGU_KE',array('label'=>'Minggu Ke-','options' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4')));
		echo $form->input('KEGIATAN', array('type'=>'textarea', 'label'=>'Kegiatan'));
		echo $form->input('TOPIK', array('type'=>'textarea', 'label'=>'Topik'));
		echo $form->input('SUBTOPIK_KASUS', array('type'=>'textarea', 'label'=>'Subtopik Kasus'));
		echo $form->input('TUGAS', array('type'=>'textarea', 'label'=>'Tugas'));
	?>
	<?php echo $form->end('Simpan');?>
	</fieldset>
	
	
	
	
	
<p>
</p>

<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar File Rencana Kuliah Mingguan');?></span></h2>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>ID</th>
	<th>NAMA</th>
	
	<th class="actions"><?php __('Aksi');?></th>	
</tr>
</thead>

<?php

foreach ($files as $file ): 

?>

<tbody>
	<tr>
		<td>
			<?php echo $file['Tfile']['id']; ?>
		</td>
		<td>
			<?php echo $file['Tfile']['nama_file']; ?>
		</td>	
		<td class="action">
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'editfile', $file['Tfile']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delfile', $file['Tfile']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $file['Tfile']['id']),false); ?>
			
		</td>
				
	</tr>
</tbody>
<?php endforeach; ?>
</table>

<div id="browse">
</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lihat Rencana Kuliah', true), array('action'=>'index')); ?> </li>
	</ul>
</div>
</div>
</div>