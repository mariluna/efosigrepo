<h1>Ver Actividades</h1>
<hr>
<div class="auth-form" ng-controller="cursosController as uni" ng-app="cursos">
	<div class="col-lg-6">
	   <p>
			 <label for="creado">Creado Por:</label><br>
			 <input id="creado" class="auth-input dis" type="text" value="" name="creado" rows="2" readonly placeholder="<?php  echo $data[0]->name; ?>"/>
	   </p>

	   <p>
			 <label for="creado">Titulo:</label><br>
			 <input id="creado" class="auth-input dis" type="text" value="" name="titulo" readonly required placeholder="<?php  echo $data[0]->titulo; ?>"></input>
	   </p>
</div>
<div class="col-lg-6">
	   <p>
			 <label for="desc">Descripcion:</label><br>
			 <input id="desc" class="auth-input dis" type="text" value="" name="desc" readonly required placeholder="<?php  echo $data[0]->descripcion; ?>"></input>

	   </p>
	   
	   <p>
			 <label for="fecha">Fecha:</label><br>
			 <input id="fecha" class="auth-input dis" type="text" value="" name="fecha" readonly required placeholder="<?php  echo $data[0]->fecha; ?>"></input>
	   </p>
	</div>
	
	<div class="col-lg-12">
		<p>
			 <input ng-click="edit(<?php echo $data[0]->id_actividad; ?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
		</p>

		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>actividades">Volver</a>
	</div>
</div>