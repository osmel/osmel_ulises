
	//https://editor.datatables.net/examples/inline-editing/simple
	//https://editor.datatables.net/examples/inline-editing/submitButton.html
/*

https://github.com/markcell/jQuery-Tabledit/issues/1
<input class="tabledit-input form-control input-sm" type="text" name="email" value="Estado de México" style="display: block;">

*/

//Poniendo las prop para que sea editable
jQuery('#tabla_cat_obras').on('draw.dt', function() { //draw.dt: momento que se crea 
	//alert('asd');
    /*
    jQuery(this).Tabledit({
        url: 'update.php',
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'email']]
        }
    });*/
    
});

//http://www.misin.msu.edu/0/js/DataTables/extras/Editor/examples/


   //$(this).closest('tr').find("input:not([name^=desc][name^=phone])").

	//jQuery('#tabla_cat_obras').on( 'click', 'tbody td:not(:first-child)', function (e) {


    jQuery('#tabla_cat_obras').on( 'click', 'tbody td:not(.entrada).edicion', function (e) {		
        //console.log(this);

        //console.log(  $(this).parents('tr')[0]   );
        //console.log(  jQuery(this).parents()  );
        //console.log(  jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num')   );

      //  console.log(  jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num')   );

      	 //console.log(jQuery(this).closest('tr > td').index() );

      	 indice =jQuery(this).closest('tr > td').index(); 

        num = jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num') 

        jQuery(this).css('display','none');
        jQuery(this).after( '<td class="entrada"><input autofocus indice="'+indice+'" num="'+num+'" id="myTextField" class="form-control input-sm" type="text" name="email" value="'+jQuery(e.target).text()+'" style="display: block;"></td>' );
        //poner el focus
        document.getElementById("myTextField").focus();

        //jQuery(this).closest('tr > td')[0].innerHTML='';

        //editor.inline( this );
        /*
        editor.edit(
            $(this).parents('tr')[0],
            'Edit record',
            { "label": "Update", "fn": function () { editor.submit() } }
        );

        console.log(this);
        console.log(jQuery(e.target).text());

        var tr = jQuery(this).closest('tr');
        var td = jQuery(this).closest('tr > td');

        var row = jQuery('#tabla_reporte').DataTable().row( tr );

        console.log(tr);
        console.log(td);

        console.log(row);
		*/


    } );

    jQuery('#tabla_cat_obras').on( 'focusout', 'tbody td.entrada', function (e) {		
    	
    	//console.log(jQuery('#myTextField').val());
    	//console.log(jQuery('#myTextField').attr('num'));

    		   campo= jQuery('#myTextField').attr('indice');
    		   valor= jQuery('#myTextField').val();
    	identificador= jQuery('#myTextField').attr('num');

    	/*
    	console.log(campo);
    	console.log(valor);
    	console.log(identificador);
    	*/



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


			        	jQuery(this).prev().text(valor);
				    	jQuery(this).prev().css('display','');
				    	jQuery(this).remove();

        /*
        jQuery(this).css('display','none');
        jQuery(this).after( '<td class="entrada"><input autofocus indice="'+indice+'" num="'+num+'" id="myTextField" class="form-control input-sm" type="text" name="email" value="'+jQuery(e.target).text()+'" style="display: block;"></td>' );
        //poner el focus
        document.getElementById("myTextField").focus();*/



    	//console.log(  jQuery(jQuery(this).parents()[0].cells[6]).find('a').attr('num')   );

    });		

	jQuery('#tabla_cat_obras').on( 'click', 'tbody td.entrada', function (e) {		
    	//jQuery(this).prev().css('display','');
    	//jQuery(this).remove();
    });	




                            //jQuery.each(valor, function (i, value) {
                                //console.log(valor['id']);


                                    //jQuery("#sel_dinamico").append('<option '+ ( (value.nombre=="valorosmel") ? 'selected' : '') +' value="' + value.nombre + '">' + value.nombre + '</option>');         
                                /*
                                //console.log(valor['nombre']);
                                if (dep=="producto_rep") { //caso de producto
                                 jQuery("#sel_dinamico").append('<option '+ ( (value.nombre==value.activo) ? 'selected' : '') +' value="' + value.nombre + '" style="background-color:#'+hexadecimal_color+' !important;" >' + value.nombre + '</option>');         
                                } else {
                                    jQuery("#sel_dinamico").append('<option '+ ( (parseInt(value.id)==parseInt(value.activo)) ? 'selected' : '') +' value="' + value.id + '" style="background-color:#'+hexadecimal_color+' !important;" >' + value.nombre + '</option>');      
                                }
                                */
                            //});


                        /*

                            jQuery('#producto_rep').css('pointer-events', 'initial');
                            jQuery('#color_rep').css('pointer-events', 'initial');
                            jQuery('#composicion_rep').css('pointer-events', 'initial');
                            jQuery('#calidad_rep').css('pointer-events', 'initial');
                            
                        */