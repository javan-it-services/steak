<?php
	$action 	= 'delete';
	$modelName 	= 'Tpropinsi';
	$submitLabel = __('Hapus', true);
	$name = $this->data[$modelName]['PROP_NAME'];
	// dummy call, supaya form yang dihasilkan bisa otomatis mendapat perlakuan (validasi, nama field, dll) sesuai model
	$form->create($modelName);

	$content 	= $form->input('KD_PROP');
	$content 	.= "<p>". __("Yakin untuk menghapus propinsi", true). " <strong>$name</strong>?" ."</p>";
	$content = "<div class='box'>$content</div>";

	echo $this->element('jsax/form', compact('action', 'modelName', 'content', 'submitLabel'));
?>
