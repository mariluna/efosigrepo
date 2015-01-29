<script>
$(document).ready(function(e){

		$("#fecha").datepicker();

});
</script>
<h1>Agregar Actividad</h1>
<hr>
<div class="auth-form" ng-app="actividades">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/actividades_api/save',$d);
?>
<div class="col-lg-6">
   <p>
   
     <label for="titulo">Titulo:</label><br>
         <input id="titulo" ng-model="titulo" class="auth-input" type="text" value="" name="titulo" required></input>
         <span style="color:red; font-size:12px" ng-show="form.titulo.$error.required"><br>* Este campo es obligatorio</span>
         
   </p>

   <p>
       <label for="desc">Descripcion de Actividad:</label><br>
         <textarea id="desc" ng-model="desc" class="auth-input auth-textarea" type="text" value="" name="desc" rows="2" required></textarea>
         <span style="color:red; font-size:12px" ng-show="form.desc.$error.required"><br>* Este campo es obligatorio</span>

   </p>
</div>
<div class="col-lg-6">
   <p>
         <label for="user">Creado por:</label><br>
         <input id="user" ng-model="user" class="auth-input dis" type="text" value="" name="user" readonly placeholder="<?php echo $actividad->first_name ?>"></input>
   </p>

   <p>
       <label for="fecha">Fecha:</label><br>
         <input id="fecha" ng-model="fecha" class="auth-input" type="text" value="" name="fecha" readonly></input>
         <span style="color:red; font-size:12px" ng-show="form.fecha.$error.required"><br>* Este campo es obligatorio</span>
         
   </p>
</div>
<div class="col-lg-12">
 <p>
	<input type="submit" class="auth-button .btn-danger go" ng-disabled="form.$invalid" value="Agregar" name="submit"></input>
</p>
<p>
<a class="auth-button .btn-danger back" href="<?php echo base_url()?>actividades">Volver</a>
</p>
</div>
<?php echo form_close(); ?>

</div>