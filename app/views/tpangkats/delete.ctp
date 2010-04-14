<?php
$options_save = array(
					'id'=>'btnSubmit',
					'div'=>FALSE,
					'url'=>array('action'=>'delete.json'),
					'before'=>'$("btnSubmit").disable()',
					'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[Tpangkat][#{field}]", $("msg"));'
				);
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Hapus Pangkat');?></span></h2>
<?php echo $form->create('Tpangkat', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
		<div class='box'>
			<?php echo $form->hidden('PANGKAT_ID') ?>
			<p><?php __("Yakin untuk menghapus pangkat {$this->data['Tpangkat']['PANGKAT_NAME']}?") ?></p>
		</div>
	</fieldset>
	<div class='submit'>
		<?php echo $ajax->submit(__('Hapus', true), $options_save); ?>
		<?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
	</div>
<?php echo $form->end();?>


<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
