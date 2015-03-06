<?php
	$fechafin = $persona->fecha_nacimiento;
	$newFechafin = explode("-",$fechafin);
	$fechaFormatfin = $newFechafin[2]."-".$newFechafin[1]."-".$newFechafin[0];
?>

<h1>Ver Persona General</h1>
<hr>
<div class="add-menu">
			<a href="<?php echo base_url(); ?>Persona" class="fa fa-arrow-left  btn btn-success"> Volver </a>
		</div> 
<div class="col-lg-12" ng-app="persona">

	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">REDI<br>
		<input class="auth-input dis" type="text" value="<?php echo $persona->redi; ?>" readonly></input>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">ESTADO<br>
		<input Class="auth-input dis" type="text" value="<?php echo $persona->estado; ?>" readonly></input>
		</p>
				
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">MUNICIPIO<br>
		<input Class="auth-input dis" type="text" value="<?php echo $persona->municipio; ?>" readonly></input>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">PARROQUIA<br>
		<input Class="auth-input dis" type="text" value="<?php echo $persona->parroquia; ?>" readonly></input>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nombre">Direcci&oacute;n de Habitaci&oacute;n:</label><br>
			<textarea class="auth-input auth-textarea dis" type="text" value="" name="direccion" rows="2" readonly><?php echo $persona->direccion; ?></textarea>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nombreApellido">Nombres y Apellidos:</label><br>
			<input class="auth-input dis" type="text" value="<?php echo $persona->nombre_apellido; ?>" name="nombreApellido" readonly></input>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="cedula">C&eacute;dula:</label><br>
			<input id="cedula" class="auth-input dis" type="text" value="<?php echo $persona->cedula; ?>" name="cedula" maxlength="8" readonly></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nacionalidad">Nacionalidad: </label><br>
			<input class="auth-input dis" type="text" value="<?php echo $persona->nacionalidad; ?>"/>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="edad">Edad:</label><br>
			<input id="edad" class="auth-input dis" type="text" value="<?php echo $persona->edad; ?>" name="edad" maxlength="2" readonly></input>
		</p>
