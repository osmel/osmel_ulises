<div class="container">

	<div class="row">
		<div class="col-lg-2 text-center cat-name">
			<?php 
			$cat = get_the_category();
			echo $cat[1]->cat_name; 
			?>
		</div>
		<div class="col-lg-10 fecha">
			<?php the_date(); ?>
		</div>

	</div>

	<div class="row contenido-post art">
		<div class="col-lg-12">
			<?php the_title('<h1>','</h1>'); ?>
		</div>
	
		<div class="col-lg-12 contenido-post art">
			<?php the_content(); ?>
		</div>
	</div>

</div>