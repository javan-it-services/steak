<div class="frs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Status Pembayaran');?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>Tahun Ajaran</th>
	<th>Semester</th>
	<th>Keterangan</th>	
</tr>
</thead>
<?php foreach ($tstatusPembayarans as $tstatusPembayaran): ?>
<tbody>
	<tr>
		<td>
			<?php echo /*$html->link(*/$tstatusPembayaran['TtahunAjaran']['nama']/*, array('controller'=> 'tstatus_pembayarans', 'action'=>'view', $tstatusPembayaran['TtahunAjaran']['id']))*/; ?>
		</td>
		<td>
			<?php echo /*$html->link(*/$tstatusPembayaran['Tsemester']['NAME']/*, array('controller'=> 'tstatus_pembayarans', 'action'=>'view', $tstatusPembayaran['Tsemester']['ID']))*/; ?>
		</td>
		<td>
			<?php echo $tstatusPembayaran['TstatusPembayaran']['keterangan']; ?>
		</td>
		
	</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

