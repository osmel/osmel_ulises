<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 
<?php 


$this->load->view('header_iframe'); ?>

<?php
 	if (!isset($retorno)) {
      	$retorno ="";
    }
?>    

	
	<div class="">


		
		<br>
		<div class="row">

				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

					<div class="form-group">

						<label for="descripcion" style="color:#fff;margin-top: 15px;margin-bottom: 5px;">ESTADO</label>
			              
								<select name="id_estado_reporte" id="id_estado_reporte" class="form-control">
									<option value="0">Todos</option>
									<?php if ($estados) { 
										foreach ( $estados as $estado ){ ?>
										<option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
									<?php } } ?>
								</select>
					      
	 			     </div>

	 			</div>     
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">			
					<div class="form-group">
						<label for="descripcion" style="color:#fff;margin-top: 15px;margin-bottom: 5px;">TIPOS DE OBRAS</label>
			              
								<select name="id_tipo_reporte" id="id_tipo_reporte" class="form-control">
									<option value="0">Todos</option>
									<?php if ($tipos) { 
										foreach ( $tipos as $tipo ){ ?>
										<option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
									<?php } } ?>
								</select>
					      
	 			     </div> 	 			     
	 			</div>     


		<div class="panel panel-primary" style="border: none;">
			<div class="panel-heading">Listado de obras</div>
			<div class="panel-body">
			<div class="col-md-12">


			 	


				
					<div class="table-responsive">


						<section>
							<table id="tabla_reportes_obras" class="table table-responsive table-over tabla-obras" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width="20%">Obra</th>
										<th width="35%">Lugar</th>
										<th width="15%">Año</th>
										<th width="15%">Área SF</th>
										<th width="15%">Tipo</th>
									</tr>
								</thead>
							</table>
						</section>

					</div>






			</div>
		</div>
	</div>

	</div>
<?php $this->load->view('footer_iframe'); 


?>
<div class="modal fade bs-example-modal-lg" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>	

