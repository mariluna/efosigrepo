<h1>Editar Informe</h1>
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
function mostrar_total_asistentes_for(){
		var femenino =0;
		var masculino =0;
		femenino = document.getElementById("tot_femeninos_for").value;
	masculino = document.getElementById("tot_masculinos_for").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  var resultado= (parseInt(femenino)+parseInt(masculino));

		//document.getElementById("tot_asistentes_for").value = resultado;
		document.form.tot_asistentes_for.value = resultado;
		}
function mostrar_dv(){
		
		femenino = document.getElementById("tot_femeninos_for").value;
	div_sex = document.getElementById("tot_div_sexual_for2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  dv=parseInt(div_sex);
			if(dv>fem){
			alert("Los participantes de la Diversidad Sexual \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_div_sexual_for2.value ='';
		}}
function mostrar_mind(){
		
		femenino = document.getElementById("tot_femeninos_for").value;
	mind= document.getElementById("tot_mujeres_indigenas_for2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  mind=parseInt(mind);
			if(mind>fem){
			alert("Las Mujeres Indigenas \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_indigenas_for2.value ='';
		}}
function mostrar_disc(){
		
		femenino = document.getElementById("tot_femeninos_for").value;
		disc= document.getElementById("tot_mujeres_discapacidad_for2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  disc=parseInt(disc);
			if(disc>fem){
			alert("Las Mujeres con discapacidad \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_discapacidad_for2.value ='';
		}}
function mostrar_afro(){
		
		femenino = document.getElementById("tot_femeninos_for").value;
		afro= document.getElementById("tot_mujeres_afrodecendientes_for2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  afro=parseInt(afro);
			if(afro>fem){
			alert("Las Mujeres afrodecendientes \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_afrodecendientes_for2.value ='';
		}}
function mostrar_dv2(){
		
		femenino = document.getElementById("tot_femeninos_div").value;
	div_sex2= document.getElementById("tot_div_sexual_div2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  dv2=parseInt(div_sex2);
			if(dv2>fem){
			alert("Los participantes de la Diversidad Sexual \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_div_sexual_div2.value ='';
		}}
function mostrar_mind2(){
		
		femenino = document.getElementById("tot_femeninos_div").value;
	mind2= document.getElementById("tot_mujeres_indigenas_div2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  mind2=parseInt(mind2);
			if(mind2>fem){
			alert("Las Mujeres Indigenas \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_indigenas_div2.value ='';
		}}
function mostrar_disc2(){
		
		femenino = document.getElementById("tot_femeninos_div").value;
		disc2= document.getElementById("tot_mujeres_discapacidad_div2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  disc2=parseInt(disc2);
			if(disc2>fem){
			alert("Las Mujeres con discapacidad \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_discapacidad_div2.value ='';
		}}
function mostrar_afro2(){
		
		femenino = document.getElementById("tot_femeninos_div").value;
		afro2= document.getElementById("tot_mujeres_afrodecendientes_div2").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  fem=parseInt(femenino);
		  afro2=parseInt(afro2);
			if(afro2>fem){
			alert("Las Mujeres afrodecendientes \n no puede ser mayor que el total \n de participantes femeninos");
			document.form.tot_mujeres_afrodecendientes_div2.value ='';
		}}

function mostrar_total_asistentes_for2(){
		var femenino =0;
		
		femenino = document.getElementById("tot_femeninos_for").value;
	
		  var resultado= (parseInt(femenino));

		//document.getElementById("tot_asistentes_for").value = resultado;
		document.form.tot_asistentes_for.value = resultado;
		}
function mostrar_total_asistentes_div(){
		var femenino2 =0;
		var masculino2 =0;
		femenino2= document.getElementById("tot_femeninos_div").value;
		 masculino2 = document.getElementById("tot_masculinos_div").value;
		//var total = document.getElementById("tot_asistentes_for").value;
		
		  var resultado2= (parseInt(femenino2)+parseInt(masculino2));

		document.getElementById("tot_asistentes_div").value = resultado2;
		}
function mostrar_total_asistentes_div2(){
		var femenino2 =0;
		
		femenino2= document.getElementById("tot_femeninos_div").value;
		  var resultado2= (parseInt(femenino2));

		//document.getElementById("tot_asistentes_for").value = resultado;
		document.getElementById("tot_asistentes_div").value = resultado2;
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
<div class="auth-form" ng-controller="informeController" ng-app="informe">
	<?php
	    $d=array('name' => 'form');
		echo form_open(base_url().'api/informe_api/update',$d);
	?>
	<input type="hidden" name="id" value="<?php echo $data[0]->id_informe; ?>">
	
		<div class="col-lg-4">
	
	    	   <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			 <label for="curso">Curso:</label><br>
			<select class="auth-input"id="curso" class="auth-input" name="curso" > 
				<?php 
				
					echo '<option value="'.$cursosel[0]->id_curso.'" selected>'.$cursosel[0]->nombre.'</option>';
					foreach ($cursos as $cursonot){
						echo '<option value="'.$cursosnot->id_curso.'">'.$cursosnot->nombre.'</option>'; 
					}
				?>
			</select>
	   </p>
	   <br>
       <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			 <label for="redi">REDI:</label><br>
			<select class="auth-input" id="redi" class="auth-input" name="redi" > 
				<?php 
					
					echo '<option value="'.$redisel[0]->id_redi.'" selected>'.$redisel[0]->nombre.'</option>';
					foreach ($redis as $rediso){
						echo '<option value="'.$rediso->id_redi.'">'.$rediso->nombre.'</option>'; 
					}
				?>
			</select>
	   </p>
	   <br>
	   <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			 <label for="estado">Estado:</label><br>
			 <select class="auth-input"id="est" class="auth-input" name="estado" > 
			 <?php 
					
					echo '<option value="'.$estadosel[0]->id_estado.'" selected>'.$estadosel[0]->nombre.'</option>';
					foreach ($estados as $estadoso){
						echo '<option value="'.$estadoso->id_estado.'">'.$estadoso->nombre.'</option>'; 
					}
				?>
				</select>
	   </p><br>
	   <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
         <label for="municipio">Municipio:</label><br>
         <select class="auth-input" id="mun" class="auth-input" name="municipio" > 
				<?php 
					
					echo '<option value="'.$municipiosel[0]->id_municipio.'" selected>'.$municipiosel[0]->nombre.'</option>';
					foreach ($municipios as $municipioso){
						echo '<option value="'.$municipioso->id_municipio.'">'.$municipioso->nombre.'</option>'; 
					}
				?>
			</select>
		</p> 
		<br>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
         <label for="parroquia">Parroquia:</label><br>
         <select class="auth-input" id="par" class="auth-input" name="parroquia" > 
				<?php 
					
					echo '<option value="'.$parroquiasel[0]->id_parroquia.'" selected>'.$parroquiasel[0]->nombre.'</option>';
					foreach ($parroquias as $parroquiaso){
						echo '<option value="'.$parroquiaso->id_parroquia.'">'.$parroquiaso->nombre.'</option>'; 
					}
				?>
			</select>
		</p> 	<br>
<p>
         <label for="user">Nombre y Apellido de la coordinadora:</label><br>
		 <input id="user" class="auth-input dis" type="hidden" value="<?php echo $data[0]->user; ?>" name="user" ></input>
		<input id="user2" class="auth-input dis" type="text"  name="user2" readonly placeholder="<?php  echo $data[0]->usuario;?>"></input>
          
		</p>
		<p>
				<label for="correo">Correo Electr&oacute;nico:</label><br>
				<input id="correo" class="auth-input dis" type="text" value="" name="correo" rows="2" readonly placeholder="<?php  echo $data[0]->email;?>"></input>
				</p> 
				<p><label>FORMACI&Oacute;N</label></p>
				<p>
				<label for="tipo_actividad_for">Tipo de Actividad:</label><br>
				<select class="auth-input" id="tipo_actividad_for" name="tipo_actividad_for" style="max-width: 300px !important; text-align: center;" required>
				<option value='Taller' <?php if($data[0]->tipo_actividad_for == "Taller"){ echo "selected";} ?> >Taller</option>
				<option value='Foro' <?php if($data[0]->tipo_actividad_for == "Foro"){ echo "selected";} ?> >Foro</option>
				<option value='Encuentro' <?php if($data[0]->tipo_actividad_for == "Encuentro"){ echo "selected";} ?> >Encuentro</option>
				<option value='Seminario' <?php if($data[0]->tipo_actividad_for == "Seminario"){ echo "selected";} ?> >Seminario</option>
				<option value='Congreso' <?php if($data[0]->tipo_actividad_for == "Congreso"){ echo "selected";} ?> >Congreso</option>
				<option value='Conversatorio' <?php if($data[0]->tipo_actividad_for == "Conversatorio"){ echo "selected";} ?>>Conversatorio</option>
				<option value='Diplomado' <?php if($data[0]->tipo_actividad_for == "Diplomado"){ echo "selected";} ?>>Diplomado</option>
				<option value='Curso' <?php if($data[0]->tipo_actividad_for == "Curso"){ echo "selected";} ?>>Curso</option>	
				<option value='Plan de Formación' <?php if($data[0]->tipo_actividad_for == "Plan de Formación"){ echo "selected";} ?>>Plan de Formaci&oacute;n</option>	
				</select>
				
				</p> 
				<p>
				 <label for="act_nombre_for">Nombre de la Actividad:</label><br>
				  <input id="act_nombre_for" class="auth-input" type="text" name="act_nombre_for" rows="2" value="<?php  echo $data[0]->act_nombre_for;?>"></input>
				</p> 						
				<p>
				<label for="tot_femeninos_for">Total Femenino</label><br>
				 <input id="tot_femeninos_for" class="auth-input" type="text" name="tot_femeninos_for" rows="2" onchange="mostrar_total_asistentes_for2()" value="<?php  echo $data[0]->tot_femeninos_for;?>" required integer></input>
				</p>
				<p>
				<label for="tot_masculinos_for">Total Masculino</label><br>
				<input id="tot_masculinos_for" class="auth-input" type="text" name="tot_masculinos_for" rows="2" onchange="mostrar_total_asistentes_for()" value="<?php  echo $data[0]->tot_masculinos_for;?>" required integer></input>
				</p>
				<p>
				  <label for="tot_asistentes_for">Total de Asistentes</label><br>
				  <input id="tot_asistentes_for" class="auth-input dis" type="text"  name="tot_asistentes_for" rows="2" value="<?php  echo $data[0]->tot_asistentes_for;?>"></input>
				</p>
			</div>

			<div class="col-lg-4">
					
				<p>
					<label for="tot_div_sexual_for">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
					<?php //print_r($data[0]->tot_div_sexual_for);
					if($data[0]->tot_div_sexual_for <= '0'){
						echo "<label>
								1.Si <input type='radio' value='Si' name='tot_div_sexual_for' onclick='mostrar_total_diversidad_sexual()'>&nbsp;</label>
								<label>
								2.No <input type='radio' value='0' name='tot_div_sexual_for' checked='checked' onclick='ocultar_total_diversidad_sexual()'>
								</label>";
						echo "<br>";
						echo "<div id='diversidad_sexual2'>
						<label>Total de participantes:</label><br><input type='text' onchange='mostrar_dv()' id='tot_div_sexual_for2' name='tot_div_sexual_for2' class='auth-input' value='".$data[0]->tot_div_sexual_for."' />
						</div>";
					}else{
					echo "<script>
							$(function(){
							$('#diversidad_sexual2').show();
							});
							</script>
					<label>1.Si <input type='radio' value='Si' name='tot_div_sexual_for' checked='checked' onclick='mostrar_total_diversidad_sexual()'>&nbsp;</label>
					<label>2.No <input type='radio' value='0' name='tot_div_sexual_for' onclick='ocultar_total_diversidad_sexual()'>
					</label>";
					echo "<br>";
					echo "<div id='diversidad_sexual2'>
					<label>Total de participantes:</label><br><input type='text' class='auth-input' onchange='mostrar_dv()' id='tot_div_sexual_for2'name='tot_div_sexual_for2' value='".$data[0]->tot_div_sexual_for."' />
					</div>";
					}?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_for">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_for=="0"){ 
					echo "<label>1.Si <input type='radio' value='Si' name='tot_mujeres_indigenas_for' onclick='mostrar_total_mujeres_indigenas()' >&nbsp;</label>
					<label>2.No <input type='radio' value='0' name='tot_mujeres_indigenas_for' onclick='ocultar_total_mujeres_indigenas()' checked='checked'></label>";
					echo "<br>";
					echo "<div id='mujeres_indigenas2'>
				<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_indigenas_for2' onchange='mostrar_mind()' class='auth-input' name='tot_mujeres_indigenas_for2' value='".$data[0]->tot_mujeres_indigenas_for."' />";
					echo"</div>";
				}else{
					echo "<script>
							$(function(){
							$('#mujeres_indigenas2').show();
							});
							</script>
					<label>1.Si <input type='radio' value='Si' name='tot_mujeres_indigenas_for' checked='checked' onclick='mostrar_total_mujeres_indigenas()'>&nbsp;</label>
					<label>2.No <input type='radio' value='0' name='tot_mujeres_indigenas_for' onclick='ocultar_total_mujeres_indigenas()'></label>";
					echo "<br>";
					echo "<div id='mujeres_indigenas2'>";
					echo "<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_indigenas_for2' onchange='mostrar_mind()' class='auth-input' name='tot_mujeres_indigenas_for2' value='".$data[0]->tot_mujeres_indigenas_for."' />";
					echo"</div>";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_for">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_for=="0")
				{ echo "<label>1.Si <input type='radio' value='Si' name='tot_mujeres_discapacidad_for' onclick='mostrar_total_mujeres_discapacidad()'>&nbsp;</label>
					<label>2.No <input type='radio' value='0' name='tot_mujeres_discapacidad_for'  onclick='ocultar_total_mujeres_discapacidad()' checked='checked'></label>";
				echo "<br>";
				echo "<div id='mujeres_discapacidad2'>
				<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_discapacidad_for2' onchange='mostrar_disc()' name='tot_mujeres_discapacidad_for2' class='auth-input' value='".$data[0]->tot_mujeres_discapacidad_for."' />";
				echo "</div>";
				}else{
					echo "<script>
							$(function(){
							$('#mujeres_discapacidad2').show();
							});
							</script>
					<label>1.Si <input type='radio' value='Si' name='tot_mujeres_discapacidad_for' checked='checked'  onclick='mostrar_total_mujeres_discapacidad()'>&nbsp;</label>
					<label>2.No <input type='radio' value='0' name='tot_mujeres_discapacidad_for' onclick='ocultar_total_mujeres_discapacidad()'></label>";
					echo "<br>";
					echo "<div id='mujeres_discapacidad2'>";
					echo "<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_discapacidad_for2' onchange='mostrar_disc()' name='tot_mujeres_discapacidad_for2' class='auth-input' value='".$data[0]->tot_mujeres_discapacidad_for."' />";
					echo"</div>";
				}?>

				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_for">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_afrodecendientes_for' onclick='mostrar_total_mujeres_afrodecendientes()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_afrodecendientes_for' checked='checked' onclick='ocultar_total_mujeres_afrodecendientes()'></label>";
				echo "<br>";
				echo"<div id='mujeres_afrodecendientes2'>";
				echo "<label>Total de participantes:</label><br><input type='text' class='auth-input' onchange='mostrar_afro()' id='tot_mujeres_afrodecendientes_for2' name='tot_mujeres_afrodecendientes_for2' value='".$data[0]->tot_mujeres_afrodecendientes_for."' />";
				echo"</div>";
				}else{
				echo "<script>
							$(function(){
							$('#mujeres_afrodecendientes2').show();
							});
							</script>
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_afrodecendientes_for' checked='checked' onclick='mostrar_total_mujeres_afrodecendientes()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_afrodecendientes_for' onclick='ocultar_total_mujeres_afrodecendientes()'></label>";
				echo "<br>";
				echo"<div id='mujeres_afrodecendientes2'>";
				echo "<label>Total de participantes:</label><br><input type='text' class='auth-input' onchange='mostrar_afro()' id='tot_mujeres_afrodecendientes_for2' name='tot_mujeres_afrodecendientes_for2' value='".$data[0]->tot_mujeres_afrodecendientes_for."' />";
				echo"</div>";
				}?>
				</p>
				<p>
				<label for="tot_movimientos_mujeres_for">&iquest;Hubo participaci&oacute;n de Movimientos de Mujeres&#63;</label><br>
				<?php if($data[0]->tot_movimientos_mujeres_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_movimientos_mujeres_for'onclick='mostrar_total_movimientos_mujeres()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_movimientos_mujeres_for' checked='checked' onclick='ocultar_total_movimientos_mujeres()'>
				</label>";
				echo "<br>";
				echo "<div id='movimientos_mujeres2'>";
				echo "<label>Total de participantes:</label><br><input type='text' class='auth-input' name='tot_movimientos_mujeres_for2' value='".$data[0]->tot_movimientos_mujeres_for."' />";
				echo "</div>";}
				else{
				echo "<script>
							$(function(){
							$('#movimientos_mujeres2').show();
							});
							</script>
				<label>1.Si <input type='radio' value='Si' name='tot_movimientos_mujeres_for' checked='checked' onclick='mostrar_total_movimientos_mujeres()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_movimientos_mujeres_for' onclick='ocultar_total_movimientos_mujeres()'>
				</label>";
				echo "<br>";
				echo "<div id='movimientos_mujeres2'>";
				echo "<label>Total de participantes:</label><br><input type='text' class='auth-input' name='tot_movimientos_mujeres_for2' value='".$data[0]->tot_movimientos_mujeres_for."' />";
				echo "</div>";
				}?>
				</p>
				<p>
				<label for="nombre_movimientos">Nombre de los movimientos participantes</label><br>
				<textarea id="nombre_movimientos" class="auth-textarea auth-input" type="text" value="" name="nombre_movimientos" rows="2"><?php  echo $data[0]->nombre_movimiento_for;?></textarea>
				</p>
				<p>
				<label for="fec_ini">Fecha de Inicio</label><br>
				<?php  
					$fec_ini= explode("-",$data[0]->fec_inicio_for);
				?>
				<input id="fec_ini" class="auth-input" type="text" name="fec_ini" rows="2" value="<?php echo $fec_ini[2]."-".$fec_ini[1]."-".$fec_ini[0]; ?>"></input>
				</p>
				<p>
				<label for="fec_fin">Fecha de Culminaci&oacute;n:</label><br>
				<?php  
					$fec_fin= explode("-",$data[0]->fec_final_for);
				?>
				<input id="fec_fin" class="auth-input" type="text" name="fec_fin" rows="2" onchange='fechas()' value="<?php echo $fec_fin[2]."-".$fec_fin[1]."-".$fec_fin[0]; ?>"></input>
				</p>
				<p><label>DIVULGACI&Oacute;N</label></p>
				<p>
				<label for="tipo_actividad_div">Tipo de Actividad:</label><br>
				<select class="auth-input" name="tipo_actividad_div" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione una opcion</option>
				<option value='Toma comunitaria' <?php if($data[0]->tipo_actividad_div == "Toma comunitaria"){ echo "selected";} ?>>Toma comunitaria</option>
				<option value='Bautizo'  <?php if($data[0]->tipo_actividad_div == "Bautizo"){ echo "selected";} ?>>Bautizo</option>
				<option value='Lanzamiento'  <?php if($data[0]->tipo_actividad_div == "Lanzamiento"){ echo "selected";} ?>>Lanzamiento</option>
				<option value='Premiacion'  <?php if($data[0]->tipo_actividad_div == "Premiacion"){ echo "selected";} ?>>Premiación</option>
				</select>

				</p>
				<p>
				<label for="act_nombre_div">Nombre de la Actividad</label><br>
				 <input id="act_nombre_div" class="auth-input" type="text" name="act_nombre_div" rows="2" value="<?php  echo $data[0]->act_nombre_div;?>"></input>
				</p>
				
		</div>
		<div class="col-lg-4">
				<p>
				<label for="tot_femeninos_div">Total Femenino</label><br>
				<input id="tot_femeninos_div" class="auth-input" type="text" name="tot_femeninos_div" rows="2" onchange="mostrar_total_asistentes_div2()" value="<?php  echo $data[0]->tot_femeninos_div;?>"></input>
				</p>
				<p>
				<label for="tot_masculinos_div">Total Masculino</label><br>
				<input id="tot_masculinos_div" class="auth-input" type="text" name="tot_masculinos_div" rows="2" onchange="mostrar_total_asistentes_div()" value="<?php  echo $data[0]->tot_masculinos_div;?>"></input>
				</p>
				<p>
				<label for="tot_asistentes_div">Total de Asistentes</label><br>
				<input id="tot_asistentes_div" class="auth-input dis" type="text"  name="tot_asistentes_div" rows="2" value="<?php  echo $data[0]->tot_asistentes_div;?>"></input>
				</p>

				<p>
				<label for="tot_div_sexual_div">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				<?php if($data[0]->tot_div_sexual_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_div_sexual_div' onclick='mostrar_tot_div_sexual()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_div_sexual_div' checked='checked' onclick='ocultar_tot_div_sexual()'>
				</label>";
				echo "<br>";
				echo "<div id='tot_div_sexual2'>";
				echo "<label>Total de participantes:</label><br><input type='text' id='tot_div_sexual_div2' onchange='mostrar_dv2()' name='tot_div_sexual_div2' class='auth-input' value='".$data[0]->tot_div_sexual_div."' />";
				echo "</div>";}
				else{
				echo "<script>
							$(function(){
							$('#tot_div_sexual2').show();
							});
							</script>
				<label>1.Si <input type='radio' value='Si' name='tot_div_sexual_div' checked='checked' onclick='mostrar_tot_div_sexual()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_div_sexual_div' onclick='ocultar_tot_div_sexual()'>
				</label>";
				echo "<br>";
				echo "<div id='tot_div_sexual2'>";
				echo "<label>Total de participantes:</label><br><input type='text' id='tot_div_sexual_div2' onchange='mostrar_dv2()' name='tot_div_sexual_div2' class='auth-input' value='".$data[0]->tot_div_sexual_div."' />";
				echo "</div>";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_div">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas &#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_indigenas_div' onclick='mostrar_tot_mujeres_indigenas()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_indigenas_div' checked='checked' onclick='ocultar_tot_mujeres_indigenas()'>
				</label>";
				echo "<br><div id='tot_mujeres_indigenas2'>";
				echo "<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_indigenas_div2' onchange='mostrar_mind2()' name='tot_mujeres_indigenas_div2' class='auth-input' value='".$data[0]->tot_mujeres_indigenas_div."' />";
				echo"</div>";}
				else{
				echo "<script>
							$(function(){
							$('#tot_mujeres_indigenas2').show();
							});
							</script>
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_indigenas_div' checked='checked' onclick='mostrar_tot_mujeres_indigenas()'>&nbsp;</label>
				2.No <input type='radio' value='0' name='tot_mujeres_indigenas_div' onclick='ocultar_tot_mujeres_indigenas()'>
				</label>";
				echo "<br><div id='tot_mujeres_indigenas2'>";
				echo "<label>Total de participantes:</label><br><input type='text' id='tot_mujeres_indigenas_div2' onchange='mostrar_mind2()' name='tot_mujeres_indigenas_div2' class='auth-input' value='".$data[0]->tot_mujeres_indigenas_div."' />";
				echo"</div>";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_div">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad &#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_discapacidad_div' onclick='mostrar_tot_mujeres_discapacidad()' >&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_discapacidad_div' checked='checked' onclick='ocultar_tot_mujeres_discapacidad()'>
				</label>";
				echo "<br><div id='tot_mujeres_discapacidad2'>";
				echo "<label>Total de participantes:</label><br><input type='text' onchange='mostrar_disc2()' id='tot_mujeres_discapacidad_div2' name='tot_mujeres_discapacidad_div2' class='auth-input' value='".$data[0]->tot_mujeres_discapacidad_div."' />";
				echo"</div>";}
				else{
				echo "<script>
							$(function(){
							$('#tot_mujeres_discapacidad2').show();
							});
					  </script>
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_discapacidad_div' checked='checked' onclick='mostrar_tot_mujeres_discapacidad()'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_discapacidad_div' onclick='ocultar_tot_mujeres_discapacidad()'>
				</label>";
				echo "<br><div id='tot_mujeres_discapacidad2'>";
				echo "<label>Total de participantes:</label><br><input type='text' onchange='mostrar_disc2()' id='tot_mujeres_discapacidad_div2' name='tot_mujeres_discapacidad_div2' class='auth-input' value='".$data[0]->tot_mujeres_discapacidad_div."' />";
				echo"</div>";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_div">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes &#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_afrodecendientes_div' onclick='mostrar_tot_mujeres_afrodecendientes()' >&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_afrodecendientes_div' checked='checked' onclick='ocultar_tot_mujeres_afrodecendientes()'>
				</label>";
				echo "<br><div id='tot_mujeres_afrodecendientes2'>";
				echo "<label>Total de participantes:</label><br><input type='text' onchange='mostrar_afro2()' id='tot_mujeres_afrodecendientes_div2' name='tot_mujeres_afrodecendientes_div2' class='auth-input' value='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
				echo "</div>";}
				else{
				echo "<script>
							$(function(){
							$('#tot_mujeres_afrodecendientes2').show();
							});
					  </script>
				<label>1.Si <input type='radio' value='Si' name='tot_mujeres_afrodecendientes_div' onclick='mostrar_tot_mujeres_afrodecendientes()' checked='checked'>&nbsp;</label>
				<label>2.No <input type='radio' value='0' name='tot_mujeres_afrodecendientes_div' onclick='ocultar_tot_mujeres_afrodecendientes()'>
				</label>";
				echo "<br><div id='tot_mujeres_afrodecendientes2'>";
				echo "<label>Total de participantes:</label><br><input type='text' onchange='mostrar_afro2()' id='tot_mujeres_afrodecendientes_div2' name='tot_mujeres_afrodecendientes_div2' class='auth-input' value='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
				echo "</div>";
				}?>
				</p>
				<p>
				<label for="tipo_material_div">Tipo de material entregado:</label><br>
				<select class="auth-input" id="tipo_material_div" name="tipo_material_div" style="max-width: 300px !important; text-align: center;" required>
					<option value='Folletos' <?php if($data[0]->tipo_material_div == "Folletos"){ echo "selected";} ?> >Folletos</option>
					<option value='Diptricos' <?php if($data[0]->tipo_material_div == "Diptricos"){ echo "selected";} ?>>D&iacute;ptricos</option>
					<option value='Tripticos' <?php if($data[0]->tipo_material_div == "Tripticos"){ echo "selected";} ?>>Tr&iacute;pticos</option>
					<option value='Volantes' <?php if($data[0]->tipo_material_div == "Volantes"){ echo "selected";} ?>>Volantes</option>
					<option value='Afiches' <?php if($data[0]->tipo_material_div == "Afiches"){ echo "selected";}  ?>>Afiches</option>
					<option value='Libros' <?php if($data[0]->tipo_material_div == "Libros"){ echo "selected";} ?>>Libros</option>
				</select>
				</p>
				
				<p>
				<label for="cantidad_div">Cantidad:</label><br>
				<input id="cantidad_div" class="auth-input" type="text" value="<?php  echo $data[0]->cantidad_div;?>" name="cantidad_div" rows="2"></input>
				</p>
				<p>
				<label for="convocacion_medios_div">&iquest;Se realiz&oacute; convocatorias a los medios de comunicaci&oacute;n&#63;</label><br>
				<?php if($data[0]->convocacion_medios_div=="No")
				{ echo "
				<label>1.Si <input type='radio' value='Si' name='convocacion_medios_div' onclick='mostrar_convocacion_medios()'>&nbsp;</label>
				<label>2.No <input type='radio' value='No' name='convocacion_medios_div' checked='checked' onclick='ocultar_convocacion_medios()'></label>";
				echo "<br>
					<div id='convocacion_medios2'>";
					//echo "<label>Total de participantes:</label><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
					if($data[0]->medios_radio_div==" " || $data[0]->medios_radio_div=="false" || $data[0]->medios_radio_div==NULL){
					echo "<input type='checkbox' name='radio' value='radio'> Radio<br>";
					}else{
					echo "<input type='checkbox' name='radio' value='radio' checked='checked'> Radio<br>";
					}
					if($data[0]->medios_prensa_div==" " || $data[0]->medios_prensa_div=="false" || $data[0]->medios_prensa_div==NULL){
					echo "<input type='checkbox' name='prensa' value='prensa'>Prensa<br>";
					}else{
					echo "<input type='checkbox' name='prensa' value='prensa' checked='checked'> Prensa<br>";
					}
					if($data[0]->medios_tv_div==" " || $data[0]->medios_tv_div=="false" || $data[0]->medios_tv_div==NULL){
					echo "<input type='checkbox' name='t_v' value='T.V.'>T.V.<br>";
					}else{
					echo "<input type='checkbox' name='t_v' value='T.V.' checked='checked'> T.V.<br>";
					}
					if($data[0]->medios_comunitarios_div==" " || $data[0]->medios_comunitarios_div=="false" || $data[0]->medios_comunitarios_div==NULL){
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios'>Medios Comunitarios<br>";
					}else{
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios' checked='checked'> Medios Comunitarios<br>";
					}
					if($data[0]->medios_otros_div==" " || $data[0]->medios_otros_div=="false" || $data[0]->medios_otros_div==NULL){
					echo "<input type='checkbox' name='otros' value='otros'>Otros<br>";
					}else{
					echo "<input type='checkbox' name='otros' value='otros' checked='checked'> Otros<br>";
					}
					echo"</div>";
				}else{
					echo "
					<script>
							$(function(){
							$('#convocacion_medios2').show();
							});
					  </script>
					<label>1.Si <input type='radio' value='Si' name='convocacion_medios_div' checked='checked' onclick='mostrar_convocacion_medios()'>&nbsp;</label>
					<label>2.No <input type='radio' value='No' name='tconvocacion_medios_div' onclick='ocultar_convocacion_medios()'></label>";
					echo "<br>
					<div id='convocacion_medios2'>";
					//echo "<label>Total de participantes:</label><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
					if($data[0]->medios_radio_div==" " || $data[0]->medios_radio_div=="false" || $data[0]->medios_radio_div==NULL){
					echo "<input type='checkbox' name='radio' value='radio'> Radio<br>";
					}else{
					echo "<input type='checkbox' name='radio' value='radio' checked='checked'> Radio<br>";
					}
					if($data[0]->medios_prensa_div==" " || $data[0]->medios_prensa_div=="false" || $data[0]->medios_prensa_div==NULL){
					echo "<input type='checkbox' name='prensa' value='prensa'>Prensa<br>";
					}else{
					echo "<input type='checkbox' name='prensa' value='prensa' checked='checked'> Prensa<br>";
					}
					if($data[0]->medios_tv_div==" " || $data[0]->medios_tv_div=="false" || $data[0]->medios_tv_div==NULL){
					echo "<input type='checkbox' name='t_v' value='T.V.'>T.V.<br>";
					}else{
					echo "<input type='checkbox' name='t_v' value='T.V.' checked='checked'> T.V.<br>";
					}
					if($data[0]->medios_comunitarios_div==" " || $data[0]->medios_comunitarios_div=="false" || $data[0]->medios_comunitarios_div==NULL){
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios'>Medios Comunitarios<br>";
					}else{
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios' checked='checked'> Medios Comunitarios<br>";
					}
					if($data[0]->medios_otros_div==" " || $data[0]->medios_otros_div=="false" || $data[0]->medios_otros_div==NULL){
					echo "<input type='checkbox' name='otros' value='otros'>Otros<br>";
					}else{
					echo "<input type='checkbox' name='otros' value='otros' checked='checked'> Otros<br>";
					}
				echo"</div>";
				}
				
				?>
				</p>
		</div>
	
	<div class="col-lg-12">
		<p>
			 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
		</p>

	   <?php echo form_close(); ?>
		<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>informe">Volver</a>
	</div>
		<!--<p>
			 <input ng-click="edit(<?php //echo $data[0]->id_informe; ?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
		</p>

		<a class="auth-but-fix .btn-danger fix-back" href="<?php// echo base_url()?>informe">Volver</a>
	</div>-->
</div>