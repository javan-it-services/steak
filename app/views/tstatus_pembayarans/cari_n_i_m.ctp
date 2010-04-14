<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Cari Status Pembayaran');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/tstatus_pembayarans/cariNIM', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>
<?php
	
	if(isset($error)){
		echo "<p>$error</p>";
	}
	if(isset($payments)){		
		if(!empty($payments)):?>
		
			<table class="Design">
				<thead>
					<tr>
						<th>Tahun Ajaran</th>
						<th>Semester</th>
						<th>Keterangan</th>
						<th class="actions"><?php __('Aksi');?></th>
					</tr>
				</thead>
				<?php foreach($payments as $row):
					
				?>
				<tr>
					<td><?php echo $row['TtahunAjaran']['nama']?></td>
					<td><?php echo $row['Tsemester']['NAME']?></td>
					<td><?php echo $row['TstatusPembayaran']['keterangan']?></td>
					<?php
					if ($row['TstatusPembayaran']['keterangan']=='Tunai'){
						
					}else{
						
					
					?>
					<td class="actions">
						<?php echo $html->link($html->image('add-file.png'), array('controller'=>'tcicilans', 'action'=>'add', $row['TstatusPembayaran']['id']), array('title'=>'Bayar Cicilan'),false,false); ?>
					</td>
					<? } ?>
				</tr>
				<?php endforeach;?>
			</table>
		<?php
		endif;
		/*echo $html->link("Tambah Pembayaran","/tstatus_pembayarans/add/$nim");*/
	}
?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>