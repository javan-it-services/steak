<?php
	$action 	= 'delete';
	$modelName 	= 'Tkabupaten';
	$submitLabel = __('Hapus', true);
	$name = $this->data[$modelName]['KAB_NAME'];
	// dummy call, supaya form yang dihasilkan bisa otomatis mendapat perlakuan (validasi, nama field, dll) sesuai model
	$form->create($modelName);

	$content 	= $form->input('KD_KAB');
	$content 	.= "<p>". __("Yakin untuk menghapus kabupaten", true). " <strong>$name</strong>?" ."</p>";
	$content = "<div class='box'>$content</div>";

	echo $this->element('jsax/form', compact('action', 'modelName', 'content', 'submitLabel'));
?>
