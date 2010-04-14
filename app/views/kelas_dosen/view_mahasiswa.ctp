<div class="users form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Mahasiswa');?></span></h2>


</p>
<table cellpadding="0" cellspacing="0" class="Design">
	<thead>
		<tr>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JENIS_KELAMIN</th>
			
			<th>JURUSAN</th>
			<th>ALAMAT</th>
			
			<th>TELEPON</th>
			
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($formstudis as $mahasiswa): ?>
		<tr>
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['NIM']; ?>
			</td>
			
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['NAMA']; ?>
			</td>
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['JENIS_KELAMIN']; ?>
			</td>
			
			
			
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['JURUSAN']; ?>
			</td>
			
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['ALAMAT']; ?>
			</td>
			
			
			<td>
				<?php echo $mahasiswa['FormStudi']['Tmahasiswa']['TELEPON']; ?>
			</td>			
			
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>
</div>
</div>


