jQuery(document).ready(function($) {

	var opts = {
		lines: 13, 
		length: 20, 
		width: 10, 
		radius: 30, 
		corners: 1, 
		rotate: 0, 
		direction: 1, 
		color: '#E8192C',
		speed: 1, 
		trail: 60,
		shadow: false,
		hwaccel: false,
		className: 'spinner',
		zIndex: 2e9, 
		top: '50%', // Top position relative to parent
		left: '50%' // Left position relative to parent		
	};

var target = document.getElementById('foo');



jQuery("#id_estado_reporte,  #id_tipo_reporte").on('change', function(e) {	
	var oTable =jQuery('#tabla_reportes_obras').dataTable();
	oTable._fnAjaxUpdate();
});



jQuery('#tabla_reportes_obras').dataTable( {
	
	  "pagingType": "full_numbers",
		
		"processing": true,
		"serverSide": true,
		"ajax": {
	            	"url" : "procesando_reportes_obras",
	         		"type": "POST",

 					"data": function ( d ) {
							d.id_estado = jQuery('#id_estado_reporte').val();  
							d.id_tipo = jQuery('#id_tipo_reporte').val();  
	    			 }	         		
	         		
	     },   

		"language": {  //tratamiento de lenguaje
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No hay registros",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(Mostrando _TOTAL_ de _MAX_ registros totales)",  
			"emptyTable":     "No hay registros",
			"infoPostFix":    "",
			"thousands":      ",",
			"loadingRecords": "Leyendo...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": Activando para ordenar columnas ascendentes",
				"sortDescending": ": Activando para ordenar columnas descendentes"
			},
		},


		"columnDefs": [
			    	
			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[1];
		                },
		                "targets": [0] //obra
		            },

			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[3]+', '+row[2];
		                },
		                "targets": [1] //lugar, estado
		            },



			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[4];
		                },
		                "targets": [2] //ano
		            },


			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[5];
		                },
		                "targets": [3] //area=monto
		            },

			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[6];
		                },
		                "targets": [4] //tipo
		            },



	            
		           
		            
		        ],
	});		



	jQuery('#tabla_cat_obras').dataTable( {
	
	  "pagingType": "full_numbers",
		        //dom: "Bfrtip",

		"processing": true,
		"serverSide": true,
		"ajax": {
	            	"url" : "procesando_cat_obras",
	         		"type": "POST",
	         		
	     },   

		"language": {  //tratamiento de lenguaje
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No hay registros",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(Mostrando _TOTAL_ de _MAX_ registros totales)",  
			"emptyTable":     "No hay registros",
			"infoPostFix":    "",
			"thousands":      ",",
			"loadingRecords": "Leyendo...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": Activando para ordenar columnas ascendentes",
				"sortDescending": ": Activando para ordenar columnas descendentes"
			},
		},


		"columnDefs": [
			    	
			    	{ 
		                "render": function ( data, type, row ) {
		                		//return '<td class="aaa2">'+row[1]+'</td>';
		                		return row[1];
		                },
		                "className":'edicion',
		                "targets": [0] //obra
		            },

			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[2];
		                },
		                "className":'seleccion',
		                "targets": [1] //estado
		            },


			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[3];
		                },
		                "className":'edicion',
		                "targets": [2] //lugar
		            },

			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[4];
		                },
		                "className":'edicion',
		                "targets": [3] //ano
		            },


			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[5];
		                },
		                "className":'edicion',
		                "targets": [4] //area=monto
		            },

			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[6];

		                  //{ data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
		                },
		                "className":'seleccion',
		                "targets": [5] //tipo
		            },



		            {
		                "render": function ( data, type, row ) {  //editar

						texto='<td>';
							texto+='<a href="editar_obra/'+jQuery.base64.encode(row[0])+'" num="'+jQuery.base64.encode(row[0])+'" type="button"'; 
							texto+=' class="btn btn-warning btn-sm btn-block" >';
								texto+=' <span class="glyphicon glyphicon-edit"></span>';
							texto+=' </a>';
						texto+='</td>';


							return texto;	
		                },
		                "targets": 6
		            },

		            
		            {
		                "render": function ( data, type, row ) {  //eliminar

	   						texto='<td><a href="eliminar_obra/'+jQuery.base64.encode(row[0])+'/'+jQuery.base64.encode(row[1])+'" '; 
								texto+='class="btn btn-danger  btn-block" data-toggle="modal" data-target="#modalMessage">';
								texto+='<span class="glyphicon glyphicon-remove"></span>';
							texto+='</a></td>';


							return texto;	
		                },
		                "targets": 7
		            },

	            
		           
		            
		        ],

		select: {
            style:    'color:red;',
            selector: 'td:first-child'
        },
        
	});		

