<div class="post">
<a href="<?php the_permalink(); ?>">
<span>
<h2><?php the_title(); ?></h2>
<h4><?php the_field('descripcion'); ?></h4>
</span>
</a>
<div class="thumb">
<?php 
if(has_post_thumbnail()){
		echo the_post_thumbnail();
} else {
    	echo '<img src="http://placehold.it/770x320?text=COPACHISA" />';
}
?>
</div>
</div>