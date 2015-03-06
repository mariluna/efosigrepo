<script>
$(document).ready(function(e){
	$("#horatv").timepicker();
});
function soloLetrasYNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
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
<h1>Editar Divulgacion Televisi&oacute;n</h1>
<hr>
<div class="auth-form">

    <?php
      $d=array('name' => 'form');
      echo form_open(base_url().'api/divulgaciones_api/updateTv',$d);
   ?>
	<input type="hidden" name="id" value="<?php echo $info->id_divulgacion_tv; ?>">
	<p>
		<label style="font-size: 12px;" for="nomTv">Nombre del programa:</label><br>
		<input id="nombreTv" class="auth-input" onkeypress="return soloLetrasYNumeros(event)" type="text" required value="<?php echo $info->nombre_programa; ?>" name="nombreTv"></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="canal">Canal:</label><br>
		<input id="canal" class="auth-input" type="text" onkeypress="return soloLetrasYNumeros(event)" required value="<?php echo $info->canal; ?>" name="canal"></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="horaTv">Hora del Programa:</label><br>
		<input id="horatv" class="auth-input" type="text" required readonly value="<?php echo $info->hora_emision; ?>" name="horatv" ></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="divT">Tipo de Divulgacion:</label><br>
		<select id="tipDivTv" class="auth-input" name="tipDivTv" style="max-width: 300px !important; text-align: center;">
			<option value="<?php echo $info->tipo_divulgacion_tv; ?>" selected><?php echo $info->nombre; ?></option>
			<?php 
				foreach ($otros_tvs as $tv) {
					echo "<option value='$tv->id_tipo_divulgacion'>$tv->nombre</option>";
				}
			
			?>
		</select>
	</p>

	<p>
		 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
	</p>

   <?php echo form_close(); ?>
	<a class="auth-but-fix .btn-success fix-back" style="margin-top: -48px !important;" href="<?php echo base_url()?>Divulgaciones/ver/<?php echo $_GET["p"] ?>">Volver</a>
</div>