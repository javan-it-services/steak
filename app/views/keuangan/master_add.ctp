<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'masterAdd.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[KeuanganMaster][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span">Tambah Master Kewajiban</span></h2>
<?php echo $form->create('KeuanganMaster', array('url' => array('controller'=>'keuangan','action' => 'masterAdd'), 'id'=>'frm')) ?>
<div id="msg"></div>
<?php echo $form->input('nama') ?>
<?php echo $form->input('is_aktif', array('type' => 'checkbox')) ?>
<div class='submit'>
    <?php echo $ajax->submit(__('Simpan', true), $options_save); ?>
    <?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
</div>
<?php echo $form->end() ?>
