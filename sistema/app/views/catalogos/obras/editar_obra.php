<meta charset="UTF-8">
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('header'); ?>
<?php 

 	if (!isset($retorno)) {
      	$retorno ="sistema/obras";
    }



  $hidden = array('id'=>$id);
  $attr = array('class' => 'form-horizontal', 'id'=>'form_catalogos','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
  echo form_open('validacion_edicion_obra', $attr,$hidden);
?>	
<div class="container">
		<br>
	<div class="row">
		<div class="col-sm-8 col-md-8"><h4>Edición de obra</h4></div>
	</div>
	<br>
	<div class="container row">
		<div class="panel panel-primary">
			<div class="panel-heading">Datos de obra</div>
			<div class="panel-body">
				
				<!-- izq-->		
				<div class="col-sm-6 col-md-6">

					<div class="form-group">
						<label for="obra" class="col-sm-12 col-md-12">Obra</label>
						<div class="col-sm-9 col-md-10">
							<?php 
								$nomb_nom='';
								if (isset($obra->obra )) 
								 {	$nomb_nom = $obra->obra ;}
							?>

							<input  value="<?php echo  set_value('obra',$nomb_nom); ?>" type="text" class="form-control" id="obra" name="obra" placeholder="obra">
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Estado</label>
			              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<select name="id_estado" id="id_estado" class="form-control">
									<?php if ($estados) { 
										foreach ( $estados as $estado ){ 
											$seleccionado='';
										   if  ($obra->id_estado==$estado->id)
													 {$seleccionado='selected';} else {$seleccionado='';}

										?>

										<option value="<?php echo $estado->id; ?>" <?php echo $seleccionado; ?>><?php echo $estado->nombre; ?></option>
									<?php } } ?>
								</select>
					      </div>
	 			     </div>     




					<div class="form-group">
						<label for="lugar" class="col-sm-12 col-md-12">Lugar</label>
						<div class="col-sm-9 col-md-10">
							<?php 
								$nomb_nom='';
								if (isset($obra->lugar )) 
								 {	$nomb_nom = $obra->lugar ;}
							?>

							<input  value="<?php echo  set_value('lugar',$nomb_nom); ?>" type="text" class="form-control" id="lugar" name="lugar" placeholder="lugar">
						</div>
					</div>



				</div>



				<!-- derecho-->		
				<div class="col-sm-6 col-md-6">

					<div class="form-group">
						<label for="ano" class="col-sm-12 col-md-12">Año</label>
						<div class="col-sm-9 col-md-10">
							<?php 
								$nomb_nom='';
								if (isset($obra->ano )) 
								 {	$nomb_nom = $obra->ano ;}
							?>

							<input  value="<?php echo  set_value('ano',$nomb_nom); ?>"  type="text" class="form-control" id="ano" name="ano" placeholder="ano">
						</div>
					</div>

					<div class="form-group">
						<label for="monto" class="col-sm-12 col-md-12">Área SF</label>
						<div class="col-sm-9 col-md-10">
							<?php 
								$nomb_nom='';
								if (isset($obra->monto )) 
								 {	$nomb_nom = $obra->monto ;}
							?>

							<input  value="<?php echo  set_value('monto',$nomb_nom); ?>" type="text" class="form-control" id="monto" name="monto" placeholder="monto">
						</div>
					</div>

					
					<div class="form-group">
						<label for="descripcion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Tipos de obras</label>
			              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<select name="id_tipo" id="id_tipo" class="form-control">
									<?php if ($tipos) { 
										foreach ( $tipos as $tipo ){ 
 											if  ($obra->id_tipo==$tipo->id)
													 {$seleccionado='selected';} else {$seleccionado='';}
											?>

										


										<option value="<?php echo $tipo->id; ?>" <?php echo $seleccionado; ?>><?php echo $tipo->nombre; ?></option>
									<?php } } ?>
								</select>
					      </div>
	 			     </div>     


				<div>

				





			</div>
		</div>
		
		<br>

		<div class="row">
			<div class="col-sm-4 col-md-4"></div>
			<div class="col-sm-4 col-md-4">
				<a href="<?php echo base_url(); ?><?php echo $retorno; ?>" type="button" class="btn btn-danger btn-block">Cancelar</a>
			</div>
			<div class="col-sm-4 col-md-4">
				<input type="submit" class="btn btn-success btn-block" value="Guardar"/>
			</div>
		</div>
		
	</div></div>
  <?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>