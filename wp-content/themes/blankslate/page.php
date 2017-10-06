<?php get_header(); ?>

<div class="bg-blanco">
	<div id="container" class="container">

		<section id="content" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<section class="entry-content">
					<?php the_content(); ?>
					<!-- <div class="entry-links"><?php wp_link_pages(); ?></div> -->
				</section>
			</article>
			<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
			<?php endwhile; endif; ?>
		</section>

	<div class="clear"></div>
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