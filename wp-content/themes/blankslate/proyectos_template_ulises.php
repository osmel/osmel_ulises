<?php
// Template name: Proyectos
get_header(); ?>
<div class="bg-blanco">


<div class="container-fluid">
	<div class="row">
		<?php 
		if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
				echo do_shortcode('[rev_slider alias="projects"]');
				
			}else{
				echo do_shortcode('[rev_slider alias="proyectos"]');
			}
		?>
	</div>
</div>

<div class="container-fluid" style="background-color: #000">
	<div class="container menu-categorias">
		<div class="row">
			<ul>
			
			<?php
			if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
				$cv = 'Resume Copachisa';
				$cli = 'Costumers';
				$mas = 'show more projects';
				$obras = 'Search for works';
				$estado = 'State';
				$todos = 'All';
				$tipo = 'Type';
				$comercial = 'Comercial';
				$industrial = 'Industrial';
				$institucional = 'Institutional';

			echo 		'<li class="current-cat">';
			echo 			'<a href="'.get_site_url().'/projects/?lang=en">All</a>';
			echo		'</li>';
				
			}else{
				$cv = 'Curriculum Copachisa';
				$cli = 'Clientes';
				$mas = 'ver más proyectos';
				$obras = 'BUSCAR OBRAS';
				$estado = 'Estado';
				$todos = 'Todos';
				$tipo = 'Tipo';
				$comercial = 'Comercial';
				$industrial = 'Industrial';
				$institucional = 'Institucional';

			echo 		'<li class="current-cat">';
			echo 			'<a href="'.get_site_url().'/proyectos">Todos</a>';
			echo		'</li>';

			}

			
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
			echo do_shortcode('[ajax_load_more post_type="post" category="proyectos" posts_per_page="4" scroll="false" transition="fade" transition_container="false" images_loaded="true" container_type="div" css_classes="posts" button_label="'.$mas.'"]');
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<h1><?php echo $cv ?></h1>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                $npost = '246'; //id de página Proyectos
                $obra = simple_fields_fieldgroup("obras", $npost);    //osmel
                print_r($obra) ;die;

                
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
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <select name="estado" class="form-control estado">
                                    <option><?php echo $estado ?></option>
                                    <option><?php echo $todos ?></option>
                                    <?php
                                    $a=0;
                                    foreach ($estadosOrd as $key => $value) {
                                        echo '<option>'.$estadosOrd[$a].'</option>';
                                        $a++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <select name="tipo" class="form-control tipo">
                                    <option><?php echo $tipo ?></option>
                                    <option id="comercial"><?php echo $comercial ?></option>
                                    <option id="industrial"><?php echo $industrial ?></option>
                                    <option id="institucional"><?php echo $institucional ?></option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="submit" value="<?php echo $obras ?>" class="form-control" style="margin:5px 0; border-radius:0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript"> 
			var obras = <?php echo json_encode($obra) ?>; //ok
			
		</script> 
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            
        
		<div class="table-responsive">
            <table class="table table-hover tabla-obras">

            	<?php
            		if (isset($_GET["lang"]) & $_GET["lang"] == "en") {
            			$pie = 1;
            			$medida = 'ft<sup>2</sup>';
            			
						
				?>	
					<thead>
		                    <tr>
		                        <th>Work</th>
		                        <th>Place</th>
		                        <th>Year</th>
		                        <th>Area</th>                           
		                        <th>Type</th>
		                    </tr>
		                </thead>

				<?php 		
					}else{
						$pie = 10.7639;
						$medida = 'm<sup>2</sup>';
				?>
						<thead>
		                    <tr>
		                        <th>Obra</th>
		                        <th>Lugar</th>
		                        <th>Año</th>
		                        <th>Área</th> 
		                        <th>Tipo</th>                           
		                    </tr>
		                </thead>
				<?php
					}
            	?>
                
					
				<tbody id="datos" class="datos">
					<script type="text/javascript">
					var pie = parseFloat(<?php echo $pie; ?>);
					var medida = <?php echo json_encode($medida) ?>;
					// alert(pie);
					function round(value, exp) {
					  if (typeof exp === 'undefined' || +exp === 0)
					    return Math.round(value);

					  value = +value;
					  exp = +exp;

					  if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
					    return NaN;

					  // Shift
					  value = value.toString().split('e');
					  value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

					  // Shift back
					  value = value.toString().split('e');
					  return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
					}
					function formatearNumero(nStr) {
					    nStr += '';
					    x = nStr.split('.');
					    x1 = x[0];
					    x2 = x.length > 1 ? '.' + x[1] : '';
					    var rgx = /(\d+)(\d{3})/;
					    while (rgx.test(x1)) {
					            x1 = x1.replace(rgx, '$1' + ', ' + '$2');
					    }
					    return x1 + x2;
}

					for(var i=0;i<obras.length;i++){
						valor = obras[i]['area'];
						valor = valor.replace(/[qwertyuiopñlkjhgfdsamnbvcxzQWERTYUIOPÑLKJHGFDSAMNBVCXZáéíóúÁÉÍÓÚ,;:-<>!¡?¿ +_*$%&]/g, "");
						if(isNaN(valor) || valor == "" || valor == undefined){
							mimedida = 0;	
						}else{
							mimedida = parseFloat(valor)/pie;
							mimedida = round(mimedida, 0);
							mimedida = formatearNumero(mimedida);
						}
						// console.log(valor);
				        document.getElementById('datos').innerHTML += "<tr><td>"+obras[i]['obra']+"</td><td>"+obras[i]['lugar']+", "+obras[i]['estado']['selected_value']+"</td><td>"+obras[i]['ano']+"</td><td>"+mimedida+" "+medida+"</td><td>"+obras[i]['tipo']['selected_value']+"</td></tr>";
				        if (i == 9) {
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
		<h1><?php echo $cli; ?></h1>
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
        slidesToShow: 5,
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
	// var selTipo = <?php echo json_encode($quetipo) ?>;
	$('select.estado option:contains('+selEstado+')').prop({selected: true});
	// $('select.ano option:contains('+selTipo+')').prop({selected: true});

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

	// $( "select.estado" ).change(function () {
	//     var text = "";
	//     $( "select.estado option:selected" ).each(function() {
	//       text += $( this ).text() + "";
	//     });
	//     // alert(typeof obras[0]['estado']['selected_value']);
	//     $("select.ano option").remove();

	//     	if(text == 'Todos' || text == 'All'){
	//     		var losanos = [];
	// 			for(var i=0;i<obras.length;i++){
	// 		       		losanos.push(obras[i]['ano']);
	// 	    	}
	//     	}else if(text == 'Estado' || text == 'State'){
	//     		var losanos = '--';		    	
	//     	}else{
	//     		var losanos = [];
	// 			for(var i=0;i<obras.length;i++){			
	// 		       	if(obras[i]['estado']['selected_value'] == text) {
	// 		       		losanos.push(obras[i]['ano']);     		
	// 		       	};			    
	// 	    	}
	//     	}

	//     	var losanosDep = eliminateDuplicates(losanos);
	//     	var losanosOrd = losanosDep.sort(function(a, b){return a-b});

	//     	for(var i=0;i<losanosOrd.length;i++){
	//     		$('select.ano').prepend('<option>'+losanosOrd[i]+'</option>');
	//     	}
	    
	    
	//     // console.log(losanosOrd);
	    
	    
	// });

	// function eliminateDuplicates(arr) {
	//  var i,
	//      len=arr.length,
	//      out=[],
	//      obj={};

	//  for (i=0;i<len;i++) {
	//     obj[arr[i]]=0;
	//  }
	//  for (i in obj) {
	//     out.push(i);
	//  }
	//  return out;
	// }

});


	
</script>
