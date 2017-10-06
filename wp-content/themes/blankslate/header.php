<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/easy-responsive-tabs.css " />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.3.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/easyResponsiveTabs.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.visible.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/estilos.css">

	<?php wp_head(); ?>
</head>

<body>


	<nav class="navbar navbar-default fijo">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-copachisa.png"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	      
	        <?php

	        if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
	        	$texto = 'CUSTOMER ACCESS';
	        	$buscar = 'SEARCH';
	        	$usuario = 'USER';
	        	$contrasena = 'PASSWORD';
	        	$entrar = 'ENTER';
	        }else{
	        	$texto = 'ACCESO A CLIENTES';
	        	$buscar = 'BUSCAR';
	        	$usuario = 'USUARIO';
	        	$contrasena = 'CONTRASEÑA';
	        	$entrar = 'ENTRAR';
	        }

		      wp_nav_menu( array( 
		      	'theme_location' => 'main-menu',
		      	'container' => '', 
		      	'items_wrap' => '
		      	<ul class="nav navbar-nav navbar-right">%3$s
		      	<li><a class="acceso">'.$texto.'</a></li>				
				<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
	        	<li class="last"><a class="buscar"><i class="fa fa-search" aria-hidden="true"></i></a></li>	        					
		      	</ul>' ) );
	        ?>
	      	
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="buscador">		
		<a class="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
		
		<div class="container">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				
				<h2><?php echo $buscar ?></h2>

				<form role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>">
					<div class="input-group">
						
					    <input name="s" id="s" type="text" class="form-control" placeholder="<?php echo $buscar ?>...">
					    <span class="input-group-btn">
					       <button class="btn btn-default" type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
					    </span>
					    
				    </div><!-- /input-group -->
			    </form>

			</div>
		</div>
		
	</div>

	<div class="acceso-clientes">
		<a class="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>

		<div class="container">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				
				<h2><?php echo $texto ?></h2>

				<form role="acceso" id="accesoform" action="<?php echo get_site_url(); ?>">
					
					<div class="input-group">						
					    <input name="usuario" id="usuario" type="text" class="form-control" placeholder="<?php echo $usuario ?>">					    
				    </div><!-- /input-group -->

				    <div class="input-group">						
					    <input type="password" class="form-control" id="password" placeholder="<?php echo $contrasena ?>">
				    </div><!-- /input-group -->
					<button type="submit" class="btn btn-default"><?php echo $entrar ?></button>
			    </form>

			</div>
		</div>

	</div>
