<script>
$(document).ready(function(){
	$("#durspan").hide();
	$("#parspan").hide();

	$(".go").click(function(e){

		duracion = $("#duracion").val();
		participantes = $("#participantes").val();

		if (duracion < 1){
			$("#durspan").show();
			$(".fix-back").hide();
			e.preventDefault();
		} else {
			$("#durspan").hide();
			$(".fix-back").show();
		}

		if (participantes < 1){
			$("#parspan").show();
			$(".fix-back").hide();
			e.preventDefault();
		} else {
			$("#parspan").hide();
			$(".fix-back").show();
		}
	});
});

</script>
<h1>Editar Curso</h1>
<hr>
<div class="auth-form" ng-controller="cursosController as uni" ng-app="cursos">

	<?php
	    $d=array('name' => 'form');
		echo form_open(base_url().'api/cursos_api/update',$d);
	?>
	<input type="hidden" name="id" value="<?php echo $data->id_curso; ?>">
	<div class="col-lg-6">
	   <p>
			<label for="nombre">Nombre del Curso:</label><br>
			<textarea id="nombre" required class="auth-input auth-textarea" type="text" name="nombre" rows="2"><?php echo $data->nombre; ?></textarea>

	   </p>

	   <p>
			<label for="duracion">Duraci&oacute;n (Horas):</label><br>
			<input id="duracion" class="auth-input" type="number" value="<?php  echo $data->duracion; ?>" name="duracion"required integer></input>
			<span id="durspan" style="color:red; font-size:12px"><br>* Este campo debe ser un numero entero</span>

	  
	  </p>

	   <p>
		   <label for="participantes">Participantes:</label><br>
			<input id="participantes" class="auth-input" type="number" value="<?php  echo $data->nro_participantes; ?>" name="participantes"required></input>
			<span id="parspan" style="color:red; font-size:12px"><br>* Este campo debe ser un numero entero</span>

	   </p>
	</div>
	
	<div class="col-lg-6">

	   <p>
			<label for="estado">Estado:</label><br>
			<select class="auth-input" name="estado" style="max-width: 300px !important; text-align: center; text-transform:uppercase;" required>
			<option selected value="<?php echo $data->id_estado; ?>"><?php echo $estado->nombre; ?> </option>
			 <?php 
				foreach($list as $key){
						 
						echo "<option value='".$key->id_estado."'>".$key->nombre."</option>";
			
					}
			 ?>
			 </select>
		</p>
		
		<p>
       <label for="estatus">Estatus:</label><br>
	   <?php if ($data->status == 1){ ?>
        <div class="switch">
          <input type="radio" class="switch-input" name="estatus" value="1" id="est1" checked required>
          <label for="est1" class="switch-label switch-label-off" >On</label>
          <input type="radio" class="switch-input" name="estatus" value="0" id="est0" required>
          <label for="est0" class="switch-label switch-label-on" >Off</label>
          <span class="switch-selection"></span>
        </div>
		<?php }else{ ?>
		 <div class="switch">
          <input type="radio" class="switch-input" name="estatus" value="1" id="est1" required>
          <label for="est1" class="switch-label switch-label-off" >On</label>
          <input type="radio" class="switch-input" name="estatus" value="0" id="est0" checked required>
          <label for="est0" class="switch-label switch-label-on" >Off</label>
          <span class="switch-selection"></span>
        </div>
		<?php } ?>
		
   </p>
	</div>
	
	<div class="col-lg-12">
		<p>
			 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
		</p>

	   <?php echo form_close(); ?>
		<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>Biblioteca">Volver</a>
	</div>
</div>