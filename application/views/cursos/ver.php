
<h1>Ver Curso</h1>
<hr>
<?php 
	$rol = $this->ion_auth->get_users_groups()->row();
	
	$fechaini = $data->fecha_inicio;
	$fechafin = $data->fecha_fin;
	$newFechaini = explode("-",$fechaini);
	$newFechafin = explode("-",$fechafin);
	$fechaFormatini = $newFechaini[2]."-".$newFechaini[1]."-".$newFechaini[0];
	$fechaFormatfin = $newFechafin[2]."-".$newFechafin[1]."-".$newFechafin[0];
?>
<div class="auth-form" ng-controller="cursosController as uni" ng-app="cursos">
	<div class="col-lg-6">
	   <p>
			 <label for="nombre">Nombre del Curso:</label><br>
			 <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="nombre" rows="2" readonly placeholder="<?php  echo $data->nombre; ?>"></textarea>
	   </p>

	   <p>
			 <label for="abrev">Duraci&oacute;n (horas):</label><br>
			 <input id="abrev" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php  echo $data->duracion; ?>"></input>
	   </p>

	   <p>
			 <label for="estatus">Participantes:</label><br>
			 <input id="estatus" class="auth-input dis" type="text" value="" name="estatus" readonly required placeholder="<?php  echo $data->nro_participantes; ?>"></input>

	   </p>
	   

	</div>
	<div class="col-lg-6">

	    <p>
			 <label for="tramite">Estado:</label><br>
			 <input id="tramite" class="auth-input dis" type="text" value="" name="tramite" readonly required placeholder="<?php echo $data->estado; ?>"></input>
	   </p>
	   
	   	<p>
			 <label for="distribucion">Estatus:</label><br>
			 <input id="distribucion" class="auth-input dis" type="text" value="" name="distribucion" readonly required placeholder="<?php if($data->status=1){ echo 'Activo';}else{echo 'Inactivo';} ?>"></input>
	   </p>
	   
	   	<p>
			 <label for="ini">Fecha de Inicio:</label><br>
			 <input id="ini" class="auth-input dis" type="text" value="" name="ini" readonly required placeholder="<?php echo $fechaFormatini; ?>"></input>
	   </p>
	   
	   	<p>
			 <label for="fin">Fecha de Fin:</label><br>
			 <input id="fin" class="auth-input dis" type="text" value="" name="fin" readonly required placeholder="<?php echo $fechaFormatfin; ?>"></input>
	   </p>
	</div>
	<div class="col-lg-12">
	<?php if(($rol != null) && ($rol->id == 1)){ ?>
		<p>
			 <input ng-click="edit(<?php echo $data->id_curso; ?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
		</p>
	<?php }else{ ?>
		<p>
			 <input ng-click="register(<?php echo $data->id_curso; ?>)" type="button" class="auth-button .btn-success go" value="Registrar" name="submit"></input>
		</p>
	<?php } ?>
	

		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>Cursos">Volver</a>
	</div>
</div>