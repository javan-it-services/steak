<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Profil Yayasan dan Perguruan Tinggi');?></span></h2>
<div class="configurations form">
<?php echo $form->create('Configuration', array('action' => 'index'));?>
	<fieldset>
	<?php
		echo $form->input('id', array('name'=>'data[id][1]','value'=>$configs[0]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][1]','label'=>'Kode Yayasan', 'type'=>'text', 'value'=>$configs[0]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][2]','value'=>$configs[1]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][2]','label'=>'Nama Yayasan', 'type'=>'text', 'value'=>$configs[1]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][3]','value'=>$configs[2]['Configuration']['id']));
		echo $form->input('valuetgl1',array('name'=>'data[value][3]','label'=>'Tanggal Berdiri','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>$configs[2]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][4]','value'=>$configs[3]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][4]','label'=>'Alamat Yayasan1', 'value'=>$configs[3]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][5]','value'=>$configs[4]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][5]','label'=>'Alamat Yayasan2', 'value'=>$configs[4]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][6]','value'=>$configs[5]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][6]','label'=>'Kota', 'type'=>'text', 'value'=>$configs[5]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][7]','value'=>$configs[6]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][7]','label'=>'Kode Pos Yayasan', 'type'=>'text', 'value'=>$configs[6]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][8]','value'=>$configs[7]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][8]','label'=>'Telepon', 'type'=>'text', 'value'=>$configs[7]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][9]','value'=>$configs[8]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][9]','label'=>'Faximile', 'type'=>'text', 'value'=>$configs[8]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][10]','value'=>$configs[9]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][10]','label'=>'Email', 'type'=>'text', 'value'=>$configs[9]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][11]','value'=>$configs[10]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][11]','label'=>'Website', 'type'=>'text', 'value'=>$configs[10]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][12]','value'=>$configs[11]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][12]','label'=>'No akta', 'type'=>'text', 'value'=>$configs[11]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][13]','value'=>$configs[12]['Configuration']['id']));
		echo $form->input('valuetgl2',array('name'=>'data[value][13]','label'=>'Tanggal Akta','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>$configs[12]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][14]','value'=>$configs[13]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][14]','label'=>'No PN', 'type'=>'text', 'value'=>$configs[13]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][15]','value'=>$configs[14]['Configuration']['id']));
		echo $form->input('valuetglpn', array('name'=>'data[value][15]','label'=>'Tanggal PN', 'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>$configs[14]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][16]','value'=>$configs[15]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][16]','label'=>'Nama PTI', 'type'=>'text', 'value'=>$configs[15]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][17]','value'=>$configs[16]['Configuration']['id']));
		echo $form->input('valuetglbdr', array('name'=>'data[value][17]','label'=>'Tanggal Berdiri', 'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>$configs[16]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][18]','value'=>$configs[17]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][18]','label'=>'Alamat PTI 1', 'value'=>$configs[17]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][19]','value'=>$configs[18]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][19]','label'=>'Alamat PTI 2', 'value'=>$configs[18]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][20]','value'=>$configs[19]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][20]','label'=>'Kota', 'type'=>'text', 'value'=>$configs[19]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][21]','value'=>$configs[20]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][21]','label'=>'Kode Pos', 'type'=>'text', 'value'=>$configs[20]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][22]','value'=>$configs[21]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][22]','label'=>'Telepon', 'type'=>'text', 'value'=>$configs[21]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][23]','value'=>$configs[22]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][23]','label'=>'Faximile', 'type'=>'text', 'value'=>$configs[22]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][24]','value'=>$configs[23]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][24]','label'=>'Email', 'type'=>'text', 'value'=>$configs[23]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][25]','value'=>$configs[24]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][25]','label'=>'Website', 'type'=>'text', 'value'=>$configs[24]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][26]','value'=>$configs[25]['Configuration']['id']));
		echo $form->input('value', array('name'=>'data[value][26]','label'=>'No SK', 'type'=>'text', 'value'=>$configs[25]['Configuration']['value']));
		echo $form->input('id', array('name'=>'data[id][27]','value'=>$configs[26]['Configuration']['id']));
		echo $form->input('valuetgl3', array('name'=>'data[value][27]','label'=>'Tanggal SK', 'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash', 'value'=>$configs[26]['Configuration']['value']));



	?>
	</fieldset>
	<?php echo $form->end('Simpan');?>
</div>
</div>
</div>
