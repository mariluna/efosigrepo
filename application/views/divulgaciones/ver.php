<h1>Ver Divulgacion</h1>
<hr>
<div class="auth-form">
   <p>
         <label for="nombre">Nombre del Curso:</label><br>
         <textarea id="nombre" class="auth-input auth-textarea dis" type="text" value="" name="nombre" rows="2" readonly placeholder="<?php echo $divulgaciones[0]->nombre; ?>"></textarea>
   </p>
 <div class="col-lg-12">
  <p>
		<a class="auth-but-fix .btn-danger" href="<?php echo base_url()?>Divulgaciones/agregar?Curso=<?php echo $idCurso;?>">Agregar mas divulgaciones</a>	
	</p>
 </div>
	<div class="col-lg-4">
	 
		<table class="table table-striped table-condensed cuotas" style="text-align: center; ">
			<thead>
				<tr>
					<th style="max-width: 80px; text-align: center;">Radio</th>
					<th style="max-width: 80px; text-align: center;">Accion</th>
				</tr>
			</thead>
			<tbody class="result">
				<?php 
					$countRadio = 0;
					foreach ($divulgaciones as $row ){
					
						if((!empty($row->emisora)) and (!empty($row->dial)) and (!empty($row->tipo_divulgacion_radio)) and (!empty($row->hora))){
							echo "
								<tr style='font-weight:bold;text-align: left;'>
									<td>
										<div>
										<p>
										Emisora:<br> ".$row->emisora.
										"</p>

										<p>
										Dial:<br> ".$row->dial. 
										"</p>

										<p>
										Hora de emisi&oacute;n:<br> ".$row->hora. 
										"</p>";

										$X = pg_query("SELECT nombre FROM tb_tipo_divulgacion
										   WHERE id_tipo_divulgacion = $row->tipo_divulgacion_radio"); 
										
										$tipoDivulgacion = pg_fetch_row($X);
										$conf='"¿Esta seguro que desea eliminar esta divulgaci/&oacute;n?"';
										echo "<p>
											Divulgaci&oacute;n:<br> ".$tipoDivulgacion[0].
										"</p>
										</div>
									</td>
								<td>
									<a href='Divulgaciones/editar_radio/$row->id_divulgacion_radio?p=$idCurso' class='fa fa-pencil btn btn-small btn-primary'></a>
									<a onclick='return confirm($conf)' href='Divulgaciones/borrar_radio/$row->id_divulgacion_radio' class='fa fa-trash btn btn-small btn-danger'></a>
								</td>
							</tr>";
							$countRadio++;
						}
					} 
					if($countRadio == 0){
				
					echo "
						<tr style='font-weight:bold;text-align: left;'>
							<td colspan='2'>
								<p>
								No posee Divulgaciones de Radio asociadas.
								</p>
							</td>
						</tr>";
				
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-4">
		<table class="table table-striped table-condensed cuotas" style="text-align: center; ">
			<thead>
				<tr>
					<th style="max-width: 80px; text-align: center;">Prensa</th>
					<th style="max-width: 80px; text-align: center;">Accion</th>
				</tr>
			</thead>
			<tbody class="result">
				<?php 
				$countPrensa = 0;
				foreach ($divulgaciones as $row ){ 

					if((!empty($row->nombre_prensa)) and (!empty($row->fecha_prensa)) and (!empty($row->tipo_divulgacion_prensa))){
						$fecha = $row->fecha_prensa;
						$newFecha = explode("-",$fecha);
						$fechaFormat = $newFecha[2]."-".$newFecha[1]."-".$newFecha[0];
						echo "
						<tr style='font-weight:bold;text-align: left;'>
							<td>
								<div>
									<p>
									Nombre:<br>".$row->nombre_prensa.
									"</p>
									<p>
									Publicaci&oacute;n:<br> ".$fechaFormat. 
									"</p>";
									$Xp = pg_query("SELECT nombre, medio FROM tb_tipo_divulgacion
									WHERE id_tipo_divulgacion = $row->tipo_divulgacion_prensa"); 

									$tipoDivulgacionPrensa = pg_fetch_row($Xp);
									$conf='"¿Esta seguro que desea eliminar esta divulgaci/&oacute;n?"';
									echo "<p>
									Divulgaci&oacute;n:<br>".$tipoDivulgacionPrensa[1].", ".$tipoDivulgacionPrensa[0].
									"</p>
								</div>
							</td>
							<td>
								<a href='Divulgaciones/editar_prensa/$row->id_divulgacion_prensa?p=$idCurso' class='fa fa-pencil btn btn-small btn-primary'></a>
								<a onclick='return confirm($conf)' href='Divulgaciones/borrar_prensa/$row->id_divulgacion_prensa' class='fa fa-trash btn btn-small btn-danger'></a>
							</td>
						</tr>";
						$countPrensa++;
					}
				}
				if($countPrensa == 0){
				
					echo "
						<tr style='font-weight:bold;text-align: left;'>
							<td colspan='2'>
								<p>
								No posee Divulgaciones de Prensa asociadas.
								</p>
							</td>
						</tr>";
				
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-4">
		<table class="table table-striped table-condensed cuotas" style="text-align: center; ">
			<thead>
				<tr>
					<th style="max-width: 80px; text-align: center;">Televisi&oacute;n</th>
					<th style="max-width: 80px; text-align: center;">Accion</th>
				</tr>
			</thead>
			<tbody class="result">
				<?php 
				$countTv = 0;
				foreach ($divulgaciones as $row ){ 

					if((!empty($row->nombre_programa)) and (!empty($row->canal)) and (!empty($row->hora_emision))  and (!empty($row->tipo_divulgacion_tv))){
						echo "
						<tr style='font-weight:bold;text-align: left;'>
							<td>
								<div>
									<p>
									Nombre:<br> ".$row->nombre_programa.
									"</p>
									<p>
									Canal:<br> ".$row->canal. 
									"</p>
									<p>
									Hora de Emisi&oacute;n:<br> ".$row->hora_emision. 
									"</p>";
									$Xt = pg_query("SELECT nombre FROM tb_tipo_divulgacion
									WHERE id_tipo_divulgacion = $row->tipo_divulgacion_tv"); 

									$tipoDivulgacionTv = pg_fetch_row($Xt);
									$conf='"¿Esta seguro que desea eliminar esta divulgaci/&oacute;n?"';
									echo "<p>
									Divulgaci&oacute;n:<br>".$tipoDivulgacionTv[0].
									"</p>
								</div>
							</td>
							<td>
								<a href='Divulgaciones/editar_tv/$row->id_divulgacion_tv' class='fa fa-pencil btn btn-small btn-primary'></a>
								<a onclick='return confirm($conf)' href='Divulgaciones/borrar_tv/$row->id_divulgacion_tv?p=$idCurso' class='fa fa-trash btn btn-small btn-danger'></a>
							</td>
						</tr>";
						$countTv++;
					}
				} 
				if($countTv == 0){
				
					echo "
						<tr style='font-weight:bold;text-align: left;'>
							<td colspan='2'>
								<p>
								No posee Divulgaciones de Televisi&oacute;n asociadas.
								</p>
							</td>
						</tr>";
				
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-12">
		<p>
			<a class="auth-but-fix .btn-danger" href="<?php echo base_url()?>Divulgaciones">Volver</a>
		</p>
	</div>
</div>
