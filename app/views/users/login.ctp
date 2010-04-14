<h1 style="text-align:center; color:#fff;margin: 20px 0 0;font-weight:normal">Sistem Informasi Akademik</h1>
<div id="login_box" >
    <center><img src="<?php echo $html->url('/upload/logo.jpg') ?>" /></center>
	<form action="<?php echo $html->url('/users/login') ?>" name="login" id="login_form" method="post">
		<div id="login_message"><?php if($session->check('Message.auth'))$session->flash('auth');?></div>
		<label><?php __("Username") ?></label>
		<input  id="txtUsername" name="data[User][USERNAME]" value="<?php echo $this->data['User']['USERNAME'] ?>" class="input_login"  type="text" />
		<label><?php __("Password") ?></label>
		<input id="txtPassword" name="data[User][PASSWORD]" type="password" class="input_login"/>
		<div id="login_submit">
			<?php echo $form->submit("button-login.png", array("id"=>"signup_button",'div'=>FALSE)); ?>
		</div>
	</form>
</div>


<script type="text/javascript" >
$("txtPassword").value=''
$("txtUsername").focus();
</script>
