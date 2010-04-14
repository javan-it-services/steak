<?php
	$param['data'] = $tagamas;
	$param['primaryKey'] = "Tagama.AGAMA_ID";
	$param['actions'] = array (
							__('Delete', true) => array('action'=>'deleteBulk.json')
						);
	$param['columns'] = array (
							COLUMN_SELECTOR,
							__('Nama', true) => "Tagama.AGAMA_NAME",
							__('Keterangan', true) => "Tagama.AGAMA_DESC",
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Agama', true), array('action'=>'add'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?></li>
		</ul>
	</div>
</div>