<br>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="sexo">Sexo:</label><br>
			<input class="auth-input dis" type="text" value="<?php echo $persona->sexo; ?>" />
		</p>
		<br>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="fecha">Fecha de Nacimiento:</label><br>
			<input name="fecha"class="auth-input dis" value="<?php echo $fechaFormatfin; ?>" type="text" id="fecha" readonly>
		</p>
	
	</div>
	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nroHijos">N&uacute;mero de hijas(os):</label><br>
			<input id="nroHijos" class="auth-input dis" type="text" value="<?php echo $persona->num_hijos; ?>" name="nroHijos" maxlength="2" readonly></input>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="etnia">¿Pertenece a una etnia?</label><br>
			<?php if($persona->etnia == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->etnia' readonly/><br>";
			}else{
				echo "<input class='auth-input dis' type='text' value='$persona->etnia' readonly/><br></br>";
				echo "¿Domina Idioma?<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->domina_idioma' readonly/><br><br>";			
			}
			?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="discapacidad">&iquest;Presenta alguna discapacidad?</label><br>
			<?php if($persona->discapacidad == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->discapacidad' readonly/><br>";
			}else{
				echo "<input class='auth-input dis' type='text' value='Si, $persona->discapacidad' readonly/><br><br>";		
			}
			?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="edoCivil">Estado Civil:</label><br>
			<?php 
				echo "<input class='auth-input dis' type='text' value='$persona->estado_civil' readonly/><br>";
			?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telHab">Tel&eacute;fono de Habitaci&oacute;n:</label><br>
			<input id="telHab" class="auth-input dis" type="text" value="<?php echo $persona->tel_local; ?>" name="telHab" maxlength="11" readonly></input>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telCel">Tel&eacute;fono Celular:</label><br>
			<input id="telCel" class="auth-input dis" type="text" value="<?php echo $persona->tel_celular; ?>" name="telCel" maxlength="11" readonly></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="correo">Correo Electr&oacute;nico:</label><br>
			<input id="correo" class="auth-input dis" type="text" value="<?php echo $persona->email; ?>" name="correo" maxlength="11" required></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="instruccion">Grado de Instrucci&oacute;n:</label> <br>
			<input class="auth-input dis" type="text" value="<?php echo $persona->nivel_instruccion; ?>" name="correo" maxlength="11" required></input>
		
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="estudio">&iquest;Estudia actualmente?</label><br>
			<?php if($persona->estudia_act == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->estudia_act' readonly/><br><br>";
			}else{
				echo "<input class='auth-input dis' type='text' value='$persona->estudia_act' readonly/><br><br>";
				echo "Nombre de la instituci&oacute;n:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->nombre_inst' readonly/><br><br>";	
				echo "&iquest;Qu&eacute; est&aacute; estudiando?<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->grado' readonly/><br><br>";	
				echo "Tipo de Instituci&oacute;n:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->tipo_inst' readonly/><br><br>";					
			}
			?>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="mision">Estudio en las Misiones Educativas:</label><br>
			<?php if($persona->estudia_mision == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->estudia_mision' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->estudia_mision</textarea><br><br>";
			}
			?>			
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="estudiar">Le gustar&iacute;a estudiar:</label><br>
			<?php if($persona->gustaria_estudiar == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->gustaria_estudiar' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->gustaria_estudiar</textarea><br><br>";
			}
			?>			
		</p>
	</div>
	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="movimiento">Usted participa en Movimientos u Organizaciones de Mujeres:</label><br>
			<?php if($persona->participa_org_mujeres == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->participa_org_mujeres' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->participa_org_mujeres</textarea><br><br>";
				echo "A&ntilde;os de Militancia:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->anios_militancia' readonly/><br><br>";	
				echo "Responsabilidad:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->responsabilidad' readonly/><br><br>";
			}
			?>	
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="partido">Usted pertenece a un Partido Pol&iacute;tico:</label><br>
			<?php if($persona->participa_part_politico == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->participa_part_politico' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->participa_part_politico</textarea><br><br>";
				echo "A&ntilde;os de Militancia:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->anios_militancia_pp' readonly/><br><br>";	
				echo "Responsabilidad:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->responsabilidad_pp' readonly/><br><br>";
			}
			?>	
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="concejoC">Usted pertenece a un Cosejo Comunal:</label><br>
			<?php if($persona->concejo_comunal == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->concejo_comunal' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->concejo_comunal</textarea><br><br>";
				echo "Ejerce Voceria dentro del Consejo Comunal:<br>";
				echo "<input class='auth-input dis' type='text' value='$persona->voceria_cc' readonly/><br><br>";
			}
			?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="instTrabajo">Beneficiaria de la Misión Madres del Barrio: </label><br>
			<?php if($persona->beneficiaria == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->beneficiaria' readonly/><br><br>";
			}else{
				echo "<textarea class='auth-input dis auth-textarea' type='text' value='' name='cualMision'>$persona->beneficiaria</textarea><br><br>";
				echo "Pertenece a un Comité de Madres del Barrio: <br>";
				if($persona->comite == "No"){
				echo "<input class='auth-input dis' type='text' value='$persona->comite' readonly/><br><br>";
				}else{
				echo "<input class='auth-input dis' type='text' value='$persona->comite' readonly/><br><br>";
				echo "Responsabilidad: <br>";
				echo "<input class='auth-input dis' type='text' value='$persona->responsabilidad' readonly/><br><br>";
				}
			}
			?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="cargo">Pertenece a un proyecto socio-productivo: </label><br>
			<input Class="auth-input dis" type="text" value="<?php echo $persona->proy_socio_productivo; ?>" readonly></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telOficina">Pertenece a un frente de comites de Madres del Barrio: </label><br>
			<input Class="auth-input dis" type="text" value="<?php echo $persona->frente_comites; ?>" readonly></input>
		</p>
	</div>
</div>