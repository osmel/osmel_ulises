<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 
<?php 


$this->load->view('header'); ?>

<?php
 	if (!isset($retorno)) {
      	$retorno ="";
    }
?>    
	
	<div class="container" style="background-color: transparent;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2>OBRAS</h2>
			</div>
		</div>
	</div>

	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo base_url(); ?>nuevo_obra" type="button" class="btn btn-success btn-block">Nueva obra</a>
			</div>
			<div class="col-sm-4 col-md-6"></div>
			<div class="col-sm-4 col-md-3">
				<a href="<?php echo get_site_url(); ?>/wp-admin" type="button" class="btn btn-danger btn-block">Regresar</a>
			</div>
		</div>
		<br>
		<div class="container row">
		<div class="panel panel-primary">
			<div class="panel-heading">Listado de obras</div>
			<div class="panel-body">
			<div class="col-md-12">






				
					<div class="table-responsive">


						<section>
							<table id="tabla_cat_obras" class="display table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
								<thead>
									<tr>
										
										<th class="text-center" width="15%">Obra</th>
										<th class="text-center" width="15%">Estado</th>
										<th class="text-center" width="15%">Lugar</th>
										<th class="text-center" width="15%">Año</th>
										<th class="text-center" width="15%">Área SF</th>
										<th class="text-center" width="15%">Tipo</th>

										<th class="text-center " width="5%"><strong>Editar</strong></th>
										<th class="text-center " width="5%"><strong>Eliminar</strong></th>
									</tr>
								</thead>
							</table>
						</section>

					</div>






			</div>
		</div>
	</div>
	
	</div>
<?php $this->load->view('footer'); 


?>
<div class="modal fade bs-example-modal-lg" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>	

