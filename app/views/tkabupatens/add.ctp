<?php
	$action 	= 'add';
	$modelName 	= 'Tkabupaten';
	$submitLabel = __('Simpan', true);
	// dummy call, supaya form yang dihasilkan bisa otomatis mendapat perlakuan (validasi, nama field, dll) sesuai model
	$form->create($modelName);

	$content 	= $form->input('KD_KAB', array('type'=>'text', 'label'=>__('Kode', true), 'div'=>'input text required'));
	$content 	.= $form->input('KD_PROP', array('type'=>'select', 'options'=>$tpropinsis, 'label'=>__('Propinsi', true), 'empty'=>__('-- Pilih Propinsi --', true), 'div'=>'input text required'));
	$content 	.= $form->input('KAB_NAME', array ('label'=>'Nama', 'div'=>'input text required'));

	echo $this->element('jsax/form', compact('action', 'modelName', 'content', 'submitLabel'));
?>
