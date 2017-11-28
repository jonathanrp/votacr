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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Vota.cr">
	<title>Vota.cr</title>
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
			<a href="/">
				<img class="logo" src="<?php echo get_bloginfo( 'template_directory' );?>/logo.png" />
			</a>
		</div>
