<?php
	$param['data'] = $Tbanks;
	$param['primaryKey'] = "Tbank.id";
	$param['actions'] = array (
							__('Delete', true) => array('action'=>'deleteBulk.json')
						);
	$param['columns'] = array (
							COLUMN_SELECTOR,
							__('Nama', true) => "Tbank.nama",
							__('Deskripsi', true) => "Tbank.description",
							COLUMN_ACTION
						);
?>

<div class="index grid_12 alpha " id="content">
	<div class="box">
		<?php echo $this->element('table', compact('param')) ?>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Bank', true), array('action'=>'add'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?></li>
		</ul>
	</div>
</div>
