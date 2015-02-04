<h1>Ver Curso</h1>
<hr>
<?php $rol = $this->ion_auth->get_users_groups()->row();?>
<div class="auth-form" ng-controller="cursosController as uni" ng-app="cursos">
	<div class="col-lg-6">
	   <p>
			 <label for="nombre">Nombre del Curso:</label><br>
			 <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="nombre" rows="2" readonly placeholder="<?php  echo $data->nombre; ?>"></textarea>
	   </p>

	   <p>
			 <label for="abrev">Duraci&oacute;n (Semanas):</label><br>
			 <input id="abrev" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php  echo $data->duracion; ?>"></input>
	   </p>

	   <p>
			 <label for="estatus">Participantes:</label><br>
			 <input id="estatus" class="auth-input dis" type="text" value="" name="estatus" readonly required placeholder="<?php  echo $data->nro_participantes; ?>"></input>

	   </p>
	</div>
	<div class="col-lg-6">
	   <p>
			 <label for="distribucion">Estatus:</label><br>
			 <input id="distribucion" class="auth-input dis" type="text" value="" name="distribucion" readonly required placeholder="<?php if($data->status=1){ echo 'Activo';}else{echo 'Inactivo';} ?>"></input>
	   </p>
	   
	    <p>
			 <label for="tramite">Estado:</label><br>
			 <input id="tramite" class="auth-input dis" type="text" value="" name="tramite" readonly required placeholder="<?php echo $data->estado; ?>"></input>
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
	

		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>cursos">Volver</a>
	</div>
</div>