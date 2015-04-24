<h1>Agregar Informe</h1>
<hr>

<script>
function mostrar_total_diversidad_sexual(){
			$("#diversidad_sexual2").show("blind");
		}
function fechas(){
		
		fechaini= document.getElementById("fec_ini").value;
	    fechafin = document.getElementById("fec_fin").value;
		if(fechaini>fechafin){
		alert("La fecha de inicio no puede ser mayor\nque la fecha de culminacion");
			document.form.fec_fin.value ='';
		}
		
}

function suma_asiste_div(){
		
		femenino2= document.getElementById("tot_femeninos_div").value;
		 masculino2 = document.getElementById("tot_masculinos_div").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		if(masculino2==''){
		 var resultado2= (parseInt(femenino2));
		 document.getElementById("tot_asistentes_div").value = resultado2;
		}else{
		  var resultado2= (parseInt(femenino2)+parseInt(masculino2));

		document.getElementById("tot_asistentes_div").value = resultado2;
		}
}
function suma_asiste_for(){
		
	var femenino = document.getElementById("tot_femeninos_for").value;
	var masculino = document.getElementById("tot_masculinos_for").value;
		//var total = document.getElementById("tot_asistentes_for").value;
	if(masculino==''){
      var resultado= (parseInt(femenino));
		document.form.tot_asistentes_for.value = resultado;
	}else{
		  var resultado= (parseInt(femenino)+parseInt(masculino));

		//document.getElementById("tot_asistentes_for").value = resultado;
		document.form.tot_asistentes_for.value = resultado;
	}
		}
