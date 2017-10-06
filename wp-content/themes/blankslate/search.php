<?php get_header(); ?>
<div class="bg-blanco">
<div id="content" role="main" class="container" style="margin-top:100px">
	
	<header class="header">
		<h1 class="entry-title"><?php printf( __( 'Resultados para: %s', 'blankslate' ), get_search_query() ); ?></h1>
	</header>
	
	
	<div class="container row-blog">
		<div class="row">
			<?php
			$miimg = '<img src="http://placehold.it/770x320?text=COPACHISA" />';
			echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="6" scroll="false" transition="fade" transition_container="false" images_loaded="true" container_type="div" css_classes="posts" button_label="VER MÁS RESULTADOS" repeater="template_1" search='.$_GET['s'].']');
			?>
		</div>
	</div>

</div>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		function boton_post(){
			$('.post').each(function() {
				var albtn = $(this).outerHeight();
				$(this).find('a').css({'height':albtn});
			});
		}

		// function centraimg(){
		// 	$('.post').each(function(){
		// 	var ancontent = $(this).outerWidth();
		// 	var animg = $(this).find('img').outerWidth();

		// 	$(this).find('img').css({'margin-left': (ancontent-animg)/2});
		    
		// 	});
		// }

		setInterval(function(){
			boton_post();
			// centraimg();			
		}, 50);	
		
	});
</script>