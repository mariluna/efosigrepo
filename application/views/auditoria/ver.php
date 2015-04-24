
<h1>Detalle Auditor&iacute;a</h1>
<hr>
<?php 
	$rol = $this->ion_auth->get_users_groups()->row();
	
	/*$fechaini = $data->fecha_inicio;
	$fechafin = $data->fecha_fin;
	$newFechaini = explode("-",$fechaini);
	$newFechafin = explode("-",$fechafin);
	$fechaFormatini = $newFechaini[2]."-".$newFechaini[1]."-".$newFechaini[0];
	$fechaFormatfin = $newFechafin[2]."-".$newFechafin[1]."-".$newFechafin[0];*/
?>
<div class="auth-form" ng-controller="auditoriaController" ng-app="auditoria">
	<div class="col-lg-6">
	   <p>
			 <label for="nombre">Usuario:</label><br>
			 <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="nombre" rows="2" readonly placeholder="<?php echo $data->username; ?>"></textarea>
	   </p>

	   <p>
			 <label for="abrev">Acci&oacute;n:</label><br>
			  <input id="abrev" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php  echo $data->accion; ?>"></input>
	   </p>

	   <p>
			 <label for="estatus">Fecha de edici&oacute;n:</label><br>
			 <input id="estatus" class="auth-input dis" type="text" value="" name="estatus" readonly required placeholder="<?php  echo $data->fecha; ?>"></input>

	   </p>

	   <p>
			 <label for="estatus">Fecha de edici&oacute;n:</label><br>
			 <input id="estatus" class="auth-input dis" type="text" value="" name="estatus" readonly required placeholder="<?php  echo $data->fecha; ?>"></input>

	   </p>



</div>
	 <div class="col-lg-6">

	   <p>
			 <label for="estatus">Tabla Afectada:</label><br>
			 <input id="estatus" class="auth-input dis" type="text" value="" name="estatus" readonly required placeholder="<?php  echo $data->tabla_afectada; ?>"></input>

	   </p>

	   <p>
			 <label for="estatus">Campos Afectados:</label><br>
			 <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="campo_afectado" rows="2" readonly placeholder="<?php  echo $data->campo_afectado; ?>"></textarea>

	   </p>
	   <p>
			 <label for="estatus">Informaci&oacute;n Campos:</label><br>
			  <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="campo_afectado" rows="2" readonly placeholder="<?php  echo $data->informacion_campo; ?>"></textarea>

	   </p>

	</div>
	<div class="col-lg-12">
		<tr>
		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>auditoria">Volver</a>
		
	</div>
</div>