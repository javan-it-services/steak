<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Status Pembayaran');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/tstatus_pembayarans/index', 'class'=>'filter'))?>
<table class="filter">
	
	<tr>
		<td>
			<?php echo $form->input('TTAHUN_AJARAN_ID', array("type"=>"select","options"=>$ttahunajarans,'empty'=>'--Pilih Tahun--','label'=>'Tahun Ajaran', 'div'=>false, 'fieldset'=>false))?>
		</td>
		<td>
			<?php echo $form->input('TSEMESTER_ID', array("type"=>"select","options"=>$tsemesters,'empty'=>'--Pilih Semester--','label'=>'Semester', 'div'=>'filter', 'fieldset'=>false))?>			
		</td>
		<!--<td>
			<?php // echo $form->input('ANGKATAN', array("type"=>"select","options"=>$ttahunajarans,'empty'=>'--Pilih ','label'=>'Angkatan', 'div'=>'filter', 'fieldset'=>false))?>			
		</td>-->
		
	</tr>
	<tr>
		<td colspan='2'>
			<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>			
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
	
	<th><?php echo $paginator->sort('NIM');?></th>
	<th><?php echo $paginator->sort('tahun_ajaran');?></th>
	<th><?php echo $paginator->sort('semester');?></th>
	<th><?php echo $paginator->sort('keterangan');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($tstatusPembayarans as $tstatusPembayaran):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
<tbody>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $html->link($tstatusPembayaran['Tmahasiswa']['NIM'], array('controller'=> 'tmahasiswas', 'action'=>'view', $tstatusPembayaran['Tmahasiswa']['NIM'])); ?>
		</td>
		<td>
			<?php echo $html->link($tstatusPembayaran['TtahunAjaran']['nama'], array('controller'=> 'ttahun_ajarans', 'action'=>'view', $tstatusPembayaran['TtahunAjaran']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($tstatusPembayaran['Tsemester']['NAME'], array('controller'=> 'tsemesters', 'action'=>'view', $tstatusPembayaran['Tsemester']['ID'])); ?>
		</td>
		<td>
			<?php echo $tstatusPembayaran['TstatusPembayaran']['keterangan']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tstatusPembayaran['TstatusPembayaran']['id']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tstatusPembayaran['TstatusPembayaran']['id']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tstatusPembayaran['TstatusPembayaran']['id']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tstatusPembayaran['TstatusPembayaran']['id']),false); ?>
			<?php echo $html->link($html->image('add-file.png'), array('controller'=>'tcicilans', 'action'=>'add', $tstatusPembayaran['TstatusPembayaran']['id']), array('title'=>'Bayar Cicilan'),false,false); ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Pembayaran', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>