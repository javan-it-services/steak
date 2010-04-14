<div class="tmahasiswas index grid_12 alpha" id='content'>
	<div class='box'>
		<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Password');?></span></h2>
		
		<?php echo $form->create('Password',array('url'=>'/users/changepassword'));?>
		<fieldset>
		<?php
			echo $form->input('OLD_PASSWORD',array('label'=>'Password Lama','type'=>'password','value'=>''));
			echo $form->input('NEW_PASSWORD',array('label'=>'Password Baru','type'=>'password','value'=>''));
			echo $form->input('VALID_PASSWORD',array('label'=>'Ulang Password Baru','type'=>'password','value'=>''));
			?>
		</fieldset>
		<?php echo $form->end("Submit"); ?>
	</div>
</div>