//////////////////////////////////////////////////

    jQuery('#tabla_cat_obras').on( 'click', 'tbody td:not(.entrada).edicion', function (e) {		

      	 indice =jQuery(this).closest('tr > td').index(); 

        num = jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num'); 

        jQuery(this).css('display','none');
        jQuery(this).after( '<td class="entrada"><input autofocus indice="'+indice+'" num="'+num+'" id="myTextField" class="form-control input-sm" type="text" name="email" value="'+jQuery(e.target).text()+'" style="display: block;"></td>' );
        //poner el focus
        document.getElementById("myTextField").focus();

    } );

    jQuery('#tabla_cat_obras').on( 'click', 'tbody td:not(.entrada).seleccion', function (e) {	

 		 if( jQuery('#sel_dinamico').length )  {
 		 		return false;
 		 }

      	 var celda = this;
      	 indice =jQuery(this).closest('tr > td').index(); 
      	 num = jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num'); 
    	 var info= jQuery(this).closest('tr > td').text();  	 //console.log(jQuery(e.target).text());
      	 indice =jQuery(this).closest('tr > td').index(); 
         num = jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num') 
 			jQuery.ajax({
                url : 'cargar_selector',
                data:{
                    indice:indice,
                    num : num,
                },
                type : 'POST',
                dataType : 'json',
                success : function(data) {//console.log(data[indice]);
	       			jQuery(celda).css('display','none');
	       			jQuery(celda).after('<td class="combobox"><select indice="'+indice+'" num="'+num+'" id="sel_dinamico"></select></td>');	
	                jQuery("#sel_dinamico").html(''); 
	                //jQuery("#sel_dinamico").append('<option value="0" > </option>'); //+valor.nombre+

	                jQuery.each(data[indice], function (dep, valor) {
	                        	jQuery("#sel_dinamico").append('<option '+ ( (valor["nombre"]==info) ? 'selected' : '') +' value="'+ valor['id'] + '">' + valor['nombre'] + '</option>');         
	                });
	                document.getElementById("sel_dinamico").focus();
                    return false;
                },
                error : function(jqXHR, status, error) {
                },
                complete : function(jqXHR, status) {
                    
                }
            });   	


    } );

    jQuery('#tabla_cat_obras').on( 'focusout', 'tbody td.combobox #sel_dinamico', function (e) {		
    	 

    	 campo= jQuery('#sel_dinamico').attr('indice');
    		   identificador= jQuery('#sel_dinamico').attr('num');
    	valor= jQuery('#sel_dinamico option:selected').val();
    	valor_mostrar= jQuery('#sel_dinamico option:selected').text();

    	jQuery.ajax({
			        url : 'actualizar_celda',
			        data : { 
			        	campo: campo,
			        	valor: valor,
			        	id: identificador,
			        },
			        type : 'POST',
			        dataType : 'json',
			        success : function(data) {	
			        }
		});	


    	
    	jQuery(this).parent().prev().text(valor_mostrar);
    	jQuery(this).parent().prev().css('display','');
    	jQuery(this).parent().remove();
    	

    });	


    jQuery('#tabla_cat_obras').on( 'focusout', 'tbody td.entrada', function (e) {		
    	

    		   campo= jQuery('#myTextField').attr('indice');
    		   valor= jQuery('#myTextField').val();
    	identificador= jQuery('#myTextField').attr('num');

		jQuery.ajax({
			        url : 'actualizar_celda',
			        data : { 
			        	campo: campo,
			        	valor: valor,
			        	id: identificador,
			        },
			        type : 'POST',
			        dataType : 'json',
			        success : function(data) {	
			        }
		});	


		if (campo==3) {  //caso de año que haga split de 4
			valor = valor.substring(0, 4);
		}

		if (campo==4) {  //caso de año que haga split de 4
			valor = parseFloat(valor);
			valor= (!valor) ? "0.00" : valor;
		}


    	jQuery(this).prev().text(valor);
    	jQuery(this).prev().css('display','');
    	jQuery(this).remove();

    });		

