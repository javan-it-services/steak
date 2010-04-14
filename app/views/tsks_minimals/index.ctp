<?php
	$param['data'] = $Tsks_minimals;
	$param['primaryKey'] = "TsksMinimal.id";
	$param['actions'] = array (
							__('Delete', true) => array('action'=>'deleteBulk.json')
						);
	$param['columns'] = array (
							COLUMN_SELECTOR,
							__('Program', true) => "Refdetil.value",
							__('Jurusan', true) => "Tjurusan.namaJurusan",
							__('Jumlah Sks', true) => "TsksMinimal.jumlah",
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
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Jurusan dan Sks', true), array('action'=>'add'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?></li>
		</ul>
	</div>
</div>
