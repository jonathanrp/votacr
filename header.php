<?php
/**
 * Header template file
 *
 * @package WordPress
 * @subpackage Vota.cr
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110475719-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-110475719-1');
	</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Vota.cr">
	<title>Vota.cr</title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500" rel="stylesheet">
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/css/style.css" rel="stylesheet">
	<?php wp_head();?>
</head>
    <body>
		<div class="header">
			<div class="back">
			<?php if ( ! is_front_page() ): ?>
				<button onclick="history.go(-1);"><img src="<?php echo get_bloginfo( 'template_directory' );?>/img/back.png" /></button>
			<?php endif; ?>
			</div>
			<a href="/" class="logo">
				<img src="<?php echo get_bloginfo( 'template_directory' );?>/logo.png" />
			</a>
			<a href="/contacto" class="contacto">
				<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/contacto.png" />
			</a>
			<a href="https://www.facebook.com/votacr/" target="_blank" class="facebook">
				<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/facebook.png" />
			</a>
		</div>
