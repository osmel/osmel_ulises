	<div class="clear"></div>

<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 cont-btn">
				<?php 
				if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
						echo '<a href="'.get_site_url().'/contact/?lang=en" class="contactanos"><span>Contact us</span></a>';
						
					}else{
						echo '<a href="'.get_site_url().'/contacto" class="contactanos"><span>Contáctanos</span></a>';
					}
				?>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 menu">
				<p>
				<?php 
					if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
						echo 'SITE MAP';
						
					}else{
						echo 'MAPA DEL SITIO';
					}
				?>
				</p>
				<?php
			      wp_nav_menu( array( 
			      	'theme_location' => 'footer-menu',
			      	'container' => '',
			      	'items_wrap' => '<ul>%3$s</ul>' ) );
		        ?>
				<?php
			      wp_nav_menu( array( 
			      	'theme_location' => 'footer-right',
			      	'container' => '',
			      	'items_wrap' => '<ul>%3$s</ul>' ) );
		        ?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 logos">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo-copachisa-footer.png">
				<p>Eje estratégico de <img class="gpa" src="<?php echo get_template_directory_uri(); ?>/images/logo-gpa.png"></p>
			</div>
		</div>
	</div>
	<div class="row copy">
		<div class="container">
			
			<?php
			   	if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
			?>
			  		<p><a href="<?php echo get_site_url(); ?>/privacy-advice/?lang=en" target="_blank">Privacy advice</a> | Developed by <a href="http://www.estrategasdigitales.com/" target="_blank">Estrategas Digitales</a></p>
			<?php
			    }else{
			?>
			       	<p><a href="<?php echo get_site_url(); ?>/aviso-de-privacidad" target="_blank">Aviso de privacidad</a> | Desarrollo <a href="http://www.estrategasdigitales.com/" target="_blank">Estrategas Digitales</a></p>
			<?php
			    }
			?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		altofooter();
		setTimeout(function(){
			elm_visible();
		}, 800);

		$('li.menu-item-language').insertAfter('li.last');

		$("li.menu-item-language a").html(function(busca, reemplaza) {
		  return reemplaza.replace('Español', 'Esp');
		});
		$("li.menu-item-language a").html(function(busca, reemplaza) {
		  return reemplaza.replace('English', 'Eng');
		});
	});

	$(window).resize(function() {
		altofooter();
		setTimeout(function(){
			elm_visible();
		}, 150);
		
	});

	$(window).scroll(function(){
		elm_visible();	
	});

	$('#load-more').click(function(event) {
		setTimeout(function(){
			elm_visible();
		}, 800);
	});

	// FUNCIÓN QUE DA LA ALTURA DEL FOOTER
	function altofooter(){
			alto = $('footer').outerHeight();
			$('body').css({'padding-bottom':alto});	
	}

	// FUNCIÓN QUE APARECE LOS ELEMENTOS AL HACER SCROLL
	function elm_visible(){
		$('p, h1, h2, h3, h4, h5, span.tit, span.altas, .media img, .media iframe, .lacategoria, .ellogo img, .vc_single_image-wrapper>img, .wpb_wrapper h1, .contacto, .menu-categorias ul li, .curriculum, .slick-slider, form#searchform, .wpb_wrapper ul li').each(function(){
	    	var visible = $(this).visible('partial');
	    	$(this).toggleClass('visible',visible);
		}); 
	}

	$('.buscar').click(function(event) {
		altoWin = $(window).height();
		altoCon = $('.buscador .container').outerHeight();
		
		$('.buscador').css({'height':altoWin, 'top': '0'});
		$('.buscador .container').css({'padding-top':(altoWin - altoCon)/2.5});

		setTimeout(function(){
			$('.buscador').css({'opacity':1});
			$('.buscador .container').addClass('activar');
			elm_visible();
		}, 400);
	});
	$('.buscador .cerrar').click(function(event) {
		$('.buscador').css({'opacity':0});
		setTimeout(function(){
			$('.buscador').css({'height':'200px', 'top': '-200px'});
			$('.buscador .container').css({'padding-top':'0'});
		}, 200);
	});

	$('.acceso').click(function(event) {
		
		altoWin = $(window).height();
		altoCon = $('.acceso-clientes .container').outerHeight();

		$('.acceso-clientes').css({'height':altoWin, 'top': '0'});
		$('.acceso-clientes .container').css({'padding-top':(altoWin - altoCon)/2.5});

		setTimeout(function(){
			$('.acceso-clientes').css({'opacity':1});
			$('.acceso-clientes .container').addClass('activar');	
			elm_visible();
		}, 400);
	});
	
	$('.acceso-clientes .cerrar').click(function(event) {
		$('.acceso-clientes').css({'opacity':0});
		setTimeout(function(){
			$('.acceso-clientes').css({'height':'200px', 'top': '-200px'});
			$('.acceso-clientes .container').css({'padding-top':'0'});
		}, 200);
	});
	
	
</script>

