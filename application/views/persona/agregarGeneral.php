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
		$("#etnia2,#discapacidad2,#instruccion2,#estudio2, #misiones2, #estudiar2,#movimiento2,#partido2,#concejoC2,#voceria2, #comuna2").hide();
		$( "#fecha" ).datepicker();
		
		
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
</script>
<h1>Agregar Persona General</h1>
<hr>
<div class="auth-form" ng-app="persona">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/personas_api/save',$d);
?>
	<div class="col-lg-4">
	<center>Ubicaci&oacute;n Geogr&aacute;fica de Habitaci&oacute;n</center>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">1. REDI</p><br>
		<select class="auth-input"id="redi" name="redi"> 
		<option value="">Seleccione una opcion</option>
		<?php 
			foreach ($redi as $redis){
				echo '<option value="'.$redis->id_redi.'">'.$redis->nombre.'</option>'; 
			}
		?>
		</select>
		<br><br>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">2. ESTADO</p><br>
		<select disabled class="auth-input" id="est" name="estado" > 
		<option value="">Seleccione una opcion</option>
		</select>
		<br><br>
				
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">3. MUNICIPIO</p><br>
		<select disabled class="auth-input" id="mun" name="municipio" disabled> 
		<option value="" selected="selected">Seleccione una opcion</option>
		</select>
		<br><br>

		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">4. PARROQUIA</p><br>
		<select disabled class="auth-input" id="par" name="parroquia" disabled> 
		<option value="">Seleccione una opcion</option>
		</select>
		<br><br>

      <p>
         <label for="nombre">5.Direcci&oacute;n de Habitaci&oacute;n:</label><br>
         <textarea id="direccion" ng-model="direccion" class="auth-input auth-textarea" type="text" value="" name="direccion" rows="2" required></textarea>
         <span style="color:red; font-size:12px" ng-show="form.direccion.$error.required"><br>* Este campo es obligatorio</span>

   </p>
	<center>Datos Personales</center>
   <p>
         <label for="nombreApellido">1.Nombres y Apellidos:</label><br>
         <input id="nombreApellido" ng-model="nombreApellido" class="auth-input" type="text" value="" name="nombreApellido" maxLegth="50" ng-pattern="/[a-zA-Z]/" required></input>
         <span style="color:red; font-size:12px" ng-show="form.nombreApellido.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.nombreApellido.$error.pattern"><br>* Este campo debe ser solo letras</span>
   </p>

   <p>
         <label for="cedula">2.C&eacute;dula:</label><br>
         <input id="cedula" ng-model="cedula" class="auth-input" type="text" value="" name="cedula" maxlength="8" required integer></input>
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
         <input id="edad" ng-model="edad" class="auth-input" type="text" value="" name="edad" maxlength="2" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.edad.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.edad.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

   <p>
		<label for="sexo">5.Sexo:</label><br>
		1.F <input type="radio" value="F" name="sexo" checked="checked">&nbsp;
		2.M <input type="radio" value="M" name="sexo">
   </p>
   <p>
		<label for="fecha">6.Fecha de Nacimiento:</label><br>
		<input  name="fecha"class="auth-input" type="text" id="fecha" readonly required>
		<span style="color:red; font-size:12px" ng-show="form.fecha.$error.required"><br>* Este campo es obligatorio</span>
   </p>
   <p>
         <label for="nroHijos">7.N&uacute;mero de hijas(os):</label><br>
         <input id="nroHijos" ng-model="nroHijos" class="auth-input" type="text" value="" name="nroHijos" maxlength="2" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.nroHijos.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.nroHijos.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>
   <p>
		<label for="etnia">8.¿Pertenece ud a una etnia?</label><br>
		1.Si <input type="radio" value="Si" name="etnia" onclick="mostrar_etnia()">&nbsp;
		2.No <input type="radio" value="No" name="etnia" checked="checked" onclick="ocultar_etnia()">
		<div id="etnia2">
		Nombre de Etnia:<br><input type="text" class="auth-input" name="cualEtnia" maxLength="25"><br><br>
		8.1. ¿Domina Idioma?
		<br><br>
		1.Si <input type="radio" value="Si" name="idioma" checked="checked"><br>
		2.No <input type="radio" value="No" name="idioma"> 
		</div>
		
	</p>
	  	</div>
	<div class="col-lg-4">	
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
         <input id="telHab" ng-model="telHab" class="auth-input" type="text" value="" name="telHab" maxlength="11" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.telHab.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.telHab.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>
   <p>
         <label for="telCel">12.Tel&eacute;fono Celular:</label><br>
         <input id="telCel" ng-model="telCel" class="auth-input" type="text" value="" name="telCel" maxlength="11" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.telCel.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.telCel.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>
   <p>
		 <label for="correo">13.Correo Electr&oacute;nico:</label><br>
         <input id="correo" ng-model="correo" class="auth-input" type="text" value="" name="correo" maxlength="11" required></input>
         <span style="color:red; font-size:12px" ng-show="form.correo.$error.required"><br>* Este campo es obligatorio</span>
   </p>
   <center>Datos Educativos</center>
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
			<input id="profesion" ng-model="profesion" class="auth-input" type="text" value="" name="profesion" maxLegth="50"/>
		</div> 
	</p>
	
	<p>
		<label for="estudio">2.&iquest;Estudia actualmente?</label><br>
		1.Si <input type="radio" value="Si" name="estudio" onclick="mostrar_estudio()">&nbsp;
		2.No <input type="radio" value="No" name="estudio" checked="checked" onclick="ocultar_estudio()">
			<div id="estudio2">
				2.1.Nombre de la instituci&oacute;n: <br>
				<input id="inst" ng-model="inst" class="auth-input" type="text" value="" name="inst" maxLegth="50"/><br><br>
				2.2.&iquest;Qu&eacute; est&aacute; estudiando? <br>
				<input id="queEstudia" class="auth-input" type="text" value="" name="queEstudia" maxLegth="25"/><br><br>
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
				<input id="gustEstudiar" class="auth-input" type="text" value="" name="gustEstudiar" maxLegth="25"></input> 
			</div>
		
	</p>
	<center>Datos de Participaci&oacute;n y Organizaci&oacute;n</center><br>
	<p>
		<label for="movimiento">1.Usted participa en Movimientos u Organizaciones de Mujeres:</label><br>
		1.Si <input type="radio" value="Si" name="movimiento" onclick="mostrar_movimiento()">&nbsp;
		2.No <input type="radio" value="No" name="movimiento" checked="checked" onclick="ocultar_movimiento()">
			<div id="movimiento2">
				1.1.&iquest;Cu&aacute;l? <br>
				<input id="cualMovimiento" class="auth-input" type="text" value="" name="cualMovimiento" maxLegth="25"/><br><br> 
				1.2.A&ntilde;os de Militancia: <br>
				<input id="militanciaMov" ng-model="militanciaMov" class="auth-input" type="text" value="" name="militanciaMov" maxLegth="2"/><br><br>
				<span style="color:red; font-size:12px" ng-show="form.militanciaMov.$error.integer"><br>* Este campo debe ser un numero entero</span>
				1.3.Responsabilidad: <br>
				<input class="auth-input" type="text" name="responsabilidadMov" maxLength="25" size="20"> <br>
			</div>		
		
	</p>
		  	</div>
	<div class="col-lg-4">
	<p>
		<label for="partido">2.Usted pertenece a un Partido Pol&iacute;tico:</label><br>
		1.Si <input type="radio" value="Si" name="partido" onclick="mostrar_partido()">&nbsp;
		2.No <input type="radio" value="No" name="partido" checked="checked" onclick="ocultar_partido()">
			<div id="partido2">
			1.1.&iquest;Cu&aacute;l?<br>
			<input id="cualPartido" class="auth-input" type="text" value="" name="cualPartido" maxLegth="25"/><br><br>
			1.2.A&ntilde;os de Militancia:<br>
			<input id="militanciaPar" class="auth-input" type="text" value="" name="militanciaPar" maxLegth="2" integer/><br><br>
			<span style="color:red; font-size:12px" ng-show="form.militanciaPar.$error.integer"><br>* Este campo debe ser un numero entero</span>
			1.3.Responsabilidad: <br>
			<input id="responsabilidadPar" ng-model="responsabilidadPar" class="auth-input" type="text" value="" name="responsabilidadPar" maxLegth="25">
		</div>
	
	</p>
	<p>
		<label for="concejoC">3.Usted pertenece a un Cosejo Comunal:</label><br>
		1.Si<input type="radio" value="Si" name="concejoC" onclick="mostrar_concejoC()">&nbsp;
		2.No<input type="radio" value="No" name="concejoC" checked="checked" onclick="ocultar_concejoC()">
			<div id="concejoC2">
			3.1.Nombre del Concejo Comunal:<br>
			<input id="nombreConcejoC" class="auth-input" type="text" value="" name="nombreConcejoC" maxLegth="25"/><br><br> 
			3.2.Ejerce una voceria dentro del Consejo Comunal: <br>
			1.Si <input type="radio" value="Si" name="voceria" onclick="mostrar_voceria()">&nbsp;
			2.No <input type="radio" value="No" name="voceria" checked="checked" onclick="ocultar_voceria()"><br>
				<div id="voceria2">
				&iquest;Cu&aacute;l?:<br>
				<input id="cualVoceria" class="auth-input" type="text" value="" name="cualVoceria" maxLegth="25"/>
				</div><br>
			
			3.4.Pertenece a una Comuna:1.<br>
			1.Si <input type="radio" value="Si" name="comuna" onclick="mostrar_comuna()">&nbsp;
			2.No<input type="radio" value="No" name="comuna" checked="checked" onclick="ocultar_comuna()">
				<div id="comuna2">
					&iquest;Cu&aacute;l?<br>
					<input id="cualComuna" class="auth-input" type="text" value="" name="cualComuna" maxLegth="25"/>
				</div>
			</div>
		
	</p>
	<center>Datos Laborales</center><br>
	<p>
		<label for="instTrabajo">1.Instituci&oacute;n donde labora: </label><br>
		<input id="instTrabajo" ng-model="instTrabajo" class="auth-input" type="text" value="" name="instTrabajo" maxLegth="50"/> 
	</p>
	<p>
		<label for="cargo">2.Cargo o rol que ejerce:</label><br>
		<input id="cargo" ng-model="cargo" class="auth-input" type="text" value="" name="cargo" maxLegth="50"></input> 
	</p>
	<p>
		<label for="telOficina">3.Tel&eacute;fono (oficina):</label><br>
		<input id="telOficina" ng-model="telOficina" class="auth-input" type="text" value="" name="telOficina" maxLegth="11" integer></input>
		<span style="color:red; font-size:12px" ng-show="form.telOficina.$error.integer"><br>* Este campo debe ser un numero entero</span>
	</p>
	<p>
		<label for="correoTrabajo">4.Correo Electr&oacute;nico:</label><br>
		<input id="correoTrabajo" ng-model="correoTrabajo" class="auth-input" type="text" value="" name="correoTrabajo" maxLegth="50"></input>
	</p>

  	</div>
	<div class="col-lg-12">	
 <p>
<input type="submit" class="auth-button .btn-danger go" ng-disabled="form.nombre.$invalid" value="Agregar" name="submit"></input>
   </p>
   <a class="auth-button .btn-danger back" href="<?php echo base_url()?>persona" style="margin-top:-44px !important;">Volver</a>
  	</div>
<?php echo form_close(); ?>

</div>