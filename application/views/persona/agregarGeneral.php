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

$(document).ready(function(e){

		$('#myWizard').easyWizard();
		$("#etnia2,#discapacidad2,#instruccion2,#estudio2, #misiones2, #estudiar2,#movimiento2,#partido2,#concejoC2,#voceria2, #comuna2").hide();
		$("#fecha").datepicker({yearRange: "-80:-18"});
		
		
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
		
	captcha = $('#origin').val();
	$('#origin').remove();
	$(".submit").click(function(e){
		if($("#captcha").val() != captcha){
			$("#message").append('<div class="alert alert-danger info" role="alert">'+
						'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
						'<span class="sr-only">Error:</span> El codigo no coincide con la imagen'+
						'<span class="glyphicon glyphicon-remove close" aria-hidden="true" id="quita" onclick="quitar()"></span></div>');
			e.preventDefault();
		}
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
<h1>Agregar Persona General</h1>
<hr>
<div id="message"> </div>
<div class="col-lg-12" ng-app="persona">
	<div class="add-menu">
            <td><a href="<?php echo base_url(); ?>" class="fa fa-arrow-left  btn btn-danger"> Volver </a></td>
    </div>
	<?php
		$d=array('name' => 'form', 'id' => 'myWizard');
		echo form_open(base_url().'api/personas_api/save',$d);
	?>
	<section class="step" data-step-title="Habitaci&oacute;n">
			<div class="col-lg-12" style="text-align:center">
				<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">1. REDI</p><br>
				<select class="auth-input" id="redi" name="redi" required> 
				<option value="">Seleccione una opcion</option>
				<?php 
					foreach ($redi as $redis){
						echo '<option value="'.$redis->id_redi.'">'.$redis->nombre.'</option>'; 
					}
				?>
				</select>
				<br><br>

				<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">2. ESTADO</p><br>
				<select disabled class="auth-input" id="est" name="estado" required> 
				<option value="">Seleccione una opcion</option>
				</select>
				<br><br>
						
				<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">3. MUNICIPIO</p><br>
				<select disabled class="auth-input" id="mun" name="municipio" disabled required> 
				<option value="" selected="selected">Seleccione una opcion</option>
				</select>
				<br><br>

				<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">4. PARROQUIA</p><br>
				<select disabled class="auth-input" id="par" name="parroquia" disabled required> 
				<option value="">Seleccione una opcion</option>
				</select>
				<br><br>

				<p>
					<label for="nombre">5.Direcci&oacute;n de Habitaci&oacute;n:</label><br>
					<textarea id="direccion" ng-model="direccion" class="auth-input auth-textarea" type="text" value="" name="direccion" rows="2" required></textarea>
					<span style="color:red; font-size:12px" ng-show="form.direccion.$error.required"><br>* Este campo es obligatorio</span>
				</p>
			</div>
	    </section>
	    <section class="step" data-step-title="Personales">
			<div class="col-lg-6">
			
				<p>
					<label for="nombreApellido">1.Nombres y Apellidos:</label><br>
					<input id="nombreApellido" ng-model="nombreApellido" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="nombreApellido" maxlength="50" ng-pattern="/[a-zA-Z]/" required></input>
					<span style="color:red; font-size:12px" ng-show="form.nombreApellido.$error.required"><br>* Este campo es obligatorio</span>
					<span style="color:red; font-size:12px" ng-show="form.nombreApellido.$error.pattern"><br>* Este campo debe ser solo letras</span>
				</p>

				<p>
					<label for="cedula">2.C&eacute;dula:</label><br>
					<input id="cedula" onblur="soloCedula(this)" onkeypress="return soloNumeros(event);" ng-model="cedula" class="auth-input" type="text" value="" name="cedula" maxlength="8" required integer></input>
					<span style="color:red; font-size:12px" ng-show="form.cedula.$error.required"><br>* Este campo es obligatorio</span>
					<span style="color:red; font-size:12px" ng-show="form.cedula.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
					<label for="nacionalidad">3.Nacionalidad: </label><br>
					1.V <input type="radio" value="V" name="nacionalidad" checked="checked">&nbsp;
					2.E <input type="radio" value="E" name="nacionalidad"> 
				</p>
				<p>
					<label for="edad">4.Edad:</label><br>
					<input id="edad"  class="auth-input dis" type="text" value="" readonly  name="edad" maxlength="2" integer></input>
					
				</p>

				<p>
					<label for="sexo">5.Sexo:</label><br>
					1.F <input type="radio" value="F" name="sexo" checked="checked">&nbsp;
					2.M <input type="radio" value="M" name="sexo">
				</p>
				<p>
					<label for="fecha">6.Fecha de Nacimiento:</label><br>
					<input  name="fecha"class="auth-input" type="text" id="fecha" readonly required onchange="calcularEdad();">
					<span style="color:red; font-size:12px" ng-show="form.fecha.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				<p>
					<label for="nroHijos">7.N&uacute;mero de hijas(os):</label><br>
					<input id="nroHijos" ng-model="nroHijos" onkeypress="return soloNumeros(event)" value="0" class="auth-input" type="text" name="nroHijos" maxlength="2" required integer></input>
					<span style="color:red; font-size:12px" ng-show="form.nroHijos.$error.required"><br>* Este campo es obligatorio</span>
					<span style="color:red; font-size:12px" ng-show="form.nroHijos.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
			</div>
			<div class="col-lg-6">
				<p>
					<label for="etnia">8.&iquest;Pertenece ud a una etnia?</label><br>
					1.Si <input type="radio" value="Si" name="etnia" onclick="mostrar_etnia()">&nbsp;
					2.No <input type="radio" value="No" name="etnia" checked="checked" onclick="ocultar_etnia()">
					<div id="etnia2">
						Nombre de Etnia:<br>
						<input type="text" onkeypress="return soloLetras(event)" class="auth-input" name="cualEtnia" maxLength="25">
						<br><br>
						8.1. &iquest;Domina Idioma?
						<br><br>
						1.Si <input type="radio" value="Si" name="idioma" checked="checked"><br>
						2.No <input type="radio" value="No" name="idioma"> 
					</div>

				</p>			
				<p>
					<label for="discapacidad">9.&iquest;Presenta alguna discapacidad?</label><br>
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

				</p>
				<p>
					<label for="edoCivil">10.Estado Civil:</label><br>
					<select name="edoCivil" class="auth-input">
						<option value="Soltera(o)">Soltera(o)</option>
						<option value="Casada(o)">Casada(o)</option>
						<option value="Concubina(o)">Concubina(o)</option>
						<option value="Viuda(o)">Viuda(o)</option>
						<option value="Divorciada(o)">Divorciada(o)</option>
					</select>
				</p>
				<p>
					<label for="telHab">11.Tel&eacute;fono de Habitaci&oacute;n:</label><br>
					<input id="telHab" ng-model="telHab" onblur="soloTelefonoHab(this)" onkeypress="return soloNumeros(event)" class="auth-input" type="text" value="" name="telHab" maxlength="11" required integer></input>
					<span style="color:red; font-size:12px" ng-show="form.telHab.$error.required"><br>* Este campo es obligatorio</span>
					<span style="color:red; font-size:12px" ng-show="form.telHab.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
					<label for="telCel">12.Tel&eacute;fono Celular:</label><br>
					<input id="telCel" ng-model="telCel" onblur="soloTelefonoHab(this)" onkeypress="return soloNumeros(event)" class="auth-input" type="text" value="" name="telCel" maxlength="11" required integer></input>
					<span style="color:red; font-size:12px" ng-show="form.telCel.$error.required"><br>* Este campo es obligatorio</span>
					<span style="color:red; font-size:12px" ng-show="form.telCel.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
					<label for="correo">13.Correo Electr&oacute;nico:</label><br>
					<input id="correo" title="Se necesita un correo" ng-model="correo" class="auth-input" type="email" value="" name="correo" maxlength="50" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" ></input>
					<span style="color:red; font-size:12px" ng-show="form.correo.$error.required"><br>* Este campo es obligatorio</span>
				</p>
			</div>
		</section>
		<section class="step" data-step-title="Educativos">
			<div class="col-lg-12" style="text-align:center">
				<p>
					<label for="instruccion">1. Grado de Instrucci&oacute;n:</label> <br>
					<select name="instruccion" id="instruccion" onchange="mostrar_instruccion()" class="auth-input">
						<option value="Sin instruccion">Sin instrucci&oacute;n</option>
						<option value="Primaria incompleta">Primaria incompleta</option>
						<option value="Primaria completa">Primaria Completa</option>
						<option value="Secundaria incompleta">Secundaria incompleta</option>
						<option value="Secundaria completa">Secundaria completa</option>
						<option value="Tecnico Medio">T&eacute;cnico medio</option>
						<option value="Universitario">Universitario</option>
					</select>
					<div id="instruccion2">
						1.1 Indique profesi&oacute;n: <br>
						<input id="profesion" ng-model="profesion" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="profesion" maxlength="30"/>
					</div> 
				</p>
				
				<p>
					<label for="estudio">2.&iquest;Estudia actualmente?</label><br>
					1.Si <input type="radio" value="Si" name="estudio" onclick="mostrar_estudio()">&nbsp;
					2.No <input type="radio" value="No" name="estudio" checked="checked" onclick="ocultar_estudio()">
						<div id="estudio2">
							2.1.Nombre de la instituci&oacute;n: <br>
							<input id="inst" ng-model="inst" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="" name="inst" maxlength="30"/><br><br>
							2.2.&iquest;Qu&eacute; est&aacute; estudiando? <br>
							<input id="queEstudia" class="auth-input" type="text" value="" onkeypress="return soloLetras(event)" name="queEstudia" maxlength="25"/><br><br>
							2.3.Tipo de Instituci&oacute;n:<br><br>
							1.P&uacute;blica <input type="radio" value="Publica" name="tipoInst" checked="checked">&nbsp;
							2.Privada<input type="radio" value="Privada" name="tipoInst"> 
						</div>
					
				</p>
				<p>
					<label for="mision">3.Estudio en las Misiones Educativas:</label><br>
					1.Si <input type="radio" value="Si" name="mision" onclick="mostrar_mision()">&nbsp;
					2.No <input type="radio" value="No" name="mision" checked="checked" onclick="ocultar_mision()">
						<div id="misiones2">
							3.1.Cu&aacute;l(es):<br>
							<textarea id="cualMision" class="auth-input auth-textarea" type="text" value="" name="cualMision"></textarea> 
						</div>
					
				</p>
				<p>
					<label for="estudiar">4.Le gustar&iacute;a estudiar:</label><br>
					1.Si <input type="radio" value="Si" name="estudiar" onclick="mostrar_estudiar()">&nbsp;
					2.No <input type="radio" value="No" name="estudiar" checked="checked" onclick="ocultar_estudiar()">
						<div id="estudiar2">
							4.1.&iquest;Qu&eacute; le gustar&iacute;a estudiar?<br>
							<input id="gustEstudiar" class="auth-input" type="text" onkeypress="return soloLetras(event)" value="" name="gustEstudiar" maxlength="25"></input> 
						</div>
					
				</p>
			</div>
		</section>
		<section class="step" data-step-title="Participaci&oacute;n / Organizaci&oacute;n">
			<div class="col-lg-12" style="text-align:center">
				<p>
					<label for="movimiento">1.Usted participa en Movimientos u Organizaciones de Mujeres:</label><br>
					1.Si <input type="radio" value="Si" name="movimiento" onclick="mostrar_movimiento()">&nbsp;
					2.No <input type="radio" value="No" name="movimiento" checked="checked" onclick="ocultar_movimiento()">
						<div id="movimiento2">
							1.1.&iquest;Cu&aacute;l? <br>
							<input id="cualMovimiento" class="auth-input" type="text" value="" onkeypress="return soloLetras(event)" name="cualMovimiento" maxlength="25"/><br><br> 
							1.2.A&ntilde;os de Militancia: <br>
							<input id="militanciaMov" ng-model="militanciaMov" class="auth-input" onkeypress="return soloNumeros(event)" type="text" value="" name="militanciaMov" maxlength="2"/><br><br>
							<span style="color:red; font-size:12px" ng-show="form.militanciaMov.$error.integer"><br>* Este campo debe ser un numero entero</span>
							1.3.Responsabilidad: <br>
							<input class="auth-input" type="text" name="responsabilidadMov" onkeypress="return soloLetras(event)" maxLength="25" size="20"> <br>
						</div>		
					
				</p>

				<p>
					<label for="partido">2.Usted pertenece a un Partido Pol&iacute;tico:</label><br>
					1.Si <input type="radio" value="Si" name="partido" onclick="mostrar_partido()">&nbsp;
					2.No <input type="radio" value="No" name="partido" checked="checked" onclick="ocultar_partido()">
						<div id="partido2">
						1.1.&iquest;Cu&aacute;l?<br>
						<input id="cualPartido" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="" name="cualPartido" maxlength="25"/><br><br>
						1.2.A&ntilde;os de Militancia:<br>
						<input id="militanciaPar" class="auth-input" type="text" onkeypress="return soloNumeros(event)" value="" name="militanciaPar" maxlength="2" integer/><br><br>
						<span style="color:red; font-size:12px" ng-show="form.militanciaPar.$error.integer"><br>* Este campo debe ser un numero entero</span>
						1.3.Responsabilidad: <br>
						<input id="responsabilidadPar" ng-model="responsabilidadPar" onkeypress="return soloLetras(event)" class="auth-input" type="text" value="" name="responsabilidadPar" maxlength="25">
					</div>
				
				</p>
				<p>
					<label for="concejoC">3.Usted pertenece a un Cosejo Comunal:</label><br>
					1.Si<input type="radio" value="Si" name="concejoC" onclick="mostrar_concejoC()">&nbsp;
					2.No<input type="radio" value="No" name="concejoC" checked="checked" onclick="ocultar_concejoC()">
						<div id="concejoC2">
						3.1.Nombre del Concejo Comunal:<br>
						<input id="nombreConcejoC" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="" name="nombreConcejoC" maxlength="25"/><br><br> 
						3.2.Ejerce una voceria dentro del Consejo Comunal: <br>
						1.Si <input type="radio" value="Si" name="voceria" onclick="mostrar_voceria()">&nbsp;
						2.No <input type="radio" value="No" name="voceria" checked="checked" onclick="ocultar_voceria()"><br>
							<div id="voceria2">
							&iquest;Cu&aacute;l?:<br>
							<input id="cualVoceria" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="" name="cualVoceria" maxlength="25"/>
							</div><br>
						</div>
				</p>
			</div>
		</section>
		<section class="step" data-step-title="Laborales">
			<div class="col-lg-12" style="text-align:center">
				<p>
					<label for="instTrabajo">1.Instituci&oacute;n donde labora: </label><br>
					<input id="instTrabajo" ng-model="instTrabajo" onkeypress="return soloLetrasYNumeros(event)" class="auth-input" type="text" value="" name="instTrabajo" maxlength="50"/> 
				</p>
				<p>
					<label for="cargo">2.Cargo o rol que ejerce:</label><br>
					<input id="cargo" ng-model="cargo" class="auth-input" onkeypress="return soloLetras(event)" type="text" value="" name="cargo" maxlength="50"></input> 
				</p>
				<p>
					<label for="telOficina">3.Tel&eacute;fono (oficina):</label><br>
					<input id="telOficina" ng-model="telOficina" class="auth-input" onkeypress="return soloNumeros(event)" type="text" value="" name="telOficina" maxlength="11" integer></input>
					<span style="color:red; font-size:12px" ng-show="form.telOficina.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
					<label for="correoTrabajo">4.Correo Electr&oacute;nico:</label><br>
					<input id="correoTrabajo" ng-model="correoTrabajo" class="auth-input" type="text" value="" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="correoTrabajo" maxlength="50"></input>
				</p>
				 <p>
				<?php 
				function generate_captcha(){
							$md5Hash = md5(microtime()*time());
							$key = substr($md5Hash,0,7);
							return $key;
						}
				$x = generate_captcha();
				?>
				<div class="captcha" style="background: rgba(74, 2, 74, 0.71); width: 100%; max-width: 80px; height: 100%; 
				max-height: 30px; padding: 5px; font-weight: bold; color: white; margin:auto; -webkit-user-select: none; -khtml-user-select: none;
				-moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;">
				<?php echo $x; ?>
				</div>
					<input type="hidden" name="captcha" id="origin" value="<?php echo $x; ?>">
					<input type="text" class="auth-input" id="captcha" name="captcha" value="" required>
                </p>
			</div>
		</section>
<?php echo form_close(); ?>
</div>