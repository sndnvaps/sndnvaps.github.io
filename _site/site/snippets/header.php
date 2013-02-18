<!DOCTYPE html>
<html>
<head>
  
	<title><?php echo html($site->title()) ?> - <?php echo html($page->title()) ?></title>
  
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<!-- load: css -->
	<?php 
		echo css('assets/css/bootstrap.css');
		echo css('assets/css/style.css');
		echo css('assets/css/php.css');
	 	echo css('assets/css/html.css');
	 	echo css('assets/css/js.css');
	 	echo css('assets/css/css.css');
	?>
  
	<!-- Le fav and touch icons -->
 	<link rel="shortcut icon" href="assets/ico/favicon.ico">
   	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo url('assets/ico/apple-touch-icon-144-precomposed.png'); ?>">
   	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo url('assets/ico/apple-touch-icon-114-precomposed.png'); ?>">
   	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo url('assets/ico/apple-touch-icon-72-precomposed.png'); ?>">
   	<link rel="apple-touch-icon-precomposed" href="<?php echo url('assets/ico/apple-touch-icon-57-precomposed.png'); ?>">
   	
	<link rel="shortcut icon" href="<?php echo url('assets/ico/favicon.png'); ?>" type="image/png" />
	<link rel="icon" href="<?php echo url('assets/ico/favicon.png'); ?>" type="image/png" />

</head>

<body>
	
	<div class="container main">
		<div class="row">
			
			<!-- siedbar: open -->	
			<div class="span3">
				<div class="siedbar">
					
					<div class="page-header small logo">
						<a href="<?php echo url() ?>"><img src="<?php echo url('assets/img/logo.png'); ?>" width="115" height="41" /></a>
					</div>
					
					<?php snippet('treemenu') ?>
				</div>
			</div>	
			<!-- siedbar: close -->