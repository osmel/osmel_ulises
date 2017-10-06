<div class="bg-blanco">


<div class="container">
	<div class="row">
		<?php
			echo the_content();
		?>
		
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-10 col-sm-offset-2 col-xs-12">
			<div class="row">
				
				<div class="col-lg-12 elcliente">
					<div>
						<div class="lacategoria">
							<?php 
							switch ($cat[0]->name) {
								case 'Comercial':
									echo '<img src="'.get_template_directory_uri().'/images/comercial.png" >';
									echo $cat[0]->name;
									break;
								case 'Commercial':
									echo '<img src="'.get_template_directory_uri().'/images/comercial.png" >';
									echo $cat[0]->name;
									break;
								case 'Industrial':
									echo '<img src="'.get_template_directory_uri().'/images/industrial.png" >';
									echo $cat[0]->name;
									break;
								case 'Institucional':
									echo '<img src="'.get_template_directory_uri().'/images/institucional.png" >';
									echo $cat[0]->name;
									break;
								case 'Institutional':
									echo '<img src="'.get_template_directory_uri().'/images/institucional.png" >';
									echo $cat[0]->name;
									break;
								default:
									
									break;
							}
							?>
						</div>
						<div class="ellogo">
							<?php
							$logo = get_field('logotipo');

							if ($logo == null || $logo == undefined || !$logo || empty($logo)) {
								echo '<img src="'.get_template_directory_uri().'/images/cliente-logo.png" class="img-responsive">';
							} else {
								echo '<img src="'.$logo['url'].'" class="img-responsive">';
							}
							?>
						</div>
					</div>
					<?php 
						if(isset($_GET["lang"]) & $_GET["lang"] == "en"){
							$cliente = 'CLIENT';
							$desc = 'DESCRIPTION';
							$loc = 'LOCATION';
							$ter = 'GROUND';
							$area = 'CONSTRUCTION AREA';
							$per = 'PERIOD OF REALIZATION';
							$sig = 'NEXT PROJECT';
							$ant = 'PREVIOUS PROJECT';
						}else {
							$cliente = 'CLIENTE';
							$desc = 'DESCRIPCIÓN';
							$loc = 'LOCALIZACIÓN';
							$ter = 'TERRENO';
							$area = 'ÁREA DE CONSTRUCCIÓN';
							$per = 'PERÍODO DE CONSTRUCCIÓN';
							$sig = 'PROYECTO SIGUIENTE';
							$ant = 'PROYECTO ANTERIOR';
						}
					?>
					<div>
						<span class="tit"><?php echo $cliente ?>:</span> <span class="altas"><?php the_title(); ?></span>
					</div>
					<div>
						<span class="tit"><?php echo $desc ?>:</span> <span class="altas">
							<?php
							if(isset($_GET["lang"]) & $_GET["lang"] == "en"){
								echo get_field('descripcion_en');
							}else {
								echo get_field('descripcion');
							}
							?>
						</span>
					</div>
				</div>

				

				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 descripcion">
							<h5><?php echo $loc ?></h5>
							<p><?php echo get_field('localizacion'); ?></p>
							<hr>
							<h5><?php echo $ter ?></h5>
							<p><?php echo get_field('terreno'); ?> m<sup>2</sup></p>
							<hr>
							<h5><?php echo $area ?></h5>
							<p><?php echo get_field('area_de_construccion'); ?> m<sup>2</sup></p>
							<hr>
							<h5><?php echo $per ?></h5>

							<?php
							if(isset($_GET["lang"]) & $_GET["lang"] == "en"){
							?>

								<p><?php echo get_field('periodo_de_realizacion_en'); ?></p>
							
							<?php
							}else {
							?>
								<p><?php echo get_field('periodo_de_realizacion'); ?></p>
							
							<?php }	?>
							
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 media">
							<?php

							$img = get_field('imagen');
							$videoUrl = get_field('video_youtube');

							if ($img == null) {

								if ($videoUrl == null) {
									echo '<img src="http://placehold.it/560x300?text=COPACHISA" class="img-responsive">';
								} else {

									$parts = parse_url($videoUrl);
									
									if ($parts['scheme'] == 'https' && $parts['host'] == 'www.youtube.com' && $parts['path'] == '/watch' && $parts['query']) {
										
										parse_str($parts['query'], $query);

										echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" width="" height="" src="https://www.youtube.com/embed/'.$query['v'].'?rel=0&amp;showinfo=0&loop=1" frameborder="0" allowfullscreen></iframe></div>';
									} else {
										echo '<img src="http://placehold.it/560x300?text=COPACHISA" class="img-responsive">';
									}
								}

							} else {
								echo '<img src="'.$img.'" class="img-responsive">';
							}

							?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="container-fluid prev-sig">
	<div class="row">
		<?php
		$args = array( 
				    'category' => 2, //$cat[0]->cat_ID
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

		?>
		<div class="previo">
			<?php
			
			if ( ! empty( $previd ) ) {
			   	echo '<a rel="prev" href="'.get_permalink($previd).'"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>'.$ant.'</span></a>'; //$cat[0]->name
			} else {
				echo '<a><i class="fa fa-chevron-left" aria-hidden="true"></i><span>'.$ant.'</span></a>'; //$cat[0]->name
			}
			?>
		</div>
		<div class="siguiente">
			<?php
			
			if ( ! empty( $nextid ) ) {
			    echo '<a rel="next" href="'.get_permalink($nextid).'"><span>'.$sig.'</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>'; //$cat[0]->name
			} else {
				echo '<a><span>'.$sig.'</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>'; //$cat[0]->name
			}
			?>
		</div>
	</div>
</div>
</div>