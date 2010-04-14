<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>
		STEAK Kampus | Selamat Datang, Silakan Login
  </title>
  <link rel="shortcut icon" href="<?php echo $this->base; ?>/images/edu.png" type="img/png" />
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
	<?php echo $javascript->link('prototype'); ?>
</head>
<body id="login">
<?php echo $content_for_layout ?>
</body>
</html>
