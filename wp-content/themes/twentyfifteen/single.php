<?php
/**
 * Template para Posts
 *
 * @package WordPress
 * @subpackage Estrategas Digitales
 * @since Estrategas Digitales 1.0
 */
get_header(); ?>


<div class="container-fluid main">

	<?php

		if ( have_posts() ) : while ( have_posts() ) : the_post();

		$post_id = $post->ID; // current post ID
		$cat = get_the_category(); 
		$current_cat_id = $cat[0]->cat_ID; // current category ID 
   		
    ?>
    	<div class="row">
    		
    		<?php the_post_thumbnail('full', $attr = 'class=img-responsive w-100'); ?>
			
			<?php if ($current_cat_id == 3) { ?>
				<div class="col-lg-4 col-lg-offset-1 titulos">
    				<?php the_title('<h1>','</h1>'); ?>
    				<?php echo '<h2>'.simple_fields_value("subtitulo").'</h2>'; ?>	
    			</div>
			<?php } ?>
    		

    		<?php
				
				$args = array( 
				    'category' => $current_cat_id,
				    'orderby'  => 'post_date',
				    'order'    => 'DESC'
				);
				$posts = get_posts( $args );
				// get IDs of posts retrieved from get_posts
				$ids = array();
				foreach ( $posts as $thepost ) {
				    $ids[] = $thepost->ID;
				}
				// get and echo previous and next post in the same category
				$thisindex = array_search( $post_id, $ids );
				$previd = $ids[ $thisindex - 1 ];
				$nextid = $ids[ $thisindex + 1 ];

				

				if ($current_cat_id == 3) {
					if ( ! empty( $previd ) ) {
				    ?><a rel="prev" href="<?php echo get_permalink($previd) ?>"><div><img src="<?php echo get_template_directory_uri(); ?>/images/pa.png"><i class="fa fa-chevron-left" aria-hidden="true"></i></div></a><?php
					}
					if ( ! empty( $nextid ) ) {
					    ?><a rel="next" href="<?php echo get_permalink($nextid) ?>"><div><i class="fa fa-chevron-right" aria-hidden="true"></i><img src="<?php echo get_template_directory_uri(); ?>/images/ps.png"></div></a><?php
					}
				}

				
			?>

    	</div>

</div> <!-- container-fluid -->   	

    	<?php 

    	if ($current_cat_id == 3) {    	
    		get_template_part( 'content-proyecto' );
    	}
    	if ($current_cat_id == 2) {
    		get_template_part( 'content-articulo' );
    	}    	
    	
    	?>


	
	<?php
					

	endwhile;// End of the loop. ?>
	

<?php endif; wp_reset_query(); ?>
	

<?php get_template_part( 'slider-text' ); ?>


<div class="container grid_elementos">

	<div class="row" style="margin-bottom:30px">
		<div class="col-lg-12">
			<h2 class="text-center">Otros<?php if ($current_cat_id == 3) {echo ' proyectos';}if ($current_cat_id == 2) {echo ' artículos';} ?></h2>
		</div>
	</div>

	<div class="row">

		<?php		
		
		$args = array(
					  'cat' => $current_cat_id,					
					  'orderby' => 'rand',
					  'posts_per_page' => 3,
					  'post__not_in' => array($post_id),
					  );

		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			$categories = get_the_category();
    		$cat = $categories[0]->term_id;

    		switch ($cat) {
				// cuando es Artículo
				case '2':
					echo '<div class="col-md-4 elemento art">';
						echo '<a href="'.get_permalink().'">';
							echo '<div class="bloque"></div>';
							echo the_post_thumbnail( 'size-home');
						echo '</a>';
								echo '<div class="descripcion">';
									echo '<span class="tipo">'.$categories[0]->cat_name.'</span>';
									echo '<span class="cliente_cat">';
									echo $categories[1]->cat_name;
									echo '</span>';
								echo '</div>';

							echo '<div>';
									echo '<span class="intro">';
									echo the_title();
									echo '</span>';
							echo '</div>';
						
					echo '</div>';

					break;
				// cuando es Proyecto
				case '3':
					$sub = simple_fields_value("subtitulo");

					echo '<div class="col-md-4 elemento proy">';
						echo '<a href="'.get_permalink().'">';
							echo '<div class="bloque"></div>';
							echo the_post_thumbnail( 'size-home');
						echo '</a>';
							
								echo '<div class="descripcion">';
								echo '<span class="tipo">'.$categories[0]->cat_name.'</span>';
								echo '<span class="cliente_cat">';
								echo the_title();
								echo '</span>';
								echo '</div>';
							echo '<div>';
								echo '<span class="intro">'.$sub.'</span>';
							echo '</div>';
						
					echo '</div>';

					break;
				
				default:
					
					break;
			}
		?>



		

	<?php endwhile; else :// End of the loop. ?>

	<div class="col-md-6">
		<div class="elemento">
			No existen elementos.
		</div>
	</div>

	<?php endif; wp_reset_query(); ?>

	</div> <!-- row -->

</div>


<?php get_footer(); ?>