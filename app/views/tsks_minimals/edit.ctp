<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'edit.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[TsksMinimal][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Jumlah Sks Minimal');?></span></h2>
<?php echo $form->create('TsksMinimal', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
	<?php
		echo $form->hidden('id');
		echo $form->input('TPROGRAM_ID', array('label'=>'Program', 'div'=>'input text required','options'=>$program));
		echo $form->input('TJURUSAN_ID', array('label'=>'Jurusan', 'div'=>'input text required','options'=>$jurusan));
		echo $form->input('jumlah', array('label'=>'Jumlah sks Minimal'));
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
