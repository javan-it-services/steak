<?php
if($pid){
    $showEmpty = FALSE;
}else{
    $showEmpty = __('-- No Path --',true);
}
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'ajax_menu_add.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frmMenu"), json, "data[Link][#{field}]");'
                );
?>

<?php echo $form->create('Link', array('id'=>'frmMenu','url'=>array('action'=>'ajax_menu_add.json'))); ?>
<div id='msg' class='message'></div>
<fieldset>
<?php if($edit) {echo $form->hidden('id');} ?>
<?php echo $form->hidden('position'); ?>
<?php echo $form->hidden('parent_id', array('value'=>$pid)); ?>
<?php echo $form->input('path',array('type'=>'select','options'=>$actions,'selected'=>$path, 'label'=>__('Possible Path', true), 'empty'=>$showEmpty)); ?>
<?php echo $form->input('name', array('class'=>'req')); ?>
<?php echo $form->input('is_show', array('type'=>'checkbox')); ?>
<?php echo $form->input('is_default', array('type'=>'checkbox')); ?>
</fieldset>
<div class='submit'>
    <?php echo $ajax->submit(__('Save', true), $options_save); ?>
    <?php echo $form->button(__('Cancel',true), array('onClick'=>'Modalbox.close()')) ?>
</div>
<?php echo $form->end() ?>
