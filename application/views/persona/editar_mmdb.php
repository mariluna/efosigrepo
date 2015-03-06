<?php
	$fechafin = $persona->fecha_nacimiento;
	$newFechafin = explode("-",$fechafin);
	$fechaFormatfin = $newFechafin[2]."-".$newFechafin[1]."-".$newFechafin[0];
?>
<script>

function mostrar_etnia(){
			$("#etnia2").show("blind");
		}
function ocultar_etnia()
{
	$("#etnia2").hide("blind");
}

function mostrar_discapacidad(){
	$("#discapacidad2").show("blind");
}
function ocultar_discapacidad()
{
	$("#discapacidad2").hide("blind");
}

function mostrar_instruccion(){
	if ($("#instruccion").val()=="Universitario")
	{
		$("#instruccion2").show("blind");
	}else{
		$("#instruccion2").hide("blind");
	}
}

function mostrar_estudio(){
	$("#estudio2").show("blind");
}
function ocultar_estudio()
{
	$("#estudio2").hide("blind");
}

function mostrar_mision(){
	$("#misiones2").show("blind");
}
function ocultar_mision()
{
	$("#misiones2").hide("blind");
}

function mostrar_estudiar(){
	$("#estudiar2").show("blind");
}
function ocultar_estudiar()
{
	$("#estudiar2").hide("blind");
}

function mostrar_movimiento(){
	$("#movimiento2").show("blind");
}
function ocultar_movimiento()
{
	$("#movimiento2").hide("blind");
}

function mostrar_partido(){
	$("#partido2").show("blind");
}
function ocultar_partido()
{
	$("#partido2").hide("blind");
}

function mostrar_concejoC(){
	$("#concejoC2").show("blind");
}
function ocultar_concejoC()
{
	$("#concejoC2").hide("blind");
}

function mostrar_voceria(){
	$("#voceria2").show("blind");
}
function ocultar_voceria()
{
	$("#voceria2").hide("blind");
}

function mostrar_comuna(){
	$("#comuna2").show("blind");
}
function ocultar_comuna()
{
	$("#comuna2").hide("blind");
}

function mostrar_mmdb(){
	$("#mmdb2").show("blind");
}
function ocultar_mmdb()
{
	$("#mmdb2").hide("blind");
}

function mostrar_comite(){
	$("#comite2").show("blind");
}
function ocultar_comite()
{
	$("#comite2").hide("blind");
}

