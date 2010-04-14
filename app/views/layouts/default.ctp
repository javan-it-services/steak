<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>
	STEAK | <?php echo isset($currentModule)?$modules[$currentModule]['label']:""; ?>
  </title>

	<script type="text/javascript">
	// <![CDATA[
	var browserName=navigator.appName;
	if (browserName=="Microsoft Internet Explorer") {
		location.href = '<?php echo $html->url("/pages/noie") ?>';
	}
	// ]]>
	</script>

	<?php echo $html->css('ladahitam/reset'); ?>
	<?php echo $html->css('ladahitam/text'); ?>
	<?php echo $html->css('ladahitam/grid'); ?>
	<?php echo $html->css('ladahitam/index'); ?>

	<?php echo $html->css('datepicker'); ?>
	<?php echo $html->css('facebox'); ?>
	<!--[if IE]>
	<?php echo $html->css('iehack'); ?>
    <?php echo $javascript->link('notification'); ?>
	<![endif]-->
	<?php echo $javascript->link('prototype'); ?>
    <?php echo $javascript->link('scriptaculous'); ?>
	<?php echo $javascript->link('effects'); ?>
	<?php echo $javascript->link('dragdrop'); ?>
	<?php echo $javascript->link('controls'); ?>
	<?php echo $javascript->link('slider'); ?>
	<?php echo $javascript->link('facebox'); ?>

	<?php echo $javascript->link('main'); ?>
	<?php echo $javascript->link('datepicker'); ?>
	<script type='text/javascript'>
		Event.observe(window, 'load', function(){
			facebox = new Facebox({loading_image: '<?php echo $html->url('/images/ajax-loader.gif') ?>', close_image: '<?php echo $html->url('/images/closelabel.gif') ?>'});
		});
	</script>

</head>
<body>
<div id="notification" style="display: none;">
	<span id="loader">Loading...</span>
</div>
<div id="auth_box"><?php if($session->check('Message.auth'))$session->flash('auth')?></div>
<a href="#" onclick="$('auth_box').hide();return false;" class='close' id='auth_box_close'>Close</a>
<div id="superbar">
	<div id="virb_banner">
		<ul id="virb_banner_explore">
		  <li id="vnav_1"><a href="#" target="_parent"><strong class="nav_arrow">Modul</strong></a><span></span>
				<div class="virb_banner_dropdown">
					<ul>
						<?php foreach($mainMenu as $link):?>
							<?php $class = ($link['id'] === $currentLink['Link']['parent_id'])?'selected':'';?>
							<li><?php echo $html->link((($class)?$html->image('next_10.png'):'<em>&raquo;</em>').$link['name'],$link['path'],array('class'=>$class),false,false)?></li>
						<?php endforeach ?>
					</ul>
					<strong></strong>
				</div>
			</li>
		</ul>
	</div>

	<ul id="ribbon">
		<li class="user">Login sebagai <strong><?php echo $username ?></strong> (<?php echo $groupname ?>)</li>
		<li class="admin"><?php  echo $html->link("Ubah Password",array('controller'=>'users', 'action'=>'changepassword'),array('title'=>'Akun'),false, false)?><span></span></li>
		<li class="expiry"><?php  echo $html->link('<strong>Logout</strong>',array('controller'=>'users', 'action'=>'logout'),array('title'=>'Logout'),false, false)?></li>
	</ul>

</div>
<!--end superbar-->

<div id="container-header">
	<!--logo-->
	<a href="<?php echo $html->url('/') ?>" id="logo"><!--STMIK Bandung--><!--<img src="<?php echo $html->url('/upload/logo_text.jpg') ?>" style="height:30px;" />--></a>
    <div class="container_16">
		<div class='grid_16'>
			<ul id="nav-main" >
				<?php foreach($subMenu as $link):?>
				  <?php $class = ($currentPath===$link['path'])?'current':'' ?>
				  <li class='<?php echo $class ?>'><?php echo ($html->link('<span>'.$link['name'].'</span>', $link['path'],array(),null,false));?></li>
				<?php endforeach?>
			</ul>
		</div>
	</div>
</div>
<!--end container-header-->
<div id="wrapper">
	<div id="outer">
		<div class="container_16" id="container">
			<div id="inner" class="grid_16">
				<div id="page_outer" >
					<div id="page" >
						<div id="page_inner">
							<?php echo $content_for_layout; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="clear">&nbsp</div>
	</div>
</div>

</body>
</html>
