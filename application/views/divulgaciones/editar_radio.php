<script>
$(document).ready(function(e){
	$("#horaR").timepicker();
});
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
<h1>Editar Divulgacion Radio</h1>
<hr>
<div class="auth-form">

    <?php
      $d=array('name' => 'form');
      echo form_open(base_url().'api/divulgaciones_api/updateRadio',$d);
   ?>
	<input type="hidden" name="id" value="<?php echo $info->id_divulgacion_radio; ?>">
	<p>
		<label style="font-size: 12px;" for="emisora">Emisora:</label><br>
		<input id="emisora" onkeypress="return soloLetras(event)" required class="auth-input" type="text" value="<?php echo $info->emisora; ?>" name="emisora" ></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="dial">Dial:</label><br>
		<input id="dial" onkeypress="return soloNumeros(event)" required class="auth-input" type="text" value="<?php echo $info->dial; ?>" name="dial" ></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="hora">Hora de emision:</label><br>
		<input id="horaR" class="auth-input" required readonly type="text" value="<?php echo $info->hora; ?>" name="horaR" ></input>
	</p>

	<p>
		<label style="font-size: 12px;" for="tDiv">Tipo de Divulgacion:</label><br>
		<select id="tipDiv" class="auth-input" name="tipDiv" style="max-width: 300px !important; text-align: center;">
			<option value="<?php echo $info->tipo_divulgacion_radio; ?>" selected><?php echo $info->nombre; ?></option>
			<?php 
				
				foreach ($otros_radios as $radio) {
					echo "<option value='$radio->id_tipo_divulgacion'>$radio->nombre</option>";
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