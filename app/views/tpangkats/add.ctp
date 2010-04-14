<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'add.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[Tpangkat][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Pangkat Baru');?></span></h2>
<?php echo $form->create('Tpangkat', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
	<?php
		echo $form->input('PANGKAT_ID', array('label'=>'id'));
		echo $form->input('PANGKAT_NAME', array('label'=>'Nama', 'div'=>'input text required'));
		echo $form->input('PANGKAT_DESC', array('label'=>'Keterangan', 'div'=>'input text required'));
	?>
	</fieldset>
	<div class='submit'>
	    <?php echo $ajax->submit(__('Simpan', true), $options_save); ?>
		<?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
	</div>
<?php echo $form->end();?>


<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
