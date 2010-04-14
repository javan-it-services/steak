<div class="rencana_studi index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Silabus Mingguan Kode Matakuliah '.$k);?></span></h2>
<p>
</p>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>KODE KULIAH</th>
	<th>MINGGU KE</th>
	<th>KEGIATAN</th>
	<th>TOPIK</th>
	<th>SUBTOPIK KASUS</th>
	<th>TUGAS</th>
	<th>FILE</th>
	<th class="actions"><?php __('Aksi');?></th>	
</tr>
</thead>
<tbody>
<?php
//$posisi = -1;
foreach ($rencanastudis as $rencanastudi ): 
//$posisi = $posisi + 1;
//$this->set(compact('posisi'));

?>


	<tr>
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['MINGGU_KE']; ?>
		</td>	
		
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['KEGIATAN']; ?>
		</td>
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['TOPIK']; ?>
		</td>		
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['SUBTOPIK_KASUS']; ?>
		</td>
		<td>
			<?php echo $rencanastudi['TsilabusMingguan']['TUGAS']; ?>
		</td>
		<td>
			<?php
				//$pos=-1;
				$files=$rencanastudi['Tfile'];
				foreach ($files as $file ): 
				//$pos = $pos + 1;
				$this->set(compact("pos", "files"));
				
				echo '<a href="../../files/'.$file['download_file'].'">'.$file['nama_file'].'</a>';
				echo "<br>";
			 	endforeach;
			 	
			 ?>	
		</td>
		<td class="action">
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $rencanastudi['TsilabusMingguan']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $rencanastudi['TsilabusMingguan']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $rencanastudi['TsilabusMingguan']['id']),false); ?>
			<?php echo $html->link($html->image('add_16.png'), array('action'=>'addfile', $rencanastudi['TsilabusMingguan']['id']), array('title'=>'Tambah File Silabus'),false,false); ?>
		</td>
				
	</tr>
<?php endforeach; ?>
</tbody>

</table>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lihat Rencana Kuliah', true), array('action'=>'index')); ?> </li>
	</ul>
</div>
