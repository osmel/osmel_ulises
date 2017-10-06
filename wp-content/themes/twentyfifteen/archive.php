<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		$cat = get_the_category(); 
		$current_cat_id = $cat[0]->cat_ID; // current category ID

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'cat' => $current_cat_id, 'orderby' => 'date', 'posts_per_page' => 1, 'paged' => $paged);
		$loop = new WP_Query($args);

		?>

		<?php if ( $loop->have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( $loop->have_posts() ) : $loop->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			wp_pagenavi(array( 'query' => $loop ));
			// Previous/next page navigation.
			// the_posts_pagination( array(
			// 	'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
			// 	'next_text'          => __( 'Next page', 'twentyfifteen' ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