//////////////////////////////////////////////////

	jQuery('#tabla_cat_estados').dataTable( {
	
	  "pagingType": "full_numbers",
		
		"processing": true,
		"serverSide": true,
		"ajax": {
	            	"url" : "procesando_cat_estados",
	         		"type": "POST",
	         		
	     },   

		"language": {  //tratamiento de lenguaje
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No hay registros",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(Mostrando _TOTAL_ de _MAX_ registros totales)",  
			"emptyTable":     "No hay registros",
			"infoPostFix":    "",
			"thousands":      ",",
			"loadingRecords": "Leyendo...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": Activando para ordenar columnas ascendentes",
				"sortDescending": ": Activando para ordenar columnas descendentes"
			},
		},


		"columnDefs": [
			    	
			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[1];
		                },
		                "targets": [0] //nombre
		            },

		            {
		                "render": function ( data, type, row ) {  //editar

						texto='<td>';
							texto+='<a href="editar_estado/'+jQuery.base64.encode(row[0])+'" type="button"'; 
							texto+=' class="btn btn-warning btn-sm btn-block" >';
								texto+=' <span class="glyphicon glyphicon-edit"></span>';
							texto+=' </a>';
						texto+='</td>';


							return texto;	
		                },
		                "targets": 1
		            },

		            
		            {
		                "render": function ( data, type, row ) {  //eliminar

	   						texto='<td><a href="eliminar_estado/'+jQuery.base64.encode(row[0])+'/'+jQuery.base64.encode(row[1])+'" '; 
								texto+='class="btn btn-danger  btn-block" data-toggle="modal" data-target="#modalMessage">';
								texto+='<span class="glyphicon glyphicon-remove"></span>';
							texto+='</a></td>';


							return texto;	
		                },
		                "targets": 2
		            },

	            
		           
		            
		        ],
	});	



	jQuery('#tabla_cat_tipos').dataTable( {
	
	  "pagingType": "full_numbers",
		
		"processing": true,
		"serverSide": true,
		"ajax": {
	            	"url" : "procesando_cat_tipos",
	         		"type": "POST",
	         		
	     },   

		"language": {  //tratamiento de lenguaje
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No hay registros",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(Mostrando _TOTAL_ de _MAX_ registros totales)",  
			"emptyTable":     "No hay registros",
			"infoPostFix":    "",
			"thousands":      ",",
			"loadingRecords": "Leyendo...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": Activando para ordenar columnas ascendentes",
				"sortDescending": ": Activando para ordenar columnas descendentes"
			},
		},


		"columnDefs": [
			    	
			    	{ 
		                "render": function ( data, type, row ) {
		                		return row[1];
		                },
		                "targets": [0] //nombre
		            },




		            {
		                "render": function ( data, type, row ) {  //editar

						texto='<td>';
							texto+='<a href="editar_tipo/'+jQuery.base64.encode(row[0])+'" type="button"'; 
							texto+=' class="btn btn-warning btn-sm btn-block" >';
								texto+=' <span class="glyphicon glyphicon-edit"></span>';
							texto+=' </a>';
						texto+='</td>';


							return texto;	
		                },
		                "targets": 1
		            },

		            
		            {
		                "render": function ( data, type, row ) {  //eliminar

	   						texto='<td><a href="eliminar_tipo/'+jQuery.base64.encode(row[0])+'/'+jQuery.base64.encode(row[1])+'" '; 
								texto+='class="btn btn-danger  btn-block" data-toggle="modal" data-target="#modalMessage">';
								texto+='<span class="glyphicon glyphicon-remove"></span>';
							texto+='</a></td>';


							return texto;	
		                },
		                "targets": 2
		            },

	            
		           
		            
		        ],
	});	





	jQuery('#modalMessage').on('hide.bs.modal', function(e) {
	    jQuery(this).removeData('bs.modal');
	});	


	//editar 
    jQuery('body').on('submit','#form_catalogos', function (e) {
    		
		
			jQuery('#foo').css('display','block');
			var spinner = new Spinner(opts).spin(target);
			jQuery(this).ajaxSubmit({
				success: function(data){
					if(data != true){
						
						spinner.stop();
						jQuery('#foo').css('display','none');
						jQuery('#messages').css('display','block');
						jQuery('#messages').addClass('alert-danger');
						jQuery('#messages').html(data);
						jQuery('html,body').animate({
							'scrollTop': jQuery('#messages').offset().top
						}, 1000);
					

					}else{
						    $catalogo = e.target.name;
							spinner.stop();
							jQuery('#foo').css('display','none');
							window.location.href = '/'+$catalogo;	
							return false;
					}
				} 
			});
			return false;
	});	




});
