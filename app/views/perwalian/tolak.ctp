<h4>Form Rencana Studi Mahasiswa </h4>
<h5>Tahun Ajaran : <?php echo $form_studis['TtahunAjaran']['nama']; ?></h5>
<h5>Status : <?php echo $form_studis['FormStudi']['status']; ?></h5>
<b>NOTES : </b><?php echo $form_studis['FormStudi']['frs_notes']; ?>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>Kode KUliah</th>
	<th>Mata Kuliah</th>
	<th>SKS</th>
	
</tr>
</thead>
<tbody>

<?php 
$totalsks=0;
foreach ($form_studis['KartuStudi'] as $studi): ?>
<?php if(!empty($studi['Tkelase']['Tmatakuliah'])):?>
	<tr>
		<td>
			<?php echo $studi['Tkelase']['Tmatakuliah']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $studi['Tkelase']['Tmatakuliah']['NAMA_KULIAH']; ?>
		</td>
		<td>
			<?php echo $studi['Tkelase']['Tmatakuliah']['SKS']; 
			$totalsks+=$studi['Tkelase']['Tmatakuliah']['SKS']
			?>
			
		</td>	
	</tr>
	<?php endif?>
<?php endforeach; ?>
<tr>
	<td colspan="2">
		Jumlah SKS
	</td>
	<td>
		<?php echo $totalsks; ?>
	</td>
</tr>
</tbody>	

</table>
