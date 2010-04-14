<? //pr($mahasiswas); ?>
<div class="perwalians index grid_12 alpha" id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Perwalian');?></span></h2>
<?php
echo $form->create(null,array("action"=>"index"));
echo $form->input('Perwalian.angkatan');
echo $form->end("Submit");
?>

<?php if(!empty($mahasiswas)):?>
<table cellpadding="0" cellspacing="0" class="Design">
	<thead>
		<tr>
			<th>NIM</th>
			<th>NAMA</th>
			<th>Status FRS</th>
					
		</tr>
	</thead>
	<tbody>
		<?php foreach ($mahasiswas as $mahasiswa): ?>
		<tr>
			<td>
				<?php echo $mahasiswa['Tmahasiswa']['NIM']; ?>
			</td>
			
			<td>
				<?php echo $mahasiswa['Tmahasiswa']['NAMA']; ?>
			</td>
			<td>
				<?php 
					if(!empty($mahasiswa['FormStudi'][0]['status'])){
						 echo $mahasiswa['FormStudi'][0]['status'];
					}else{
						echo "Belum mengisi FRS";	
					}
				?>
			</td>				
				
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>
<?php endif;?>