$(document).ready(function(e){

		$('#myWizard').easyWizard();
		$("#etnia2,#discapacidad2,#instruccion2,#estudio2, #misiones2, #estudiar2,#movimiento2,#partido2,#concejoC2,#voceria2, #comuna2 , #mmdb2, #comite2").hide();
		$("#fecha").datepicker();
		
		
		$("#redi").change(function () {
			$("#redi option:selected").each(function(){
				redi = $("#redi").val();
				if (redi){
					$.ajax({
						url: 'index.php/Persona/estado/' + redi,
						success: function(data) {
							$("#est").html(data);
							$("#est").prop("disabled", false);
						},
						error: function() {
							alert('algo malo paso :(');
						}
					});
				} else {
				alert('lleno');
				}
			});
		});	
		
		$("#est").change(function () {
			$("#est option:selected").each(function(){
				estado = $("#est").val();
				$.ajax({
                  url: 'index.php/Persona/municipio/' + estado,
                  success: function(data) {
                    $("#mun").html(data);
					$("#mun").prop("disabled", false);
                  },
                  error: function() {
                    alert('algo malo paso :(');
                  }
                });
			});
		});	
		
		$("#mun").change(function () {
			$("#mun option:selected").each(function(){
				municipio = $("#mun").val();
				$.ajax({
                  url: 'index.php/Persona/parroquia/' + municipio,
                  success: function(data) {
                    $("#par").html(data);
					$("#par").prop("disabled", false);
                  },
                  error: function() {
                    alert('algo malo paso :(');
                  }
                });
			});
		});
});
function quitar(){
	$('.alert').remove();
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
function soloCedula(e){
      if(e.value < 1000000){
		document.getElementById('cedula').value = "";
		$("#message").append('<div class="alert alert-danger info" role="alert">'+
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
						'<span class="sr-only">Error:</span> La cedula introducida es invalida'+
						'<span class="glyphicon glyphicon-remove close" aria-hidden="true" id="quita" onclick="quitar()"></span></div>');
	  }
    }
function soloTelefonoHab(e){
      if(e.value.length < 10){
		document.getElementById('telHab').value = "";
		$("#message").append('<div class="alert alert-danger info" role="alert">'+
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
						'<span class="sr-only">Error:</span> El numero de habitacion debe tener 9 digitos'+
						'<span class="glyphicon glyphicon-remove close" aria-hidden="true" id="quita" onclick="quitar()"></span></div>');
	  }
    }
function soloTelefonoCel(e){
      if(e.value.length < 10){
		document.getElementById('telCel').value = "";
		$("#message").append('<div class="alert alert-danger info" role="alert">'+
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
						'<span class="sr-only">Error:</span> El numero personal debe tener 9 digitos'+
						'<span class="glyphicon glyphicon-remove close" aria-hidden="true" id="quita" onclick="quitar()"></span></div>');
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
function calcularEdad()
{
    var fecha=document.getElementById("fecha").value;
    
        // Si la fecha es correcta, calculamos la edad
        var values=fecha.split("-");
        var dia = values[0];
        var mes = values[1];
        var ano = values[2];
		if(ano == 2015){
			ano = 1935;
		}
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getFullYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
        document.getElementById("edad").value =  edad;
}
</script>
	<?php
		$d=array('name' => 'form', 'id' => 'myWizard');
		echo form_open(base_url().'api/personas_api/updateMMDB',$d);
	?>
<div style="float:right;">
	<a class="auth-button .btn-danger go" href="<?php echo base_url()?>Persona">Volver</a>
	<input type="submit" class="auth-button .btn-danger go" value="Editar" name="submit"></input>
</div>
<h1>Editar Persona MMDB</h1>
<div id="message"> </div>
<hr>

<div class="col-lg-12" ng-app="persona">
	<input type="hidden" name="idper" value="<?php echo $persona->id_persona; ?>">
	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">REDI<br>
		<select class="auth-input"id="redi" name="redi"> 
				<option value="<?php echo $persona->id_redi; ?>" selected><?php echo $persona->redi; ?></option>
				<?php 
					foreach ($otros_red as $redis){
						echo '<option value="'.$redis->id_redi.'">'.$redis->nombre.'</option>'; 
					}
				?>
				</select>
		</p><br>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">ESTADO<br>
			<select class="auth-input" id="est" name="estado"> 
					<option value="<?php echo $persona->id_estado; ?>" selected><?php echo $persona->estado; ?></option>
			</select>
		</p><br>
				
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">MUNICIPIO<br>
			<select class="auth-input" id="mun" name="municipio"> 
				<option value="<?php echo $persona->id_municipio; ?>" selected><?php echo $persona->municipio; ?></option>
			</select>
		</p><br>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">PARROQUIA<br>
			<select class="auth-input" id="par" name="parroquia"> 
				<option value="<?php echo $persona->id_parroquia; ?>" selected><?php echo $persona->parroquia; ?></option>
			</select>
		</p><br>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nombre">Direcci&oacute;n de Habitaci&oacute;n:</label><br>
			<textarea class="auth-input auth-textarea" type="text" value="" name="direccion" rows="2" required><?php echo $persona->direccion; ?></textarea>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nombreApellido">Nombres y Apellidos:</label><br>
			<input class="auth-input" type="text" onkeypress="return soloLetras(event)" value="<?php echo $persona->nombre_apellido; ?>" name="nombreApellido" required></input>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="cedula">C&eacute;dula:</label><br>
			<input id="cedula" class="auth-input" onblur="soloCedula(this)" onkeypress="return soloNumeros(event)"type="text" value="<?php echo $persona->cedula; ?>" name="cedula" maxlength="8" required></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nacionalidad">Nacionalidad: </label><br>
			<?php if($persona->nacionalidad == 'V'){ ?>
				1.V <input type="radio" value="V" name="nacionalidad" checked="checked">&nbsp;
				2.E <input type="radio" value="E" name="nacionalidad"> 
			<?php }else{ ?>
				1.V <input type="radio" value="V" name="nacionalidad">&nbsp;
				2.E <input type="radio" value="E" name="nacionalidad" checked="checked"> 
			<?php } ?>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="edad">Edad:</label><br>
			<input id="edad" class="auth-input dis" readonly disabled type="text" value="<?php echo $persona->edad; ?>" name="edad" maxlength="2" required></input>
		</p>
		<br>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="sexo">Sexo:</label><br>
			<?php if($persona->sexo == "F"){ ?>
				1.F <input type="radio" value="F" name="sexo" checked="checked">&nbsp;
				2.M <input type="radio" value="M" name="sexo">
			<?php }else{ ?>
				1.F <input type="radio" value="F" name="sexo">&nbsp;
				2.M <input type="radio" value="M" name="sexo" checked="checked">
			<?php } ?>
		</p>
		<br>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="fecha">Fecha de Nacimiento:</label><br>
			<input name="fecha"class="auth-input" value="<?php echo $fechaFormatfin; ?>" type="text" id="fecha" readonly>
		</p>
	
	</div>
	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="nroHijos">N&uacute;mero de hijas(os):</label><br>
			<input id="nroHijos" class="auth-input" onkeypress="return soloNumeros(event)"type="text" value="<?php echo $persona->num_hijos; ?>" name="nroHijos" maxlength="2" required></input>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="etnia">¿Pertenece a una etnia?</label><br>
			<?php if($persona->etnia == "No"){ ?>
			1.Si <input type="radio" value="Si" name="etnia" onclick="mostrar_etnia()">&nbsp;
			2.No <input type="radio" value="No" name="etnia" checked="checked" onclick="ocultar_etnia()">
				<div id="etnia2">
					Nombre de Etnia:<br>
					<input type="text" onkeypress="return soloLetras(event)" class="auth-input" name="cualEtnia" maxLength="25">
					<br><br>
					8.1. ¿Domina Idioma?
					<br><br>
					1.Si <input type="radio" value="Si" name="idioma" checked="checked"><br>
					2.No <input type="radio" value="No" name="idioma"> 
				</div>
			<?php }else{ echo "<script>
							$(function(){
							$('#etnia2').show();
							});
							</script>";
			?>
			1.Si <input type="radio" value="Si" name="etnia" onclick="mostrar_etnia()" checked="checked">&nbsp;
			2.No <input type="radio" value="No" name="etnia" onclick="ocultar_etnia()">
				<div id="etnia2">
					Nombre de Etnia:<br>
					<input type="text" onkeypress="return soloLetras(event)" class="auth-input" name="cualEtnia" maxLength="25" value="<?php echo $persona->etnia; ?>">
					<br>
					<?php if($persona->domina_idioma == "Si"){ ?>
						8.1. ¿Domina Idioma?
						<br><br>
						1.Si <input type="radio" value="Si" name="idioma" checked="checked"><br>
						2.No <input type="radio" value="No" name="idioma"> 
					<?php }else{ ?>
						8.1. ¿Domina Idioma?
						<br><br>
						1.Si <input type="radio" value="Si" name="idioma"><br>
						2.No <input type="radio" value="No" name="idioma" checked="checked">
					<?php } ?>
				</div>
			<?php } ?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="discapacidad">&iquest;Presenta alguna discapacidad?</label><br>
			<?php if($persona->discapacidad == "No"){?>
				1.Si <input type="radio" value="Si" name="discapacidad" onclick="mostrar_discapacidad()">&nbsp;
				2.No <input type="radio" value="No" name="discapacidad" checked="checked" onclick="ocultar_discapacidad()">
					<div id="discapacidad2">9.1 Indique tipo de discapacidad:<br>
					<select class="auth-input" name="cualDiscapacidad">
						<option value="Visual">Visual</option>
						<option value="Auditiva">Auditiva</option>
						<option value="Cognitiva">Cognitiva</option>
						<option value="Fisico Motor">F&iacute;sico Motor</option>
					</select> 
					</div>
			<?php }else{ echo "<script>
									$(function(){
										$('#discapacidad2').show();
									});
								</script>";?>
				1.Si <input type="radio" value="Si" name="discapacidad" checked="checked" onclick="mostrar_discapacidad()">&nbsp;
				2.No <input type="radio" value="No" name="discapacidad" onclick="ocultar_discapacidad()">
					<div id="discapacidad2">9.1 Indique tipo de discapacidad:<br>
					<select class="auth-input" name="cualDiscapacidad">
						<option value="Visual" <?php if($persona->discapacidad == "Visual"){ echo "selected";} ?>>Visual</option>
						<option value="Auditiva" <?php if($persona->discapacidad == "Auditiva"){ echo "selected";} ?>>Auditiva</option>
						<option value="Cognitiva" <?php if($persona->discapacidad == "Cognitiva"){ echo "selected";} ?>>Cognitiva</option>
						<option value="Fisico Motor" <?php if($persona->discapacidad == "Fisico Motor"){ echo "selected";} ?>>F&iacute;sico Motor</option>
					</select> 	
					</div>
			<?php }	?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="edoCivil">Estado Civil:</label><br>
			<select name="edoCivil" class="auth-input">
				<option value="Soltera(o)" <?php if($persona->estado_civil== "Soltera(o)"){ echo "selected";}?>>Soltera(o)</option>
				<option value="Casada(o)"<?php if($persona->estado_civil== "Casada(o)"){ echo "selected";}?>>Casada(o)</option>
				<option value="Concubina(o)"<?php if($persona->estado_civil== "Concubina(o)"){ echo "selected";}?>>Concubina(o)</option>
				<option value="Viuda(o)"<?php if($persona->estado_civil== "Viuda(o)"){ echo "selected";}?>>Viuda(o)</option>
				<option value="Divorciada(o)"<?php if($persona->estado_civil== "Divorciada(o)"){ echo "selected";}?>>Divorciada(o)</option>
			</select>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telHab">Tel&eacute;fono de Habitaci&oacute;n:</label><br>
			<input id="telHab" onkeypress="return soloNumeros(event)" onblur="soloTelefonoHab(this)" class="auth-input" type="text" value="<?php echo $persona->tel_local; ?>" name="telHab" maxlength="11" required></input>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telCel">Tel&eacute;fono Celular:</label><br>
			<input id="telCel" onkeypress="return soloNumeros(event)" onblur="soloTelefonoCel" class="auth-input" type="text" value="<?php echo $persona->tel_celular; ?>" name="telCel" maxlength="11" required></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="correo">Correo Electr&oacute;nico:</label><br>
			<input id="correo" class="auth-input" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  type="text" value="<?php echo $persona->email; ?>" name="correo" required></input>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="instruccion">Grado de Instrucci&oacute;n:</label> <br>
			
			<select name="instruccion" id="instruccion" onchange="mostrar_instruccion()" class="auth-input">
						<option value="Sin instruccion" <?php if($persona->nivel_instruccion == "Sin instruccion"){ echo "selected";} ?>>Sin instrucci&oacute;n</option>
						<option value="Primaria incompleta" <?php if($persona->nivel_instruccion == "Primaria incompleta"){ echo "selected";} ?>>Primaria incompleta</option>
						<option value="Primaria completa" <?php if($persona->nivel_instruccion == "Primaria completa"){ echo "selected";} ?>>Primaria Completa</option>
						<option value="Secundaria incompleta" <?php if($persona->nivel_instruccion == "Secundaria incompleta"){ echo "selected";} ?>>Secundaria incompleta</option>
						<option value="Secundaria completa" <?php if($persona->nivel_instruccion == "Secundaria completa"){ echo "selected";} ?>>Secundaria completa</option>
						<option value="Tecnico Medio" <?php if($persona->nivel_instruccion == "Tecnico Medio"){ echo "selected";} ?>>T&eacute;cnico medio</option>
						<option value="Universitario" <?php if($persona->nivel_instruccion == "Universitario"){ echo "selected";echo "<script> 
																																	$(function(){
																																		$('#instruccion2').show();
																																		$('#profesion').val($('#instruccion').val());
																																	});
																																	</script>";} ?>>
																																	Universitario</option>
					</select>
			<div id="instruccion2">
				1.1 Indique profesi&oacute;n: <br>
				<input id="profesion" class="auth-input" type="text" value="" name="profesion" maxlength="50"/>
			</div> 
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="estudio">&iquest;Estudia actualmente?</label><br>
			<?php if($persona->estudia_act == "No"){ ?>
					1.Si <input type="radio" value="Si" name="estudio" onclick="mostrar_estudio()">&nbsp;
					2.No <input type="radio" value="No" name="estudio" checked="checked" onclick="ocultar_estudio()">
						<div id="estudio2">
							2.1.Nombre de la instituci&oacute;n: <br>
							<input id="inst" ng-model="inst" onkeypress="return soloLetras(event)"class="auth-input" type="text" value="" name="inst" maxlength="50"/><br><br>
							2.2.&iquest;Qu&eacute; est&aacute; estudiando? <br>
							<input id="queEstudia" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="queEstudia" maxlength="25"/><br><br>
							2.3.Tipo de Instituci&oacute;n:<br><br>
							1.P&uacute;blica <input type="radio" value="Publica" name="tipoInst" checked="checked">&nbsp;
							2.Privada<input type="radio" value="Privada" name="tipoInst"> 
						</div>
			<?php }else{ echo "<script> 
								$(function(){
									$('#estudio2').show();
								});
								</script>";
								?>
				1.Si <input type="radio" value="Si" name="estudio" checked="checked" onclick="mostrar_estudio()">&nbsp;
				2.No <input type="radio" value="No" name="estudio" onclick="ocultar_estudio()">
					<div id="estudio2">
						2.1.Nombre de la instituci&oacute;n: <br>
						<input id="inst" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="<?php echo $persona->nombre_inst; ?>" name="inst" maxlength="50"/><br><br>
						2.2.&iquest;Qu&eacute; est&aacute; estudiando? <br>
						<input id="queEstudia" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="<?php echo $persona->grado; ?>" name="queEstudia" maxlength="25"/><br><br>
						2.3.Tipo de Instituci&oacute;n:<br><br>
						<?php if($persona->tipo_inst == "Publica"){ ?>
							1.P&uacute;blica <input type="radio" value="Publica" name="tipoInst" checked="checked">&nbsp;
							2.Privada<input type="radio" value="Privada" name="tipoInst"> 
						<?php }else{ ?>
							1.P&uacute;blica <input type="radio" value="Publica" name="tipoInst" >&nbsp;
							2.Privada<input type="radio" value="Privada" name="tipoInst" checked="checked">
							<?php } ?>
					</div>
			
			<?php } ?>
		</p>
		
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="mision">Estudio en las Misiones Educativas:</label><br>
			<?php if($persona->estudia_mision == "No"){ ?>
				1.Si <input type="radio" value="Si" name="mision" onclick="mostrar_mision()">&nbsp;
				2.No <input type="radio" value="No" name="mision" checked="checked" onclick="ocultar_mision()">
					<div id="misiones2">
						3.1.Cu&aacute;l(es):<br>
						<textarea id="cualMision" onkeypress="return soloLetras(event)" class="auth-input auth-textarea" type="text" value="" name="cualMision"></textarea> 
					</div>
			<?php }else{ echo "<script> 
								$(function(){
									$('#cualMision').show();
								});
								</script>";?>	
				1.Si <input type="radio" value="Si" name="mision" checked="checked" onclick="mostrar_mision()">&nbsp;
				2.No <input type="radio" value="No" name="mision" onclick="ocultar_mision()">
					<div id="misiones2">
						3.1.Cu&aacute;l(es):<br>
						<textarea id="cualMision" onkeypress="return soloLetras(event)" class="auth-input auth-textarea" type="text" value="<?php echo $persona->gustaria_estudiar; ?>" name="cualMision"></textarea> 
					</div>
			<?php } ?>		
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="estudiar">Le gustar&iacute;a estudiar:</label><br>
			<?php if($persona->gustaria_estudiar == "No"){ ?>
				1.Si <input type="radio" value="Si" name="estudiar" onclick="mostrar_estudiar()">&nbsp;
				2.No <input type="radio" value="No" name="estudiar" checked="checked" onclick="ocultar_estudiar()">
					<div id="estudiar2">
						4.1.&iquest;Qu&eacute; le gustar&iacute;a estudiar?<br>
						<input id="gustEstudiar" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="gustEstudiar" maxlength="25"></input> 
					</div>	
			<?php }else{ echo "<script> 
								$(function(){
									$('#estudiar2').show();
								});
								</script>";?>	
				1.Si <input type="radio" value="Si" name="estudiar" checked="checked" onclick="mostrar_estudiar()">&nbsp;
				2.No <input type="radio" value="No" name="estudiar" onclick="ocultar_estudiar()">
					<div id="estudiar2">
						4.1.&iquest;Qu&eacute; le gustar&iacute;a estudiar?<br>
						<input id="gustEstudiar" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->gustaria_estudiar; ?>" name="gustEstudiar" maxlength="25"></input> 
					</div>	
			<?php } ?>
		</p>
	</div>
	<div class="col-lg-4" style="text-align:center">
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="movimiento">Usted participa en Movimientos u Organizaciones de Mujeres:</label><br>
			<?php if($persona->participa_org_mujeres == "No"){?>	
				1.Si <input type="radio" value="Si" name="movimiento" onclick="mostrar_movimiento()">&nbsp;
				2.No <input type="radio" value="No" name="movimiento" checked="checked" onclick="ocultar_movimiento()">
					<div id="movimiento2">
						1.1.&iquest;Cu&aacute;l? <br>
						<input id="cualMovimiento" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualMovimiento" maxlength="25"/><br><br> 
						1.2.A&ntilde;os de Militancia: <br>
						<input id="militanciaMov" onkeypress="return soloNumeros(event)" ng-model="militanciaMov" class="auth-input" type="text" value="" name="militanciaMov" maxlength="2"/><br><br>
						<span style="color:red; font-size:12px" ng-show="form.militanciaMov.$error.integer"><br>* Este campo debe ser un numero entero</span>
						1.3.Responsabilidad: <br>
						<input class="auth-input" onkeypress="return soloLetras(event)" type="text" name="responsabilidadMov" maxLength="25" size="20"> <br>
					</div>	
			<?php }else{ echo "<script> 
								$(function(){
									$('#movimiento2').show();
								});
								</script>";?>
				1.Si <input type="radio" value="Si" name="movimiento" checked="checked" onclick="mostrar_movimiento()">&nbsp;
				2.No <input type="radio" value="No" name="movimiento"  onclick="ocultar_movimiento()">
					<div id="movimiento2">
						1.1.&iquest;Cu&aacute;l? <br>
						<input id="cualMovimiento" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->participa_org_mujeres;?>" name="cualMovimiento" maxlength="25"/><br><br> 
						1.2.A&ntilde;os de Militancia: <br>
						<input id="militanciaMov" onkeypress="return soloNumeros(event)" class="auth-input" type="text" value="<?php echo $persona->anios_militancia;?>" name="militanciaMov" maxlength="2"/><br><br>
						1.3.Responsabilidad: <br>
						<input class="auth-input" onkeypress="return soloLetras(event)" type="text" name="responsabilidadMov" value="<?php echo $persona->responsabilidad;?>" maxLength="25" size="20"> <br>
					</div>	
			<?php } ?>
		</p>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="partido">Usted pertenece a un Partido Pol&iacute;tico:</label><br>
			<?php if($persona->participa_part_politico == "No"){?>	
				1.Si <input type="radio" value="Si" name="partido" onclick="mostrar_partido()">&nbsp;
					2.No <input type="radio" value="No" name="partido" checked="checked" onclick="ocultar_partido()">
						<div id="partido2">
						1.1.&iquest;Cu&aacute;l?<br>
						<input id="cualPartido" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualPartido" maxlength="25"/><br><br>
						1.2.A&ntilde;os de Militancia:<br>
						<input id="militanciaPar" onkeypress="return soloNumeros(event)" class="auth-input" type="text" value="" name="militanciaPar" maxlength="2" integer/><br><br>
						1.3.Responsabilidad: <br>
						<input id="responsabilidadPar" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="responsabilidadPar" maxlength="25">
					</div>
				
			<?php }else{ echo "<script> 
								$(function(){
									$('#partido2').show();
								});
								</script>";?>
				1.Si <input type="radio" value="Si" name="partido"  checked="checked" onclick="mostrar_partido()">&nbsp;
					2.No <input type="radio" value="No" name="partido"  onclick="ocultar_partido()">
						<div id="partido2">
						1.1.&iquest;Cu&aacute;l?<br>
						<input id="cualPartido" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->participa_part_politico; ?>" name="cualPartido" maxlength="25"/><br><br>
						1.2.A&ntilde;os de Militancia:<br>
						<input id="militanciaPar" onkeypress="return soloNumeros(event)" class="auth-input" type="text" value="<?php echo $persona->anios_militancia_pp;?>" name="militanciaPar" maxlength="2" integer/><br><br>
						1.3.Responsabilidad: <br>
						<input id="responsabilidadPar" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->responsabilidad_pp;?>" name="responsabilidadPar" maxlength="25">
					</div>
				
			<?php } ?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="concejoC">Usted pertenece a un Cosejo Comunal:</label><br>
			<?php if($persona->concejo_comunal == "No"){ ?>
				1.Si<input type="radio" value="Si" name="concejoC" onclick="mostrar_concejoC()">&nbsp;
				2.No<input type="radio" value="No" name="concejoC" checked="checked" onclick="ocultar_concejoC()">
					<div id="concejoC2">
						3.1.Nombre del Concejo Comunal:<br>
						<input id="nombreConcejoC" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="nombreConcejoC" maxlength="25"/><br><br> 
						3.2.Ejerce una voceria dentro del Consejo Comunal: <br>
						1.Si <input type="radio" value="Si" name="voceria" onclick="mostrar_voceria()">&nbsp;
						2.No <input type="radio" value="No" name="voceria" checked="checked" onclick="ocultar_voceria()"><br>
						<div id="voceria2">
							&iquest;Cu&aacute;l?:<br>
							<input id="cualVoceria" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualVoceria" maxlength="25"/>
						</div><br>
					</div>
			<?php }else{ ?>
				1.Si<input type="radio" value="Si" name="concejoC" checked="checked" onclick="mostrar_concejoC()">&nbsp;
				2.No<input type="radio" value="No" name="concejoC" onclick="ocultar_concejoC()">
					<div id="concejoC2">
						3.1.Nombre del Concejo Comunal:<br>
						<input id="nombreConcejoC" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->concejo_comunal; ?>" name="nombreConcejoC" maxlength="25"/><br><br> 
						3.2.Ejerce una voceria dentro del Consejo Comunal: <br>
						<?php if($persona->voceria_cc == "No"){ ?>
						1.Si <input type="radio" value="Si" name="voceria" onclick="mostrar_voceria()">&nbsp;
						2.No <input type="radio" value="No" name="voceria" checked="checked" onclick="ocultar_voceria()"><br>
						<div id="voceria2">
							&iquest;Cu&aacute;l?:<br>
							<input id="cualVoceria" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualVoceria" maxlength="25"/>
						</div><br>
						<?php }else{ echo "<script> 
								$(function(){
									$('#voceria2').show();
								});
								</script>";?>
						1.Si <input type="radio" value="Si" name="voceria" checked="checked" onclick="mostrar_voceria()">&nbsp;
						2.No <input type="radio" value="No" name="voceria" onclick="ocultar_voceria()"><br>
						<div id="voceria2">
							&iquest;Cu&aacute;l?:<br>
							<input id="cualVoceria" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->voceria_cc; ?>" name="cualVoceria" maxlength="25"/>
						</div><br>
						<?php } ?>
					</div>
			<?php } ?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="instTrabajo">Beneficiaria de la Misión Madres del Barrio: </label><br>
			<?php if($persona->beneficiaria == "No"){ ?>
				1.Si<input type="radio" value="Si" name="mmdb" onclick="mostrar_mmdb()">&nbsp;
				2.No<input type="radio" value="No" name="mmdb" checked="checked" onclick="ocultar_mmdb()">
					<div id="mmdb2">
					1.1.Usted pertenece a un Comit&eacute; de Madres del Barrio: <br>
					1.Si <input type="radio" value="Si" name="comite" onclick="mostrar_comite()">&nbsp;
					2.No <input type="radio" value="No" name="comite" checked="checked" onclick="ocultar_comite()"><br>
						<div id="comite2">
						1.2. Indique el nombre del Comit&eacute;:<br>
						<input id="cualComite" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualComite" maxlength="25"/> <br>
						1.3. Responsabilidad dentro del Comit&eacute;:<br>
						<input id="responsabilidadCom" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="responsabilidadCom" maxLength="25"/>
						</div><br>
					</div>
			<?php }else{ echo "<script> 
								$(function(){
									$('#mmdb2').show();
								});
								</script>";?>
				1.Si<input type="radio" value="Si" name="mmdb" checked="checked" onclick="mostrar_mmdb()">&nbsp;
				2.No<input type="radio" value="No" name="mmdb" onclick="ocultar_mmdb()">
					<div id="mmdb2">
					1.1.Usted pertenece a un Comit&eacute; de Madres del Barrio: <br>
					<?php if($persona->comite == "No"){ ?>
					1.Si <input type="radio" value="Si" name="comite" onclick="mostrar_comite()">&nbsp;
					2.No <input type="radio" value="No" name="comite" checked="checked" onclick="ocultar_comite()"><br>
						<div id="comite2">
						1.2. Indique el nombre del Comit&eacute;:<br>
						<input id="cualComite" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="cualComite" maxlength="25"/> <br>
						1.3. Responsabilidad dentro del Comit&eacute;:<br>
						<input id="responsabilidadCom" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="responsabilidadCom" maxLength="25"/>
						</div><br>
					<?php }else{ ?>
						1.Si <input type="radio" value="Si" name="comite" checked="checked" onclick="mostrar_comite()">&nbsp;
						2.No <input type="radio" value="No" name="comite" onclick="ocultar_comite()"><br>
							<div id="comite2">
							1.2. Indique el nombre del Comit&eacute;:<br>
							<input id="cualComite" onkeypress="return soloLetras(event)"  class="auth-input" type="text" value="<?php echo $persona->comite; ?>" name="cualComite" maxlength="25"/> <br>
							1.3. Responsabilidad dentro del Comit&eacute;:<br>
							<input id="responsabilidadCom" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="<?php echo $persona->respmmdb; ?>" name="responsabilidadCom" maxLength="25"/>
							</div><br>
					<?php } ?>
					</div>
			
			<?php } ?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="cargo">Pertenece a un proyecto socio-productivo: </label><br>
			<?php if($persona->proy_socio_productivo == "No"){ ?>
				1.Si<input type="radio" value="Si" name="socioProd">&nbsp;
				2.No<input type="radio" value="No" name="socioProd" checked="checked">
			<?php }else{ ?>
				1.Si<input type="radio" value="Si" name="socioProd" checked="checked">&nbsp;
				2.No<input type="radio" value="No" name="socioProd" >
			<?php } ?>
		</p>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			<label for="telOficina">Pertenece a un frente de comites de Madres del Barrio: </label><br>
			<?php if($persona->frente_comites == "No"){ ?>
				1.Si<input type="radio" value="Si" name="frenteComite">&nbsp;
				2.No<input type="radio" value="No" name="frenteComite" checked="checked">
			<?php }else{ ?>
				1.Si<input type="radio" value="Si" name="frenteComite" checked="checked">&nbsp;
				2.No<input type="radio" value="No" name="frenteComite" >
			<?php } ?>
		</p>
	</div>
<?php echo form_close(); ?>
</div>