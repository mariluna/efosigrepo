<h1>Descargar Asistencia de Curso</h1>
<hr>
<div class="auth-form" ng-app="cursos">
<script>
$(document).ready(function(){

	$("#inispang").show();
	
	$("#finispang").show();
	
	$("#fechainig").datepicker();
	
	$("#fechafinig").datepicker();
	
	$(".loader").hide();
	
	$(".detallado").hide();
	
	$("#fechainig").change(function () {
		
			fechainig = $("#fechainig").val();
			
			if(fechainig){
				$("#inispang").hide();
			}else{
				$("#inispang").show();
			}
	});
	
	$("#fechafinig").change(function () {
		
			fechafinig = $("#fechafinig").val();
			
			if(fechafinig){
				$("#finispang").hide();
			}else{
				$("#finispang").show();
			}
	});
	
	$("#cursog").change(function () {
	
		$(".loader").show();
	
		$("#ds").remove();
		
		$("#cursog option:selected").each(function(){
			curso = $("#cursog").val();
			
			$.ajax({
				url: 'Cursos/getInscritos/' + curso,
				success: function(data) {
					
					$("#result").html(data);
					$(".loader").hide("slow");
				}
			});
		});
		
	});	

	$("#reporteg").click(function () {
	
		$(".general").show("slow");
		$(".detallado").hide();
				
	});	
	
	$("#reported").click(function () {
	
		$(".detallado").show("slow");
		$(".general").hide();
		
				
	});	

	$("#cursog").change(function () {
	
		$(".loader").show();
	
		$("#ds").remove();
		
		$("#cursog option:selected").each(function(){
			curso = $("#cursog").val();
			
			$.ajax({
				url: 'Cursos/getInscritos/' + curso,
				success: function(data) {
					
					$("#result").html(data);
					$(".loader").hide("slow");
				}
			});
		});
		
	});		

	$(".submit").click(function (e) {
		var fechaini = $("#fechainig").val();
		var fechafin = $("#fechafinig").val();
		if (fechaini == '') {

			alert('Seleccione una fecha inicial');
			e.preventDefault();
		}
		
		if (fechafin == '') {

			alert('Seleccione una fecha final');
			e.preventDefault();
		}
		
	});		

});
</script>
	<?php $d=array('name' => 'form'); echo form_open(base_url().'Cursos/generarExcel',$d); ?>
		<p>
			<label for="reporte">Tipo:</label><br>
			<input name="reporte" type="radio" id="reporteg" value="general" checked><label for="reporteg">General&nbsp;</label>&nbsp;
			<input name="reporte" type="radio" id="reported" value="detallado"><label for="reported">Detallado&nbsp;</label>
			
		</p>
		<div class="col-lg-6">
		
			<p>
				<label for="fecha">Desde:</label><br>
				<input name="fechainig"class="auth-input" type="text" id="fechainig" readonly required>
				<span id="inispang" style="color:red; font-size:12px"><br>* Este campo es obligatorio</span>
			</p>
			<p>
				<label for="fecha">Hasta:</label><br>
				<input name="fechafinig"class="auth-input" type="text" id="fechafinig" readonly required>
				<span id="finispang" style="color:red; font-size:12px"><br>* Este campo es obligatorio</span>
			</p>
		</div>
		<div class="col-lg-6">
			<div class="general">
			   <p>
					 <label for="cursog">Curso:</label><br>
					 <select id="cursog" name="cursog" placeholder="Seleccione un curso" class="demo-default">
						 <option value="">Seleccione un curso</option>
						 <?php 
							foreach($cursos as $row){ 
								echo "<option value='".$row->id_curso."_".$row->id_estado."'>$row->nombre ($row->estado) </option>";
							}             
						 ?>
				   </select>
					<script>
						$('#cursog').selectize({
							create: false,
							sortField: {
								field: 'text',
								direction: 'asc'
							},
							dropdownParent: 'body'
						});
					</script>
			   </p>
		   </div>
		   <div class="detallado">
			   <p>
					<label class="control-label">Estado:</label><br>
					<select id="estado" name="estado" placeholder="Seleccione" class="demo-default">
						 <option value="">Seleccione un Estado</option>
						 <?php 
							foreach($estados as $row){ 
								echo "<option value='$row->id_estado'>$row->nombre</option>";
							}             
						 ?>
					</select>
					<br>
					<label class="control-label">Curso:</label><br>
					<select id="curso" name="cursod" placeholder="Seleccione un Curso" class="demo-default">
						<option value="">Seleccione un Curso</option>
					</select>
					<script>
						var xhr;
						var select_estado, $select_estado;
						var select_curso, $select_curso;

						$select_estado = $('#estado').selectize({
							onChange: function (value) {
								if (!value.length) return;
								select_curso.disable();
								select_curso.clearOptions();
								select_curso.load(function (callback) {
									xhr && xhr.abort();
									xhr = $.ajax({
										url: 'Cursos/getCurso/' + value,
										success: function (results) {
											select_curso.enable();
											callback(results);
										},
										error: function () {
											callback();
										}
									})
								});
							}
						});

						$select_curso = $('#curso').selectize({
							valueField: 'id_curso',
							labelField: 'nombre',
							searchField:['nombre'],
						});

						select_estado = $select_estado[0].selectize;
						select_curso = $select_curso[0].selectize;

						select_curso.disable();
					</script>
			   </p>
		   </div>
		</div>

	<div class="col-lg-12">
		<p>
			<input type="submit" class="auth-button .btn-danger submit" style="margin-left: 83px; margin-top: -5px;" ng-disabled="form.$invalid" value="Descargar"></input>
		</p>
		<p>
			<a class="auth-button .btn-danger back" href="<?php echo base_url()?>Cursos">Volver</a>
		</p>
	</div>
<?php echo form_close(); ?>

</div>