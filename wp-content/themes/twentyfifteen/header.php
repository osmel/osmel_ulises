<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.3.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.drawsvg.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/typed.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.hoverdir.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.97074.js" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/menu_topexpand.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/estilos.css">

	<?php wp_head(); ?>
</head>

<body>
<div class="bloque_menu">

		<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-menu.png" class="logo"></a>
	
		<div class="menu-wrap">
			<nav class="menu">
				<div class="icon-list">
					<a href="#"><span>Conócenos</span></a>
					<a href="#"><span>Proyectos</span></a>
					<a href="#"><span>Servicios</span></a>
					<a href="#"><span>Contacto</span></a>					
				</div>
			</nav>
		</div>
	

	<button class="menu-button" id="open-button">
		<div class="linea uno"></div>
		<div class="linea dos"></div>
		<div class="linea tres"></div>
	</button>
	
</div><!-- /bloque_menu -->