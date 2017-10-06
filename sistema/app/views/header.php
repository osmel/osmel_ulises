<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es_MX">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Copachisa</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/bootstrap-3.3.1/dist/css/bootstrap.min.css">
	<?php echo link_tag('css/sistema.css'); ?>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div id="foo"></div>
		<div class="row">
			<header>			

				<nav class="navbar navbar-default">
				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>

				      <a class="navbar-brand" href="http://www.copachisa.com/" target="_self">
						<img src="<?php echo base_url(); ?>img/logo-copachisa.png" >
					  </a>
				      
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      	<ul class="nav navbar-nav navbar-right">
					      	<li><a href="<?php echo base_url(); ?>obras">Obras</a></li>				
							<li><a href="<?php echo base_url(); ?>estados">Estados</a></li>
				        	<li><a href="<?php echo base_url(); ?>tipos">Tipos</a></li>	        					
					      	</ul>
				      	
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>




			</header>
		</div>

		<div class="row-fluid" id="wrapper">
			<div class="alert" id="messages"></div>