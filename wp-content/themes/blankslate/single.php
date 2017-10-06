<?php get_header();

$cat = get_the_category();
$post_id = $post->ID; // current post ID

if ($cat[0]->name == 'Artículos' || $cat[0]->name == 'Articles') {
	include 'contenido-articulo.php';
} else {
	include 'contenido-proyecto.php';
}
?>

<?php get_footer(); ?>