<script>
function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<h1>Agregar Curso</h1>
<div id="message"> </div>
<hr>
<div class="auth-form" ng-app="cursos">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/cursos_api/save',$d);
?>
<script>
$(document).ready(function(e){
	
	$("#inispan").show();
	$("#finspan").show();
	$("#fechaini").datepicker({ 
								minDate:"today",
								yearRange: "-0:+5"
							});
	$("#fechafin").datepicker({ 
								minDate:"today",
								yearRange: "-0:+5"
							});
	
	$("#fechaini").change(function () {
		
			fechaini = $("#fechaini").val();
			
			if(fechaini){
				$("#inispan").hide();
			}else{
				$("#inispan").show();
			}
	});
	
	$("#fechafin").change(function () {
		
			fechafin = $("#fechafin").val();
			
			if(fechafin){
				$("#finspan").hide();
			}else{
				$("#finspan").show();
			}
	});
});

function validarFecha(e){
	var Fini = document.getElementById('fechaini').value;
	if(e.value < Fini){
		document.getElementById('fechafin').value = "";
		$("#message").append('<div class="alert alert-danger info" role="alert">'+
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
						'<span class="sr-only">Error:</span> La fecha final no puede ser menor a la fecha de inicio'+
						'<span class="glyphicon glyphicon-remove close" aria-hidden="true" id="quita" onclick="quitar()"></span></div>');
	}
}
function quitar(){
	$('.alert').remove();
}
</script>
<div class="col-lg-6">
   <p>
         <label for="nombre">Nombre del curso:</label><br>
         <textarea id="nombre" ng-model="nombre" class="auth-input auth-textarea" type="text" value="" name="nombre" rows="2" required></textarea>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>
   <p>
         <label for="duracion">Duraci&oacute;n (Horas):</label><br>
         <input id="duracion" ng-model="duracion" class="auth-input" type="text" value="" name="duracion" onkeypress="return soloNumeros(event)" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>   
	<p>
		<label for="fecha">Fecha de Inicio:</label><br>
		<input name="fechaini"class="auth-input" type="text" id="fechaini" readonly required>
		<span id="inispan" style="color:red; font-size:12px"><br>* Este campo es obligatorio</span>
	</p>
	<p>
		<label for="fecha">Fecha de Fin:</label><br>
		<input name="fechafin" class="auth-input" type="text" id="fechafin" onchange="validarFecha(this)" readonly required>
		<span id="finspan" style="color:red; font-size:12px"><br>* Este campo es obligatorio</span>
	</p>
</div>
<div class="col-lg-6">
	<p align="center">
		<label for="facilitador">Facilitador del Curso:</label><br>
		<select id="facilitador" class="demo-default" required name="facilitador" required>
			<option value="">Seleccione..</option>
				<?php 
					foreach($facilitadores as $key){
						echo "<option value='".$key->id_persona."'>".$key->nombre_apellido."</option>";			
					}
				?>	
		</select>
		<script>
			$('#facilitador').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		</script>
	</p>
   <p>
         <label for="participantes">N&uacute;mero de Participantes del Curso:</label><br>
         <input id="participantes" ng-model="participantes" class="auth-input" type="text" value="" name="participantes" onkeypress="return soloNumeros(event)" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

   <p>
       <label for="estado">Estado:</label><br>
       <select name="estado[]" class="auth-input" style="max-width: 300px ! important; height: 100%; max-height: 266px;" required multiple>
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