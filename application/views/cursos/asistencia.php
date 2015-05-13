<h1>Cargar Asistencia de Curso</h1>
<hr>
<div class="auth-form" ng-app="cursos">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/cursos_api/saveAsis',$d);
?>
<script>
$(document).ready(function(){

	$("#inispan").show();
	
	$("#fechaini").datepicker();
	
	$(".loader").hide();
	
	$("#fechaini").change(function () {
		
			fechaini = $("#fechaini").val();
			
			if(fechaini){
				$("#inispan").hide();
			}else{
				$("#inispan").show();
			}
	});
	
	$("#curso").change(function () {
	
		$(".loader").show();
	
		$("#ds").remove();
		
		$("#curso option:selected").each(function(){
			curso = $("#curso").val();
			
			$.ajax({
				url: 'Cursos/getInscritos/' + curso,
				success: function(data) {
					
					$("#result").html(data);
					$(".loader").hide("slow");
				}
			});
		});
		
	});
	

});
</script>

<div class="col-lg-6">
	<p>
		<label for="fecha">Fecha:</label><br>
		<input name="fechaini"class="auth-input" type="text" id="fechaini" readonly required>
		<span id="inispan" style="color:red; font-size:12px"><br>* Este campo es obligatorio</span>
	</p>
   <p>
         <label for="curso">Curso:</label><br>
         <select id="curso" name="curso" placeholder="Seleccione un curso" class="demo-default" required>
			 <option value="">Seleccione un curso</option>
			 <?php foreach($cursos as $row){ 
				echo "<option value='".$row->id_curso."_".$row->id_estado."'>$row->nombre ($row->estado) </option>";
			 }             
			 ?>
       </select>
		<script>
			$('#curso').selectize({
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
         <label for="duracion">Horas Impartidas:</label><br>
         <input id="duracion" ng-model="duracion" class="auth-input" type="text" value="" name="duracion" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

</div>
<div class="col-lg-6" style="min-height: 200px;" id="result">
<div class="loader"></div>
</div>
<div class="col-lg-12">
 <p>
	<input type="submit" class="auth-button .btn-danger go" ng-disabled="form.$invalid" value="Agregar"></input>
</p>
</div>
<?php echo form_close(); ?>

</div>