function mostrar_dv(){
		
		  if (form.tot_div_sexual_for2.value == '') { 
				alert ('Los participantes de la Diversidad Sexual \n no pueden estar vacios'); 
				document.getElementById("tot_div_sexual_for2").focus();
           } 
}
function validar_dv(){
		
	var diversidad_sex = document.getElementById("tot_div_sexual_for").value;
	
		if(diversidad_sex=='Si'){
		  var femenino = document.getElementById("tot_femeninos_for").value;
		  var total = document.getElementById("tot_div_sexual_for2").value;
		  fem=parseInt(femenino);
		  dv=parseInt(total);
		  if (form.tot_div_sexual_for2.value == '') { 
				alert ('Los participantes de la Diversidad Sexual \n no pueden estar vacios'); 
				document.getElementById("tot_div_sexual_for2").focus();
           }
		 if(total<=0){
				alert("Los participantes de la Diversidad Sexual \n no puede ser igual o menor que cero");
				document.form.tot_div_sexual_for2.value ='';
				document.getElementById("tot_div_sexual_for2").focus();
			}
		  else if(dv>fem){
				alert("Los participantes de la Diversidad Sexual \n no puede ser mayor que el total \n de participantes femeninos");
				document.form.tot_div_sexual_for2.value ='';
				document.getElementById("tot_div_sexual_for2").focus();
			}
		}
}
function mostrar_mind(){
		
	var muj_ind = document.getElementById("tot_mujeres_indigenas_for").value;
	
		if(muj_ind=='Si'){
		  var femenino = document.getElementById("tot_femeninos_for").value;
		  var mind= document.getElementById("tot_mujeres_indigenas_for2").value;
		  fem=parseInt(femenino);
		  mind=parseInt(mind);
		  if (form.tot_mujeres_indigenas_for2.value == '') { 
				alert ('Los participantes de las Mujeres Indigenas \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_indigenas_for2").focus();
           }
		 if(mind<=0){
				alert("Los participantes de las Mujeres Indigenas \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_indigenas_for2.value ='';
				document.getElementById("tot_mujeres_indigenas_for2").focus();
			}
		  else if(mind>fem){
			alert("Las Mujeres Indigenas \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_indigenas_for2.value ='';
				document.getElementById("tot_mujeres_indigenas_for2").focus();
			}
		}
}
		
function mostrar_disc(){
		
		var discm= document.getElementById("tot_mujeres_discapacidad_for").value;
	
		if(discm=='Si'){
		  var femenino = document.getElementById("tot_femeninos_for").value;
		  var disc= document.getElementById("tot_mujeres_discapacidad_for2").value;
		  fem=parseInt(femenino);
		  disc=parseInt(disc);
		  if (form.tot_mujeres_discapacidad_for2.value == '') { 
				alert ('Los participantes de las Mujeres con discapacidad  \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_discapacidad_for2").focus();
           }
		 if(disc<=0){
				alert("Los participantes de las Mujeres con discapacidad \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_discapacidad_for2.value ='';
				document.getElementById("tot_mujeres_discapacidad_for2").focus();
			}
		  else if(disc>fem){
			alert("Las Mujeres con discapacidad \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_discapacidad_for2.value ='';
			 document.getElementById("tot_mujeres_discapacidad_for2").focus();
			}
		}
}
function mostrar_afro(){
		var afrom= document.getElementById("tot_mujeres_afrodecendientes_for").value;
	
		if(afrom=='Si'){
		  var femenino = document.getElementById("tot_femeninos_for").value;
		  var afro= document.getElementById("tot_mujeres_afrodecendientes_for2").value;
		  fem=parseInt(femenino);
		  afro=parseInt(afro);
		  if (form.tot_mujeres_afrodecendientes_for2.value == '') { 
				alert ('Los participantes de las Mujeres afrodecendientes \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_afrodecendientes_for2").focus();
           }
		 if(afro<=0){
				alert("Los participantes de las Mujeres afrodecendientes \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_afrodecendientes_for2.value ='';
				document.getElementById("tot_mujeres_afrodecendientes_for2").focus();
			}
		  else if(afro>fem){
			alert("Las Mujeres afrodecendientes \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_afrodecendientes_for2.value ='';
			 document.getElementById("tot_mujeres_afrodecendientes_for2").focus();
			}
		}
}
function mostrar_mov_muj(){
		var movm= document.getElementById("tot_movimientos_mujeres_for").value;
	
		if(movm=='Si'){
		  var femenino = document.getElementById("tot_femeninos_for").value;
		  var mov= document.getElementById("tot_movimientos_mujeres_for2").value;
		  fem=parseInt(femenino);
		  mov=parseInt(mov);
		  if (form.tot_movimientos_mujeres_for2.value == '') { 
				alert ('Los participantes de los Movimientos de mujeres \n no pueden estar vacios'); 
				document.getElementById("tot_movimientos_mujeres_for2").focus();
           }
		 if(mov<=0){
				alert("Los participantes de los Movimientos de mujeres\n no puede ser igual o menor que cero");
				document.form.tot_movimientos_mujeres_for2.value ='';
				document.getElementById("tot_movimientos_mujeres_for2").focus();
			}
		  else if(mov>fem){
			alert("Los Movimientos de mujeres\n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_movimientos_mujeres_for2.value ='';
			 document.getElementById("tot_movimientos_mujeres_for2").focus();
			}
		}
}
function mostrar_dv2(){
		var dv2= document.getElementById("tot_div_sexual_div").value;
	
		if(dv2=='Si'){
		  var femenino = document.getElementById("tot_femeninos_div").value;
		  var div_sex2= document.getElementById("tot_div_sexual_div2").value;
		  fem=parseInt(femenino);
		  div_sex2=parseInt(div_sex2);
		  if (form.tot_div_sexual_div2.value == '') { 
				alert ('Los participantes de la Diversidad Sexual \n no pueden estar vacios'); 
				document.getElementById("tot_div_sexual_div2").focus();
           }
		 if(div_sex2<=0){
				alert("Los participantes de la Diversidad Sexual \n no puede ser igual o menor que cero");
				document.form.tot_div_sexual_div2.value ='';
				document.getElementById("tot_movimientos_mujeres_for2").focus();
			}
		  else if(div_sex2>fem){
			alert("Los participantes de la Diversidad Sexual \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_div_sexual_div2.value ='';
			 document.getElementById("tot_div_sexual_div2").focus();
			}
		}
		
}
function mostrar_mind2(){
		var mindv= document.getElementById("tot_mujeres_indigenas_div").value;
	
		if(mindv=='Si'){
		  var femenino = document.getElementById("tot_femeninos_div").value;
		  var mind2= document.getElementById("tot_mujeres_indigenas_div2").value;
		  fem=parseInt(femenino);
		  mind2=parseInt(mind2);
		  if (form.tot_mujeres_indigenas_div2.value == '') { 
				alert ('Los participantes de las Mujeres Indigenas \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_indigenas_div2").focus();
           }
		 if(mind2<=0){
				alert("Los participantes de las Mujeres Indigenas \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_indigenas_div2.value ='';
				document.getElementById("tot_mujeres_indigenas_div2").focus();
			}
		  else if(mind2>fem){
			alert("Las Mujeres Indigenas \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_indigenas_div2.value ='';
			 document.getElementById("tot_mujeres_indigenas_div2").focus();
			}
		}
}
function mostrar_disc2(){
		var discv= document.getElementById("tot_mujeres_discapacidad_div").value;
	
		if(discv=='Si'){
		  var femenino = document.getElementById("tot_femeninos_div").value;
		  var disc2= document.getElementById("tot_mujeres_discapacidad_div2").value;
		  fem=parseInt(femenino);
		  disc2=parseInt(disc2);
		  if (form.tot_mujeres_discapacidad_div2.value == '') { 
				alert ('Los participantes de las Mujeres con discapacidad \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_discapacidad_div2").focus();
           }
		 if(disc2<=0){
				alert("Los participantes de las Mujeres con discapacidad \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_discapacidad_div2.value ='';
				document.getElementById("tot_mujeres_discapacidad_div2").focus();
			}
		  else if(disc2>fem){
			alert("Las Mujeres con discapacidad \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_discapacidad_div2.value ='';
			 document.getElementById("tot_mujeres_discapacidad_div2").focus();
			}
		}
}
function mostrar_afro2(){
		var afrov= document.getElementById("tot_mujeres_afrodecendientes_div").value;
	
		if(afrov=='Si'){
		  var femenino = document.getElementById("tot_femeninos_div").value;
		  var afro2= document.getElementById("tot_mujeres_afrodecendientes_div2").value;
		  fem=parseInt(femenino);
		  afro2=parseInt(afro2);
		  if (form.tot_mujeres_afrodecendientes_div2.value == '') { 
				alert ('Los participantes de las Mujeres afrodecendientes \n no pueden estar vacios'); 
				document.getElementById("tot_mujeres_afrodecendientes_div2").focus();
           }
		 if(afro2<=0){
				alert("Los participantes de las Mujeres afrodecendientes \n no puede ser igual o menor que cero");
				document.form.tot_mujeres_afrodecendientes_div2.value ='';
				document.getElementById("tot_mujeres_afrodecendientes_div2").focus();
			}
		  else if(afro2>fem){
			alert("Las Mujeres afrodecendientes \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_afrodecendientes_div2.value ='';
			 document.getElementById("tot_mujeres_afrodecendientes_div2").focus();
			}
		}
}
function ocultar_total_diversidad_sexual()
{
	$("#diversidad_sexual2").hide("blind");
}
function mostrar_total_mujeres_indigenas(){
			$("#mujeres_indigenas2").show("blind");
		}
function ocultar_total_mujeres_indigenas()
{
	$("#mujeres_indigenas2").hide("blind");
}
function mostrar_total_mujeres_discapacidad(){
			$("#mujeres_discapacidad2").show("blind");
		}
function ocultar_total_mujeres_discapacidad()
{
	$("#mujeres_discapacidad2").hide("blind");
}
function mostrar_total_mujeres_afrodecendientes(){
			$("#mujeres_afrodecendientes2").show("blind");
		}
function ocultar_total_mujeres_afrodecendientes()
{
	$("#mujeres_afrodecendientes2").hide("blind");
}
function mostrar_total_movimientos_mujeres(){
			$("#movimientos_mujeres2").show("blind");
		}
function ocultar_total_movimientos_mujeres()
{
	$("#movimientos_mujeres2").hide("blind");
}
function mostrar_tot_div_sexual(){
			$("#tot_div_sexual2").show("blind");
		}
function ocultar_tot_div_sexual()
{
	$("#tot_div_sexual2").hide("blind");
}
function mostrar_tot_mujeres_indigenas(){
			$("#tot_mujeres_indigenas2").show("blind");
		}
function ocultar_tot_mujeres_indigenas()
{
	$("#tot_mujeres_indigenas2").hide("blind");
}
function mostrar_tot_mujeres_discapacidad(){
			$("#tot_mujeres_discapacidad2").show("blind");
		}
function ocultar_tot_mujeres_discapacidad()
{
	$("#tot_mujeres_discapacidad2").hide("blind");
}
function mostrar_tot_mujeres_afrodecendientes(){
			$("#tot_mujeres_afrodecendientes2").show("blind");
		}
function ocultar_tot_mujeres_afrodecendientes()
{
	$("#tot_mujeres_afrodecendientes2").hide("blind");
}
function mostrar_convocacion_medios(){
			$("#convocacion_medios2").show("blind");
		}
function ocultar_convocacion_medios()
{
	$("#convocacion_medios2").hide("blind");
}
$(function(){

$('#myWizard').easyWizard();
$("#fec_ini").datepicker();
$("#fec_fin").datepicker();
$("#diversidad_sexual2,#mujeres_indigenas2,#mujeres_discapacidad2,#mujeres_afrodecendientes2,#movimientos_mujeres2,#tot_div_sexual2,#tot_mujeres_indigenas2,#tot_mujeres_discapacidad2,#tot_mujeres_afrodecendientes2,#convocacion_medios2").hide();

$("#redi").change(function () {
			$("#redi option:selected").each(function(){
				redi = $("#redi").val();
				if (redi){
					$.ajax({
						url: 'index.php/Informe/estado/' + redi,
						success: function(data) {
							$("#est").html(data);
							$("#est").prop("disabled", false);
						},
						error: function() {
							alert('algo malo paso :(');
						}
					});
				}
			});
		});	
		
		$("#est").change(function () {
			$("#est option:selected").each(function(){
				estado = $("#est").val();
				$.ajax({
                  url: 'index.php/Informe/municipio/' + estado,
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
                  url: 'index.php/Informe/parroquia/' + municipio,
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

<div class="col-lg-12" ng-app="informe">

	<form action="<?php echo base_url().'api/informe_api/save'; ?>" id="myWizard" class="form-horizontal" name="form" method="post" accept-charset="utf-8">
		<section class="step" data-step-title="General">
						<div class="col-lg-6">
				<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;"> CURSO   </p><br>
					<select class="auth-input"id="curso" name="curso" > 
						<option value="">Seleccione una opcion</option>
						<?php 
						foreach ($curso as $cursos){
						echo '<option value="'.$cursos->id_curso.'">'.$cursos->nombre.'</option>'; 
						}
						?>
				</select>
         <span style="color:red; font-size:12px" ng-show="form.curso.$error.required"><br>* Este campo es obligatorio</span>
				
					<br><br>
			
					<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">1. REDI</p><br>
					<select class="auth-input"id="redi" name="redi"> 
						<option value="">Seleccione una opcion</option>
						<?php 
						foreach ($redi as $redis){
						echo '<option value="'.$redis->id_redi.'">'.$redis->nombre.'</option>'; 
						}
						?>
					</select>
					<span style="color:red; font-size:12px" ng-show="form.redi.$error.required"><br>* Este campo es obligatorio</span>
					<br><br>

					<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">2. ESTADO</p><br>
					<select disabled class="auth-input" id="est" name="estado" > 
						<option value="">Seleccione una opcion</option>
					</select>
					<span style="color:red; font-size:12px" ng-show="form.estado.$error.required"><br>* Este campo es obligatorio</span>
					<br><br>

					<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">3. MUNICIPIO</p><br>
					<select disabled class="auth-input" id="mun" name="municipio" disabled> 
						<option value="" selected="selected">Seleccione una opcion</option>
					</select>
					<span style="color:red; font-size:12px" ng-show="form.municipio.$error.required"><br>* Este campo es obligatorio</span>
					<br><br>

					<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">4. PARROQUIA</p><br>
					<select disabled class="auth-input" id="par" name="parroquia" disabled> 
						<option value="">Seleccione una opcion</option>
					</select>
					<span style="color:red; font-size:12px" ng-show="form.parroquia.$error.required"><br>* Este campo es obligatorio</span>
					<br><br>
				</div>
				
				<div class="col-lg-6">			
					<p>
						<label for="nombrec">Nombre y Apellido de la coordinadora:</label><span style="color:red; font-size:20px">*</span><br>
						<input id="user" class="auth-input dis" type="hidden" value="<?php echo $user->id ?>" name="user" ></input>
						<input id="user2" class="auth-input dis" type="text" value="<?php echo  $user->first_name.' '.$user->last_name ?>" name="user2" readonly placeholder="<?php echo $user->first_name.' '.$user->last_name ?>"></input>
					</p>
					
					<p>
						<label for="correo">Correo Electr&oacute;nico:</label><br>
						<input id="correo" class="auth-input dis" type="text" value="<?php echo $user->email;?>" readonly placeholder="<?php echo $user->email; ?>" name="correo"/>
					</p>
				</div>

		</section>
		
		<section class="step" data-step-title="Formaci&oacute;n">
		
			<div class="col-lg-6">

				<p><label for="tipo_actividad_for">Tipo de Actividad:</label></p>
				<select class="auth-input" name="tipo_actividad_for" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione una opcion</option>
				<option value='Taller'>Taller</option>
				<option value='Foro'>Foro</option>
				<option value='Encuentro'>Encuentro</option>
				<option value='Seminario'>Seminario</option>
				<option value='Congreso'>Congreso</option>
				<option value='Conversatorio'>Conversatorio</option>
				<option value='Diplomado'>Diplomado</option>
				<option value='Curso'>Curso</option>	
				<option value='Plan de Formación'>Plan de Formaci&oacute;n</option>	
				</select>
				
				<p>
				<label for="act_nombre_for">Nombre de la Actividad</label><br>
				<input id="actividad" ng-model="act_nombre_for" class="auth-input" type="text" value="" name="act_nombre_for" required></input>
				<span style="color:red; font-size:12px" ng-show="form.act_nombre_for.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				
				
				<p>
				<label for="tot_femeninos_for">Total Femenino</label><br>
				<input id="tot_femeninos_for" ng-model="tot_femeninos_for" class="auth-input" type="text" value="" onchange="suma_asiste_for()"  name="tot_femeninos_for" required integer></input>
				<span style="color:red; font-size:12px" ng-show="form.tot_femeninos_for.$error.required"><br>* Este campo es obligatorio</span>
				<span style="color:red; font-size:12px" ng-show="form.tot_femeninos_for.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				
				<p>
				<label for="tot_masculinos_for">Total Masculino</label><br>
				<input id="tot_masculinos_for" ng-model="tot_masculinos_for" class="auth-input" type="text" value="" onchange="suma_asiste_for()" name="tot_masculinos_for" required integer></input>
				<span style="color:red; font-size:12px" ng-show="form.tot_masculinos_for.$error.required"><br>* Este campo es obligatorio</span>
				<span style="color:red; font-size:12px" ng-show="form.tot_masculinos_for.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
				<label for="tot_asistentes_for">Total de Asistentes</label><br>
				<input id="tot_asistentes_for" ng-model="tot_asistentes_for" class="auth-input dis" type="text" 
				 name="tot_asistentes_for" required integer></input>
				
				</p>
				<p>
				<label for="tot_div_sexual_for">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_div_sexual_for" name="tot_div_sexual_for" onclick="mostrar_total_diversidad_sexual()">&nbsp;
				2.No <input type="radio" value="0" id="tot_div_sexual_for" name="tot_div_sexual_for" checked="checked" onclick="ocultar_total_diversidad_sexual()">
				<div id="diversidad_sexual2">
				Total de participantes:<br><input type="text" class="auth-input"  onchange="validar_dv()" onblur="mostrar_dv()" id="tot_div_sexual_for2" name="tot_div_sexual_for2" maxLength="25"><br><br>
				</div>
				</p>
				
				</div>
				<div class="col-lg-6">
				<p>
				<label for="tot_mujeres_indigenas_for">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>

				1.Si <input type="radio" value="Si" id="tot_mujeres_indigenas_for" name="tot_mujeres_indigenas_for" onclick="mostrar_total_mujeres_indigenas()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_mujeres_indigenas_for" name="tot_mujeres_indigenas_for" checked="checked" onclick="ocultar_total_mujeres_indigenas()">
				<div id="mujeres_indigenas2">
				Total de participantes:<br><input type="text" class="auth-input" id="tot_mujeres_indigenas_for2" name="tot_mujeres_indigenas_for2" onchange='mostrar_mind()' maxLength="25"><br><br>
				
				</div>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_for">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_mujeres_discapacidad_for" name="tot_mujeres_discapacidad_for" onclick="mostrar_total_mujeres_discapacidad()">&nbsp;
				2.No <input type="radio" value="0" id="tot_mujeres_discapacidad_for" name="tot_mujeres_discapacidad_for" checked="checked" onclick="ocultar_total_mujeres_discapacidad()">
				<div id="mujeres_discapacidad2">
				Total de participantes:<br><input type="text" class="auth-input" id="tot_mujeres_discapacidad_for2" onchange='mostrar_disc()' name="tot_mujeres_discapacidad_for2" maxLength="25"><br><br>
				</div>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_for">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_mujeres_afrodecendientes_for" name="tot_mujeres_afrodecendientes_for" onclick="mostrar_total_mujeres_afrodecendientes()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_mujeres_afrodecendientes_for" name="tot_mujeres_afrodecendientes_for" checked="checked" onclick="ocultar_total_mujeres_afrodecendientes()">
				<div id="mujeres_afrodecendientes2">
				Total de participantes:<br><input type="text" class="auth-input" onchange="mostrar_afro()" id="tot_mujeres_afrodecendientes_for2" name="tot_mujeres_afrodecendientes_for2" maxLength="25"><br><br>
				</div>
				</p>
				<p>
				<label for="tot_movimientos_mujeres_for">&iquest;Hubo participaci&oacute;n de Movimientos de Mujeres&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_movimientos_mujeres_for" name="tot_movimientos_mujeres_for" onclick="mostrar_total_movimientos_mujeres()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_movimientos_mujeres_for" name="tot_movimientos_mujeres_for" checked="checked" onclick="ocultar_total_movimientos_mujeres()">
				<div id="movimientos_mujeres2">
				total de movimientos:<br><input type="text" class="auth-input" id="tot_movimientos_mujeres_for2" onchange="mostrar_mov_muj()" name="tot_movimientos_mujeres_for2" maxLength="25"><br><br>
				</div>
				</p>
				<p>
				<label for="nombre_movimientos">Nombre de los movimientos participantes</label><br>
				<textarea id="nombre_movimientos" ng-model="nombre_movimientos" class="auth-input auth-textarea" type="text" value="" name="nombre_movimientos" rows="2" ></textarea>
				</p>
				<p>
					<label for="fec_ini">Fecha de Inicio:</label><br>
					<input name="fec_ini"class="auth-input" type="text" id="fec_ini" readonly required>
					<span style="color:red; font-size:12px" ng-show="form.fec_ini.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				<p>
					<label for="fec_fin">Fecha de Culminaci&oacute;n:</label><br>
					<input name="fec_fin" class="auth-input" type="text" id="fec_fin"    onchange='fechas()' readonly required>
					<span style="color:red; font-size:12px" ng-show="form.fec_fin.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				<br><br><br>
			</div>
		</section>
		<!--section 3-->
		<section class="step" data-step-title="Divulgaci&oacute;n">
		
			<div class="col-lg-6">
				<p>
				<label for="tipo_actividad_div">Tipo de Actividad:</label><br>
				<select class="auth-input" name="tipo_actividad_div" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione una opcion</option>
				<option value='Toma comunitaria'>Toma comunitaria</option>
				<option value='Bautizo'>Bautizo</option>
				<option value='Lanzamiento'>Lanzamiento</option>
				<option value='Premiacion'>Premiación</option>
				</select>

				</p>
				<p>
				<label for="act_nombre_div">Nombre de la Actividad</label><br>
				<input id="act_nombre_div" ng-model="act_nombre_div" class="auth-input" type="text" value="" name="act_nombre_div" required ></input>
				<span style="color:red; font-size:12px" ng-show="form.act_nombre_div.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				<p>
				<label for="tot_femeninos_div">Total Femenino</label><br>
				<input id="tot_femeninos_div" ng-model="tot_femeninos_div" class="auth-input" type="text" value="" name="tot_femeninos_div" onchange="suma_asiste_div()" required integer></input>
				<span style="color:red; font-size:12px" ng-show="form.tot_femeninos_div.$error.required"><br>* Este campo es obligatorio</span>
				<span style="color:red; font-size:12px" ng-show="form.tot_femeninos_div.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
				<label for="tot_masculinos_div">Total Masculino</label><br>
				<input id="tot_masculinos_div" ng-model="tot_masculinos_div" class="auth-input" type="text" value="" name="tot_masculinos_div" onchange="suma_asiste_div()" required integer></input>
				<span style="color:red; font-size:12px" ng-show="form.tot_masculinos_div.$error.required"><br>* Este campo es obligatorio</span>
				<span style="color:red; font-size:12px" ng-show="form.tot_masculinos_div.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
						<p>
				<label for="tot_asistentes_div">Total de Asistentes</label><br>

				<input id="tot_asistentes_div" ng-model="tot_asistentes_div" class="auth-input dis" type="text"  value=""  name="tot_asistentes_div"></input>
				
				</p>
				<p>
				<label for="tot_div_sexual_div">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_div_sexual_div" name="tot_div_sexual_div" onclick="mostrar_tot_div_sexual()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_div_sexual_div" name="tot_div_sexual_div" checked="checked" onclick="ocultar_tot_div_sexual()">
				<div id="tot_div_sexual2">
				Total de participantes:<br><input type="text" class="auth-input" id="tot_div_sexual_div2" onchange="mostrar_dv2()" name="tot_div_sexual_div2" maxLength="25"><br><br>

				</div>
				</p>
			
			</div>
			
			<div class="col-lg-6">
				<p>
				<label for="tot_mujeres_indigenas_div">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>

				1.Si <input type="radio" value="Si" id="tot_mujeres_indigenas_div" name="tot_mujeres_indigenas_div" onclick="mostrar_tot_mujeres_indigenas()">&nbsp;
				2.No <input type="radio" value="0" id="tot_mujeres_indigenas_div" name="tot_mujeres_indigenas_div" checked="checked" onclick="ocultar_tot_mujeres_indigenas()">
				<div id="tot_mujeres_indigenas2">
				Total de participantes:<br><input type="text" class="auth-input" id="tot_mujeres_indigenas_div2" onchange="mostrar_mind2()" name="tot_mujeres_indigenas_div2" maxLength="25"><br><br>

				</div>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_div">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_mujeres_discapacidad_div" name="tot_mujeres_discapacidad_div" onclick="mostrar_tot_mujeres_discapacidad()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_mujeres_discapacidad_div" name="tot_mujeres_discapacidad_div" checked="checked" onclick="ocultar_tot_mujeres_discapacidad()">
				<div id="tot_mujeres_discapacidad2">
				Total de participantes:<br><input type="text" class="auth-input" onchange="mostrar_disc2()" id="tot_mujeres_discapacidad_div2" name="tot_mujeres_discapacidad_div2" maxLength="25"><br><br>

				</div>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_div">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				1.Si <input type="radio" value="Si" id="tot_mujeres_afrodecendientes_div" name="tot_mujeres_afrodecendientes_div" onclick="mostrar_tot_mujeres_afrodecendientes()">&nbsp;
				2.No <input type="radio" value="0"  id="tot_mujeres_afrodecendientes_div" name="tot_mujeres_afrodecendientes_div" checked="checked" onclick="ocultar_tot_mujeres_afrodecendientes()">
				<div id="tot_mujeres_afrodecendientes2">
				Total de participantes:<br><input type="text" class="auth-input" onchange="mostrar_afro2()" id="tot_mujeres_afrodecendientes_div2" name="tot_mujeres_afrodecendientes_div2" maxLength="25"><br><br>

				</div>
				</p>
				<p>
				<label for="tipo_material">Tipo de material entregado</label><br>
				<select class="auth-input" ng-model="tipo_material" name="tipo_material" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione una opcion</option>
				<option value='Folletos'>Folletos</option>
				<option value='Diptricos'>D&iacute;ptricos</option>
				<option value='Tripticos'>Tr&iacute;pticos</option>
				<option value='Volantes'>Volantes</option>
				<option value='Afiches'>Afiches</option>
				<option value='Libros'>Libros</option>
				</select>
				<span style="color:red; font-size:12px" ng-show="form.tipo_material.$error.required"><br>* Este campo es obligatorio</span>
				</p>
				<p>
				<label for="cantidad">Cantidad</label><br>

				<input id="cantidad" ng-model="cantidad" class="auth-input" type="text" value="" name="cantidad" required integer></input>
				<span style="color:red; font-size:12px" ng-show="form.cantidad.$error.required"><br>* Este campo es obligatorio</span>
				<span style="color:red; font-size:12px" ng-show="form.cantidad.$error.integer"><br>* Este campo debe ser un numero entero</span>
				</p>
				<p>
				<label for="convocacion_medios">&iquest;Se realiz&oacute; convocatorias a los medios de comunicaci&oacute;n?:&#63;</label><br>
				1.Si <input type="radio" value="Si" name="convocacion_medios" onclick="mostrar_convocacion_medios()">&nbsp;
				2.No <input type="radio" value="No" name="convocacion_medios" checked="checked" onclick="ocultar_convocacion_medios()">
				<div id="convocacion_medios2">
				<input type="checkbox" name="radio" value="radio"> Radio<br>
				<input type="checkbox" name="prensa" value="prensa"> Prensa<br>
				<input type="checkbox" name="t_v" value="T.V."> T.V.<br>
				<input type="checkbox" name="medios_comunitarios" value="Medios Comunitarios"> Medios Comunitarios<br>
				<input type="checkbox" name="otros" value="Otros"> Otros<br>

				</div>
				</p>
			</div>
		</section>
<?php echo form_close(); ?>
</div>