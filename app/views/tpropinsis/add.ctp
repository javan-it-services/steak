<?php
	$action 	= 'add';
	$modelName 	= 'Tpropinsi';
	$submitLabel = __('Simpan', true);
	// dummy call, supaya form yang dihasilkan bisa otomatis mendapat perlakuan (validasi, nama field, dll) sesuai model
	$form->create($modelName);

	$content 	= $form->input('KD_PROP');
	$content 	.= $form->input('PROP_NAME', array ('label'=>'Nama'));

	echo $this->element('jsax/form', compact('action', 'modelName', 'content', 'submitLabel'));
?>
