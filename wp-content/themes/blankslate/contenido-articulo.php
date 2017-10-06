<div class="bg-blanco">
	
<div class="container-fluid">
	<div class="row">
		<?php
		if (has_post_thumbnail()) {			
			$bg = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );			
		} else {
			$bg = 'http://placehold.it/1900x750?text=COPACHISA';
		}		
		?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-articulo" style="background-image:url('<?php echo $bg ?>')">

		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 col-xs-12">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
</div>

<div id="container" class="container articulo">
	<section id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>		
		<?php endwhile; endif; ?>
	</section>
</div>
</div>