<div id="wrapper"><!-- start wrapper -->
<div id="container_front" class="login">
	<div id="header_front">
	    <h2>Log in.</h2>
	    <h3><?php echo $html->link(__("Kembali ke halaman depan",true),"/front"); ?></h3>
	</div>
	<form action="<?php echo $html->url('/users/login') ?>" name="login" id="login_form" method="post">
	<div class="content_front">
	    <div class="blue_box">
		<dl>
		    <dt><?php __("Username") ?></dt>
		    <dd>
			<span class="input"><input name="data[USERNAME]" value="" class="text" type="text"></span>
		    </dd>
		    <dt><?php __("Password") ?></dt>
		    <dd>
			<span class="input"><input name="data[PASSWORD]" value="" class="text" type="password"></span>
		    </dd>
		    <dt>&nbsp;</dt>
		    <dd>
			<div id="login_message"><?php if($session->check('Message.auth'))$session->flash('auth');?></div>
		    </dd>		    
		    		    
		    <div class="clear"><span></span></div>
		</dl>
	    </div>
	    <div class="blue_box_end clear"><span></span></div>
	</div>
	<div class="content_end_front clear">
	</div>
	    <?php echo $form->submit("btn-enter.gif", array("id"=>"signup_button")); ?>
    </form>
</div>
</div>