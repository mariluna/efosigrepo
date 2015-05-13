<script>
$(document).ready(function(e){

		$("#fecha").datepicker(
		{
			minDate: 'today',
		});

});


 function soloLetrasYNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " �����abcdefghijklmn�opqrstuvwxyz1234567890";
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
<h1>Editar Agenda</h1>
<hr>
<div class="auth-form" ng-controller="agendasController as uni" ng-app="agendas">

	<?php
	    $d=array('name' => 'form');
		echo form_open(base_url().'api/agendas_api/update',$d);
		
	?>
	<input type="hidden" name="id" value="<?php echo $data[0]->id_actividad; ?>">
	<div class="col-lg-6">
	   <p>
			<label for="titulo">Titulo:</label><br>
			<input id="titulo" required class="auth-input" onkeypress="return soloLetrasYNumeros(event)" maxlength="20" type="text" value="<?php echo $data[0]->titulo; ?>" name="titulo" ></input>

	   </p>

	   <p>
			<label for="desc">Descripcion de Actividad:</label><br>
			<textarea id="desc" class="auth-input auth-textarea" maxlength="300"  type="text" value="" name="desc"required><?php  echo $data[0]->descripcion; ?></textarea>
	  </p>	   
	</div>
	<div class="col-lg-6">
		<p>
		   <label for="user">Creado por:</label><br>
			<input id="user" class="auth-input dis" disabled type="text" value="<?php  echo $data[0]->name; ?>" name="user"required></input>

	   </p>
	   <p>
			<label for="fecha">Fecha:</label><br>
			<input id="fecha" required readonly class="auth-input dis" type="text" value="<?php echo $data[0]->fecha; ?>" name="fecha" rows="2"></input>
		</p>
		
	</div>
	
	<div class="col-lg-12">
		<p>
			 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
		</p>

	   <?php echo form_close(); ?>
		<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>agendas">Volver</a>
	</div>
</div>