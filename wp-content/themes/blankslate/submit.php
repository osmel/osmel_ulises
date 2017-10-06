
<?php
if( $_POST ){
	
    $queEstado = $_POST['estado'];
    $queTipo = $_POST['tipo'];

    // echo $queEstado.' '.$queTipo;
?>

	
<script type="text/javascript">

    var estjs = <?php echo json_encode($queEstado) ?>;
    var tipojs = <?php echo json_encode($queTipo) ?>;


    if (tipojs == 'Institutional') {
    	tipojs = 'Institucional';
    };

    var cuantos = 0;
    
    if(estjs == 'Estado' || estjs == 'State'){
    	document.getElementById('datos').innerHTML += "<tr><td>Elije un Estado</td><td></td><td></td><td></td><td></td></tr>";
    
    }else if (tipojs == 'Tipo' || tipojs == 'Type') {
    	document.getElementById('datos').innerHTML += "<tr><td>Elije un Tipo</td><td></td><td></td><td></td><td></td></tr>";
    
    }else if(estjs == 'Todos' || estjs == 'All' & tipojs != 'Tipo'){
    	
    	for(var i=0;i<obras.length;i++){
	        
	        if (obras[i]['tipo']['selected_value'] == tipojs) {
	        	valor = obras[i]['area'];
				valor = valor.replace(/[qwertyuiopñlkjhgfdsamnbvcxzáéíóúÁÉÍÓÚQWERTYUIOPÑLKJHGFDSAMNBVCXZ,;:-<>!¡?¿ +_*$%&]/g, "");
				if(isNaN(valor) || valor == "" || valor == undefined){
					mimedida = 0;	
				}else{
					mimedida = parseFloat(valor)/pie;
					mimedida = round(mimedida, 0);
					mimedida = formatearNumero(mimedida);
				}
	            document.getElementById('datos').innerHTML += "<tr><td>"+obras[i]['obra']+"</td><td>"+obras[i]['lugar']+", "+obras[i]['estado']['selected_value']+"</td><td>"+obras[i]['ano']+"</td><td>"+mimedida+" "+medida+"</td><td>"+obras[i]['tipo']['selected_value']+"</td></tr>";
	            cuantos++;
	        };	        
	    }
	    nres();
    
    }else{
    	
    	for(var i=0;i<obras.length;i++){

	        if (obras[i]['estado']['selected_value'] == estjs & obras[i]['tipo']['selected_value'] == tipojs) {
	        	valor = obras[i]['area'];
				valor = valor.replace(/[qwertyuiopñlkjhgfdsamnbvcxzQWERTYUIOPÑLKJHGFDSAMNBVCXZ,;:-<>!¡?¿ +_*$%&]/g, "");
				if(isNaN(valor) || valor == "" || valor == undefined){
					mimedida = 0;	
				}else{
					mimedida = parseFloat(valor)/pie;
					mimedida = round(mimedida, 0);
					mimedida = formatearNumero(mimedida);
				}
	            document.getElementById('datos').innerHTML += "<tr><td>"+obras[i]['obra']+"</td><td>"+obras[i]['lugar']+", "+obras[i]['estado']['selected_value']+"</td><td>"+obras[i]['ano']+"</td><td>"+mimedida+" "+medida+"</td><td>"+obras[i]['tipo']['selected_value']+"</td></tr>";
	            cuantos++;
	        };
	        
	    }
	    nres();
    }

    function nres(){
    	if (cuantos == 0) {
    		document.getElementById('datos').innerHTML += "<tr><td>No existen resultados</td><td></td><td></td><td></td><td></td></tr>";
    	}
    }
    

</script>




<?php } ?>