<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>$action.'.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data['.$modelName.'][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php echo __('Tambah', true). " $modelName " . __('baru', true);?></span></h2>
<?php echo $form->create($modelName, array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
		<?php echo $content;?>
	</fieldset>
	<div class='submit'>
	    <?php echo $ajax->submit($submitLabel, $options_save); ?>
		<?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
	</div>
<?php echo $form->end();?>


<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
