<?php
	$param['data'] = $tkabupatens;
	$param['primaryKey'] = "Tkabupaten.KD_KAB";
	$param['actions'] = array (
							__('Delete', true) => array('action'=>'deleteBulk.json')
						);
	$param['columns'] = array (
							COLUMN_SELECTOR,
							__('Kode', true) => "Tkabupaten.KD_KAB",
							__('Nama', true) => "Tkabupaten.KAB_NAME",
							__('Propinsi', true) => "Tpropinsi.PROP_NAME",
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
		<?php echo $html->link($html->image('add_24.png'). __('Tambah Kabupaten', true), array('action'=>'add'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?>
	</div>
	<div class="line"></div>
	<!--<h3>Kategori</h3>-->
	<div class="sidebox">
		<div class="category">
			<div class="title expand">Filter berdasar propinsi</div>
			<ul class="category">
				<?php foreach($listPropinsi as $propinsi): ?>
					<li class="<?php echo ($propinsi['Tpropinsi']['KD_PROP'] == $selectedPropinsi['Tpropinsi']['KD_PROP'])? 'current' : '' ; ?>"><?php echo $html->link($propinsi['Tpropinsi']['PROP_NAME']." <span class='aux'>(".$propinsi[0]['jumlah'].")</span>", "/tkabupatens/index/pid:".$propinsi['Tpropinsi']['KD_PROP'],array(),false, false) ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

</div>
