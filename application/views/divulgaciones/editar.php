<h1>Editar Divulgacion</h1>
<hr>
<div class="auth-form" ng-controller="cursosController" ng-app="cursos">

    <?php
      $d=array('name' => 'form');
      echo form_open(base_url().'api/cursos_api/update',$d);
   ?>
         <input type="hidden" name="id" value="<?php echo $id; ?>">
   <p>
         <label for="nombre">Nombre del Ente:</label><br>
         <textarea id="nombre" ng-model="nombre" class="auth-input auth-textarea" type="text" value="<?php echo $nombre; ?>" name="nombre" rows="2" placeholder="<?php echo $nombre; ?>" required></textarea>
         <span style="color:#5CB85C; font-size:12px; font-weight: bold;"><br>* Se muestra el nombre del ente, escriba los cambios</span>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>

   <p>
         <label for="abrev">Abreviatura:</label><br>
         <input id="abrev" ng-model="abrev" class="auth-input" type="text" value="<?php echo $abrev; ?>" name="abrev" placeholder="<?php echo $abrev; ?>" required></input>
         <span style="color:#5CB85C; font-size:12px; font-weight: bold;"><br>* Se muestra la abreviatura del ente, escriba los cambios</span>
         <span style="color:red; font-size:12px" ng-show="form.abrev.$error.required"><br>* Este campo es obligatorio</span>
   </p>

   <p>
       <label for="estatus">Estatus:</label><br>
       <div class="btn-group btn-toggle" data-toggle="buttons">
          <label class="btn btn-success on-btn" >
             <input name="estatus" value="1" type="radio" required> Activo
          </label>

          <label class="btn btn-default off-btn">
             <input name="estatus" value="0" type="radio" required> Inactivo
          </label>
         </div>
   </p>

   <p>
       <label for="tramite">Tramite:</label><br>
       <div class="btn-group btn-toggle" data-toggle="buttons">
          <label class="btn btn-success on-btn" >
             <input name="tramite" value="1" type="radio" required> Activo
          </label>

          <label class="btn btn-default off-btn">
             <input name="tramite" value="0" type="radio" required> Inactivo
          </label>
         </div>
   </p>

   <p>
       <label for="distribucion">Distribuci&oacute;n:</label><br>
       <div class="btn-group btn-toggle" data-toggle="buttons">
          <label class="btn btn-success on-btn" >
             <input name="distribucion" value="1" type="radio" required> Activo
          </label>

          <label class="btn btn-default off-btn">
             <input name="distribucion" value="0" type="radio" required> Inactivo
          </label>
         </div>
   </p>

   <p>
         <label for="observaciones">Observaciones:</label><br>
         <textarea id="observaciones" class="auth-input auth-textarea" type="text" value="" name="observaciones" rows="2"><?php echo $observaciones; ?></textarea>
   </p>

	<p>
		 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
	</p>

   <?php echo form_close(); ?>
	<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>entes">Volver</a>
</div>