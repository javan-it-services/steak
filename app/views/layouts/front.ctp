<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>
	SAGA :: Sistem Akademik Ganesha <?php echo isset($currentModule)?" | ".$modules[$currentModule]['label']:""; ?>
  </title>
  <link rel="shortcut icon" href="<?php echo $this->base; ?>/images/edu.png" type="img/png" />

  <?php echo $html->css('stylesheet'); ?>
  <?php echo $scripts_for_layout; ?>
  <?php echo $javascript->link('prototype'); ?>
</head>

<body id='front'>
	<div id="virb_banner">

    <h1><a href="<?php echo $this->base ?>">STEAK</a></h1>
	<div id="virb_banner_strip">
	  <?php echo $html->image('logo-strip.png') ?>
	</div>

	<ul id="virb_banner_search">
        <li ><a tabindex=3 href="#" onclick="document.virb_banner_searchform.submit();return false" target="_parent"><strong>Login</strong></a><span></span></li>
	</ul>
	<form action="<?php echo $html->url('/users/login') ?>" id="" name="virb_banner_searchform" method="post">
		<div id="virb_banner_search">
			<input
				type="text" name="data[User][PASSWORD]" value="Password" id="txtPassword"
				onfocus="document.getElementById('txtPassword').style.backgroundPosition='bottom';if(this.type=='text') this.type='password';if(this.value=='Password') this.value=''; "
				onblur="document.getElementById('txtPassword').style.backgroundPosition='top';if(this.value=='') {this.type='text';this.value='Password';}"
				tabindex=2
			/>
		</div>
		<div id="virb_banner_search">
			<input
				name="data[User][USERNAME]"
				value="Username"
				id="txtUsername"
				onfocus="document.getElementById('txtUsername').style.backgroundPosition='bottom';if(this.value=='Username') this.value=''; "
				onblur="document.getElementById('txtUsername').style.backgroundPosition='top';if(this.value=='') {this.value='Username';}"
				type="text"
				tabindex=1
			/>
		</div>
		<input type="submit" style="display:none" />
	</form>

</div>

<!--<div id="tabs">-->
<!--  <div class="container">-->
<!--	<ul>-->
<!--	  <li><?php echo $html->link('<span>Pengumuman</span>',array('controller'=>'front','action'=>'index'), null, false, false);?></li>-->
<!--	  <li><?php echo $html->link('<span>Silabus Akademik</span>',array('controller'=>'tsilabus_akademik','action'=>'silabus/front'), null, false, false);?></li>-->
<!--    </ul>-->
<!--  </div>-->
<!--</div>-->

<div id="ftab">
	<ul>
	  <li><?php echo $html->link('<span>Home</span>',array('controller'=>'front','action'=>'index'), null, false, false);?></li>
	  |
	  <li><?php echo $html->link('<span>Pengumuman</span>',array('controller'=>'front','action'=>'index'), null, false, false);?></li>
	  |
	  <li><?php echo $html->link('<span>Silabus Akademik</span>','/tsilabus_akademik/silabus/front', null, false, false);?></li>
    </ul>
</div>

<div id="content_front">
	<?php echo $content_for_layout; ?>
</div>

</body>
</html>
