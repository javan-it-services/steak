<?php
echo $form->create('TcalonMahasiswa');
echo $form->input('NO_REGISTRASI');
echo $form->input('Tperlengkapan', array('multiple'=>'checkbox', 'div' => false, 'label' =>false));
echo $form->end();
?>
