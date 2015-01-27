<h1>Editar Actividad</h1>
<hr>
<div class="auth-form" ng-controller="actividadesController as uni" ng-app="actividades">

	<?php
	    $d=array('name' => 'form');
		echo form_open(base_url().'api/actividades_api/update',$d);
		print_r($data);
	?>
	<input type="hidden" name="id" value="<?php echo $data[0]->id_actividad; ?>">
	<div class="col-lg-6">
	   <p>
			<label for="titulo">Titulo:</label><br>
			<input id="titulo" required class="auth-input " type="text" value="<?php echo $data[0]->titulo; ?>" name="titulo" ></input>

	   </p>

	   <p>
			<label for="desc">Descripcion de Actividad:</label><br>
			<textarea id="desc" class="auth-input auth-textarea" type="text" value="" name="desc"required><?php  echo $data[0]->descripcion; ?></textarea>
	  
	  </p>

	   
	</div>
	
	<div class="col-lg-6">
		<p>
		   <label for="user">Creado por:</label><br>
			<input id="user" class="auth-input dis" type="text" value="<?php  echo $data[0]->name; ?>" name="user"required></input>

	   </p>
	   <p>
			<label for="fecha">Fecha:</label><br>
			<input id="fecha" required class="auth-input " type="text" value="<?php echo $data[0]->fecha; ?>" name="fecha" rows="2"></input>
		</p>
		
	</div>
	
	<div class="col-lg-12">
		<p>
			 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
		</p>

	   <?php echo form_close(); ?>
		<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>actividades">Volver</a>
	</div>
</div>