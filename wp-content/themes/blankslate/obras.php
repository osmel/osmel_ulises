<?php 
// Template name: Obras
get_header(); ?>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php
				$npost = '246';	//id de página Proyectos
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

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php
				if(isset($_GET['estado'])) {
				    $queEstado = $_GET['estado'];
				}
				if(isset($_GET['ano'])) {
				    $queAno = $_GET['ano'];
				}

				
			?>
			<div class="table-responsive">
				<table class="table table-hover tabla-obras">
					<thead>
						<tr>
							<th>Obra</th>
							<th>Estado</th>
							<th>Año</th>
							<th>Área</th>							
						</tr>
					</thead>

			<?php

				if (isset($_GET['estado']) && isset($_GET['ano'])) {

					$ii=0;
					foreach ($obra as $key => $value) {
						if ($obra[$ii]['estado']['selected_value'] == $queEstado && $obra[$ii]['ano'] == $queAno) {
							echo '<tr>';
							echo '<td>';
							echo $obra[$ii]['obra'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['lugar'].', '.$obra[$ii]['estado']['selected_value'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['ano'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['area'].' m<sup>2cuad</sup>';
							echo '</td>';
							echo '</tr>';
						}
						$ii++;
					}

				} else {

					$ii=0;
					foreach ($obra as $key => $value) {
						
							echo '<tr>';
							echo '<td>';
							echo $obra[$ii]['obra'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['lugar'].', '.$obra[$ii]['estado']['selected_value'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['ano'];
							echo '</td>';
							echo '<td>';
							echo $obra[$ii]['area'].' m<sup>2</sup>';
							echo '</td>';
							echo '</tr>';
						
						$ii++;
						if ($ii == 10) {
							break;
						}
					}

				}

				
			?>
				</table>
			</div>
		</div>



<?php get_footer(); ?>

