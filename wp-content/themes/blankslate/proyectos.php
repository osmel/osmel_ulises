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
	<h1><?php echo $cv ?></h1>

	<iframe id="miFrame" src="<?php echo get_site_url(); ?>/sistema/reporte_obras" style="width: 100%; min-height:2px; overflow-y: hidden; border: none"></iframe>

        <script language="JavaScript">
            $(document).ready(function() {
				//ajusta altura de iframe de formulario
			   	function ajuste(){
			       	var alt = $('iframe#miFrame').contents().height();		    	
			  		$("iframe#miFrame").height(alt);
				}	    	    
			   

			    setInterval(ajuste, 100);
					    	
			});
        </script>
        <!--<iframe id="miFrame" src="http://manelperez.com/" width="100%" height="0" frameborder="1" transparency="transparency" onload="autofitIframe(this);"></iframe> -->


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
