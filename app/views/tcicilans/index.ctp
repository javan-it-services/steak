<div class="tcicilans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Cicilan');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/tcicilans/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Tahun Ajaran");
				echo $form->input('tahun_ajaran_id',array('options'=>$tahunajarans,'empty'=>'--Pilih Tahun--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>
		</td>
		<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Semester");
				echo $form->input('semester',array('options'=>$tsemesters,'empty'=>'--Pilih Semester--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>

		</td>
	</tr>
	<tr>
		<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Jurusan");
				echo $form->input('TJURUSAN_ID',array('options'=>$tjurusans,'empty'=>'--Pilih Jurusan--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>

		</td>
			<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Fakultas");
				echo $form->input('TFAKULTAS_ID',array('options'=>$tfakultases,'empty'=>'--Pilih Fakultas--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>

		</td>
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('NIM');?></th>
	<th><?php echo $paginator->sort('tahun_ajaran_id');?></th>
	<th><?php echo $paginator->sort('semester');?></th>
	<th><?php echo $paginator->sort('tanggal');?></th>
	<th><?php echo $paginator->sort('cicilan_ke');?></th>
	<th><?php echo $paginator->sort('jumlah_pembayaran');?></th>
	<th><?php echo $paginator->sort('sisa');?></th>
	<th><?php echo $paginator->sort('status');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>

<?php



foreach ($tcicilans as $tcicilan):

?>
	<tr>
		<td>
			<?php echo $tcicilan['Tcicilan']['id']; ?>
		</td>
		<td>
			<?php echo $tcicilan['TstatusPembayaran']['NIM']; ?>
		</td>
		<td>
			<?php echo $tcicilan['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['semester']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['tanggal']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['cicilan_ke']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['jumlah_pembayaran']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['sisa']; ?>
		</td>
		<td>
			<?php echo $tcicilan['Tcicilan']['status']; ?>
		</td>
		<td class="actions">
			
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tcicilan['Tcicilan']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tcicilan['Tcicilan']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tcicilan['Tcicilan']['id']),false); ?>
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
			
		</ul>
	</div>
</div>