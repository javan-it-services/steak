<h2>Daftar Form Studi Mahasiswa</h2>

<table class="Design">
<thead>
	<tr>
		<th>Tahun Ajaran</th>
		<th>Semester</th>
		<th>IPK</th>
		<th>Aksi</th>
	</tr>
</thead>
<?php if(!empty($formstudis)):?>
<?php foreach($formstudis as $row):?>
	<tr>
		<td><?php echo $row['TtahunAjaran']['nama']?></td>
		<td><?php echo $row['Tsemester']['NAME']?></td>
		<td>-</td>
		<td>
			<?php 
				if($row['FormStudi']['status']=="Setuju"){
					//echo $html->link(__('Lihat Nilai', true), array('action'=>'lihatnilai/'.$row['FormStudi']['id']));
					echo $html->link($html->image('page_16.png'), array('action'=>'lihatnilai/'.$row['FormStudi']['id']), array('title'=>'Lihat data lengkap'),false,false); 
					
				}
				else
					echo "Belum Ada Nilai";
			?>
		</td>
	</tr>
<?php endforeach;?>
<?php endif;?>
</table>