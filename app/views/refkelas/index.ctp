<?php
	$param['data'] = $refkelas;
	$param['primaryKey'] = "Refkela.id";
	$param['actions'] = array (
							__('Delete', true) => array('action'=>'deleteBulk.json')
						);
	$param['columns'] = array (
							COLUMN_SELECTOR,
							__('Nama', true) => "Refkela.nama",							
							COLUMN_ACTION
						);
?>

<div class="index grid_12 alpha " id="content">
	<div class="box">
		<?php echo $this->element('table', compact('param')) ?>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="special">
		<?php echo $html->link($html->image('add_16.png'). __('Tambah Jenis Kelas', true), array('action'=>'add'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?>
	</div>
</div>
