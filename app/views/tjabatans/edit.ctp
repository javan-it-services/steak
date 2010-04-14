<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'edit.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[Tjabatan][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Jabatan');?></span></h2>
<?php echo $form->create('Tjabatan', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('code', array ('label'=>'Kode EPSBED'));
		echo $form->input('value', array ('label'=>'Nama'));
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
