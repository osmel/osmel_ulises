<div class="container-fluid">
	<div class="row">

		<div class="col-lg-5 contenido-post proy">
			<?php the_content(); ?>
		</div>

		<div class="col-lg-7">
			<div class="row">

				<?php 
				$imgs = simple_fields_values("imagenes");
				$i = 0;

			//  echo '<pre>';
			// print_r($imgs);
			// echo '</pre>';

				foreach ($imgs as $key => $value) {

						// echo '<div class="col-md-2 text-center">';
					echo '<img src="'.$imgs[$i]['image_src']['full']['0'].'" class="img-responsive w-100">';
						// echo '</div>';

					$i++;
				}
				?>  			
			</div>
		</div>

	</div>
</div>