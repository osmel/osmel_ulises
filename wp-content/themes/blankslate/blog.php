<?php
// Template name: Blog
get_header(); ?>
<div class="bg-blanco">
<div id="container" class="container">

	<section id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<section class="entry-content">
				<?php the_content(); ?>				
			</section>
		</article>		
		<?php endwhile; endif; ?>
	</section>

</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>Blog</h1>
		</div>
	</div>
</div>

<div class="container row-blog">
	<div class="row">
		<?php
		echo do_shortcode('[ajax_load_more post_type="post" category="articulos" posts_per_page="6" scroll="false" transition="fade" transition_container="false" images_loaded="true" container_type="div" css_classes="posts" button_label="VER MÁS PROYECTOS" repeater="template_1"]');
		?>

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