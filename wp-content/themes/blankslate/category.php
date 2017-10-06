<?php
get_header();
$cat = get_the_category(); //obtiene categoría
?>
<div class="bg-blanco">
<div id="container" class="container-fluid">
	<div class="row">
		<?php echo do_shortcode('[rev_slider alias="proyectos"]'); ?>
	</div>
</div>

<div class="container-fluid" style="background-color: #000">
	<div class="container menu-categorias">
		<div class="row">
			<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/proyectos">
					<span>Todos</span>
				</a>
			</li>	

			<?php
			wp_list_categories(array(
					'child_of' => 2,
					'hide_title_if_empty' => 1,
					'hide_empty' => false,
					'title_li' => 0,
					'show_option_none' => 0
					));
			?>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color:#000">
	<div class="container row-proyectos">
		<div class="row">
			<?php $miimg = '<img src="http://placehold.it/770x320?text=COPACHISA" />';
			echo do_shortcode('[ajax_load_more post_type="post" category="'.$cat[0]->category_nicename.'" posts_per_page="6" scroll="false" transition="fade" transition_container="false" images_loaded="true" container_type="div" css_classes="posts" button_label="VER MÁS PROYECTOS"]');
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<h1>Curriculum Copachisa</h1>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                $npost = '246'; //id de página Proyectos
                $obra = simple_fields_fieldgroup("obras", $npost);             
                
                $estados = array();
                $anos = array();
                $n=0;
                foreach ($obra as $key => $value) {
                    $estados[] = $obra[$n]['estado']['selected_value'];
                    $anos[] = $obra[$n]['ano'];
                    $n++;
                }
                // elimina estados repetidos dentro del array y los ordena en orden alfabético
                $resEstados = array_unique($estados);
                $estadosOrd = array_values($resEstados);
                sort($estadosOrd);
                // elimina años repetidos dentro del array y los ordena desde el más reciente
                $resAnos = array_unique($anos);
                $anosOrd = array_values($resAnos);
                rsort($anosOrd);                
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row curriculum">
                        <form id="obras">
                            <div class="col-lg-4">
                                <select name="estado" class="form-control estado">
                                    <option>Estado</option>
                                    <?php
                                    $a=0;
                                    foreach ($estadosOrd as $key => $value) {
                                        echo '<option>'.$estadosOrd[$a].'</option>';
                                        $a++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="ano" class="form-control ano">
                                    <option>Año</option>
                                    <?php
                                    $a=0;
                                    foreach ($anosOrd as $key => $value) {
                                        echo '<option>'.$anosOrd[$a].'</option>';
                                        $a++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <input type="submit" value="BUSCAR OBRAS" class="form-control" style="margin:5px 0; border-radius:0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript"> 
			var obras = <?php echo json_encode($obra) ?>;
			
		</script> 
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            
        
		<div class="table-responsive">
            <table class="table table-hover tabla-obras">
                <thead>
                    <tr>
                        <th>Obra</th>
                        <th>Lugar</th>
                        <th>Año</th>
                        <th>Área</th>                           
                    </tr>
                </thead>
					
				<tbody id="datos" class="datos">
					<script type="text/javascript">
					for(var i=0;i<obras.length;i++){				        
				        document.getElementById('datos').innerHTML += "<tr><td>"+obras[i]['obra']+"</td><td>"+obras[i]['lugar']+", "+obras[i]['estado']['selected_value']+"</td><td>"+obras[i]['ano']+"</td><td>"+obras[i]['area']+" m<sup>2</sup></td></tr>";
				        if (i == 11) {
				        	break;
				        };
				    }
					</script>
				</tbody>
            
            </table>                
        </div>
		

		</div>
		
	</div>
</div>

<div class="container">
	<div class="row">
		<h1>Clientes</h1>
		<div class="regular slider">
		<?php
			$post = '96';	//id de página Proyectos		
			$imagenes = simple_fields_fieldgroup("clientes", $post);
			// echo '<pre>';
			// print_r($imagenes);
			// echo '</pre>';
			$i=0;
			foreach ($imagenes as $key => $value) {
				echo '<div><img src="';
				echo $imagenes[$i]['url'];
				echo '"></div>';
				$i++;
			}
		?>
		</div>
		
	</div>
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

		function centraimg(){
			$('.post').each(function(){
			var ancontent = $(this).outerWidth();
			var animg = $(this).find('img').outerWidth();

			$(this).find('img').css({'margin-left': (ancontent-animg)/2});
		    
			});
		}

		setInterval(function(){
			boton_post();
			centraimg();			
		}, 50);	
		
		$(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 3,
        arrows: true,
        autoplay: true,
  		autoplaySpeed: 3500,
        responsive: [
        	{
        		breakpoint:769,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 4,
			        slidesToScroll: 2,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 3500,
        		}
        	},
        	{
        		breakpoint:481,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 3,
			        slidesToScroll: 1,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 3500,
        		}
        	},
        	{
        		breakpoint:361,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 2,
			        slidesToScroll: 1,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 3500,
        		}
        	}
        ]
      });
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {

	var selEstado = <?php echo json_encode($queEstado) ?>;
	var selAno = <?php echo json_encode($queAno) ?>;
	$('select.estado option:contains('+selEstado+')').prop({selected: true});
	$('select.ano option:contains('+selAno+')').prop({selected: true});

	var obras = <?php echo json_encode($obra) ?>;

	$('#obras').submit(function(e){
	
    e.preventDefault(); // Prevent Default Submission
		
    $.ajax({
		url: '<?php echo get_template_directory_uri() ?>/submit.php',
		type: 'POST',
		data: $(this).serialize(), // it will serialize the form data
	        dataType: 'html'
    })
    .done(function(data){
	    $('.datos').fadeOut('slow', function(){
	         $('.datos').fadeIn('slow').html(data);
        });
    })
    .fail(function(){
		alert('Ajax Submit Failed ...');	
    });




	});


});
</script>