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
 

