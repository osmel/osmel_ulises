<?php

get_header(); ?>

<?php 
	$cat = get_the_category(); 
	$current_cat_id = $cat[0]->cat_ID; // current category ID
?>
<div class="container grid_elementos">

	<div class="row" style="margin-bottom:30px">
		<div class="col-lg-12">
			<h2 class="text-center"><?php echo $cat[0]->name.'s'; ?></h2>
		</div>
	</div>

	<div class="row">

		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'cat' => $current_cat_id, 'orderby' => 'date', 'posts_per_page' => 2, 'paged' => $paged);
		$loop = new WP_Query($args);
		?>

		<?php while ( $loop->have_posts() ) : $loop->the_post();					
					?>
					
					
		<?php

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

					

					<?php						
					endwhile; // End of the loop.
					?>
					
					<?php
					
					wp_pagenavi(array( 'query' => $loop ));
					
					?>

	</div> <!-- row -->

</div>

<?php get_template_part( 'newsletter' ); ?>

<?php get_footer(); ?>