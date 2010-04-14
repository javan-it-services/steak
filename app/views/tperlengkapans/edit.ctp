<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>FALSE,
                    'url'=>array('action'=>'edit.json'),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[Tperlengkapan][#{field}]", $("msg"));'
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Agama');?></span></h2>
<?php echo $form->create('Tperlengkapan', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('jenis', array('label'=>'Nama', 'div'=>'input text required'));
		echo $form->input('jumlah', array('label'=>'Jumlah', 'div'=>'input text required'));
		echo "<div align='center'>";
		echo $form->input('gelombang_id', array('name' => 'gelombang', 'type' => 'select', 'options' => $gelombangs, 'selected'=>$gid, 'div'=>false, 'label'=>'Gelombang ', 'div'=>'input text required'));
		echo "</div>";
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
