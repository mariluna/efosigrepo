<h1>Agregar Curso</h1>
<hr>
<div class="auth-form" ng-app="cursos">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/cursos_api/save',$d);
?>
<div class="col-lg-6">
   <p>
         <label for="nombre">Nombre del curso:</label><br>
         <textarea id="nombre" ng-model="nombre" class="auth-input auth-textarea" type="text" value="" name="nombre" rows="2" required></textarea>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>

   <p>
         <label for="duracion">Duraci&oacute;n (Horas):</label><br>
         <input id="duracion" ng-model="duracion" class="auth-input" type="text" value="" name="duracion" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>
</div>
<div class="col-lg-6">
   <p>
         <label for="participantes">Participantes del Curso:</label><br>
         <input id="participantes" ng-model="participantes" class="auth-input" type="text" value="" name="participantes" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

   <p>
       <label for="estado">Estado:</label><br>
       <select name="estado" class="auth-input" style="max-width: 300px !important; text-align: center;" required>
	   <option value="">Seleccione</option>
         <?php foreach($estado as $row){ 
			echo "<option value='$row->id_estado'>$row->nombre</option>";
		 }             
         ?>
       </select>
         <span style="color:red; font-size:12px" ng-show="form.estado.$error.required"><br>* Este campo es obligatorio</span>
   </p>
</div>
<div class="col-lg-12">
 <p>
	<input type="submit" class="auth-button .btn-danger go" ng-disabled="form.$invalid" value="Agregar" name="submit"></input>
</p>
<p>
<a class="auth-button .btn-danger back" href="<?php echo base_url()?>cursos">Volver</a>
</p>
</div>
<?php echo form_close(); ?>

</div>