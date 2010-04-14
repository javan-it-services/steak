<h2 class="section_name"><span class="section_name_span"><?php __('Invalid ID');?></span></h2>
<fieldset>
	<div class='box'>
		<p><?php __("Tidak ditemukan $modelName dengan ID #$id") ?></p>
	</div>
</fieldset>
<div class='submit'>
	<button type="button" class='fb_cancel'>Ok</button>
</div>

<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
