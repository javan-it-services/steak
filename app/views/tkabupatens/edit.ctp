<?php
	$action 	= 'edit';
	$modelName 	= 'Tkabupaten';
	$submitLabel = __('Simpan', true);
	// dummy call, supaya form yang dihasilkan bisa otomatis mendapat perlakuan (validasi, nama field, dll) sesuai model
	$form->create($modelName);

	$content 	= $form->input('KD_KAB');
	$content 	.= $form->input('KAB_NAME', array ('label'=>'Nama'));

	echo $this->element('jsax/form', compact('action', 'modelName', 'content', 'submitLabel'));
?>
