<h1>Editar Divulgacion Prensa</h1>
<hr>
<script>
$(document).ready(function(e){

	$("#fecha").datepicker();
	
	});
function getPrensa(value) {

			var sep = value.id.split('_');

			$.post("index.php/api/Divulgaciones_api/getPrensa", {
				prensa: value.value
			}, function (data) {
				$("#tipDivPrensaSel_" + sep[1]).html(data);
			});

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
</script>
<div class="auth-form">

    <?php
      $d=array('name' => 'form');
      echo form_open(base_url().'api/divulgaciones_api/updatePrensa',$d);
   ?>
	<input type="hidden" name="id" value="<?php echo $info->id_divulgacion_prensa; ?>">
	<p>
		<label style="font-size: 12px;" for="nombre">Nombre del Medio:</label><br>
		<input id="nombrePrensa" onkeypress="return soloLetras(event)" class="auth-input" required type="text" value="<?php echo $info->nombre_prensa; ?>" name="nombrePrensa" required></input>
	</p>
	<?php 
		$fecha = $info->fecha_prensa;
		$newFecha = explode("-",$fecha);
		$fechaFormat = $newFecha[2]."-".$newFecha[1]."-".$newFecha[0];
	?>
	<p>
		<label style="font-size: 12px;" for="nombre">Fecha de la Noticia:</label><br>
		<input name="fecha"class="auth-input" value="<?php echo $fechaFormat; ?>" type="text" id="fecha" readonly required>
	</p>

	<p>
		<label style="font-size: 12px;">Tipo de Divulgacion:</label><br>
		<select onchange="getPrensa(tipDivPrensa_1)" id="tipDivPrensa_1" class="auth-input" name="tipDivPrensa" required>
			<?php if($info->medio == 'fisica'){ ?>
				<option value="fisica" selected>Fisica </option>
				<option value="digital">Digital </option>
			<?php }elseif($info->medio == 'digital'){ ?>
				<option value="fisica">Fisica </option>
				<option value="digital" selected>Digital </option>	
			<?php } ?>
		</select>
	</p>

	<p>
		<label style="font-size: 12px;">Seleccione:</label><br>
		<select id="tipDivPrensaSel_1" class="auth-input" name="tipDivPrensaSel" required>
			<option value="<?php echo $info->tipo_divulgacion_prensa; ?>" selected><?php echo $info->nombre; ?></option>
			<?php 
				
				foreach ($otros_formatos as $prensa) {
					echo "<option value='$prensa->id_tipo_divulgacion'>$prensa->nombre</option>";
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