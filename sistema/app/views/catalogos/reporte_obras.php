<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 
<?php 


$this->load->view('header_iframe'); ?>

<?php
 	if (!isset($retorno)) {
      	$retorno ="";
    }
?>    

	
	<div class="container">


		
		<br>
		<div class="container row">

				
				<div class="col-xs-12 col-sm-6 col-md-6">

					<div class="form-group">
						<label for="descripcion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Estado</label>
			              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<select name="id_estado_reporte" id="id_estado_reporte" class="form-control">
									<option value="0">Todos</option>
									<?php if ($estados) { 
										foreach ( $estados as $estado ){ ?>
										<option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
									<?php } } ?>
								</select>
					      </div>
	 			     </div>  
	 			</div>     
				
				<div class="col-xs-12 col-sm-6 col-md-6">			
					<div class="form-group">
						<label for="descripcion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Tipos de obras</label>
			              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<select name="id_tipo_reporte" id="id_tipo_reporte" class="form-control">
									<option value="0">Todos</option>
									<?php if ($tipos) { 
										foreach ( $tipos as $tipo ){ ?>
										<option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
									<?php } } ?>
								</select>
					      </div>
	 			     </div> 	 			     
	 			</div>     


		<div class="panel panel-primary">
			<div class="panel-heading">Listado de obras</div>
			<div class="panel-body">
			<div class="col-md-12">


			 	


				
					<div class="table-responsive">


						<section>
							<table id="tabla_reportes_obras" class="display table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class="text-center" width="20%">Obra</th>
										<th class="text-center" width="35%">Lugar</th>
										<th class="text-center" width="15%">Año</th>
										<th class="text-center" width="15%">Área SF</th>
										<th class="text-center" width="15%">Tipo</th>
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

