<h1>Editar Informe</h1>
<hr>
<script>
function mostrar_total_diversidad_sexual(){
			$("#diversidad_sexual2").show("blind");
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
<div class="auth-form" ng-controller="informeController as uni" ng-app="informe">
<?php
	    $d=array('name' => 'form');
		echo form_open(base_url().'api/informe_api/update',$d);
		
	?>
	<input type="hidden" name="id" value="<?php echo $data[0]->id_informe; ?>">
	<!--
	   <p>
			<label for="titulo">Titulo:</label><br>
			<input id="titulo" required class="auth-input " type="text" value="<?php echo $data[0]->titulo; ?>" name="titulo" ></input>

	   </p>
	   -->
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
	   </p><br>
         <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			 <label for="redi">REDI:</label><br>
			<select class="auth-input"id="redi" class="auth-input" name="redi" > 
				<?php 
					
					echo '<option value="'.$redisel[0]->id_redi.'" selected>'.$redisel[0]->nombre.'</option>';
					foreach ($redis as $rediso){
						echo '<option value="'.$rediso->id_redi.'">'.$rediso->nombre.'</option>'; 
					}
				?>
			</select>
	   </p><br>

	   <p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
			 <label for="estado">Estado:</label><br>
			 <select class="auth-input"id="estado" class="auth-input" name="estado" > 
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
         <select class="auth-input" id="municipio" class="auth-input" name="municipio" > 
				<?php 
					
					echo '<option value="'.$municipiosel[0]->id_municipio.'" selected>'.$municipiosel[0]->nombre.'</option>';
					foreach ($municipios as $municipioso){
						echo '<option value="'.$municipioso->id_municipio.'">'.$municipioso->nombre.'</option>'; 
					}
				?>
			</select>
		</p> <br>
		<p style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">
         <label for="parroquia">Parroquia:</label><br>
         <select class="auth-input" id="parroquia" class="auth-input" name="parroquia" > 
				<?php 
					
					echo '<option value="'.$parroquiasel[0]->id_parroquia.'" selected>'.$parroquiasel[0]->nombre.'</option>';
					foreach ($parroquias as $parroquiaso){
						echo '<option value="'.$parroquiaso->id_parroquias.'">'.$parroquiaso->nombre.'</option>'; 
					}
				?>
			</select>
		</p> 	<br>
				
		<p>
         <label for="user">Nombre y Apellido de la coordinadora:</label><br>
          <input id="user" class="auth-input dis" type="text" value="" name="user" rows="2" readonly placeholder="<?php  echo $data[0]->usuario;?>"></input>
		</p>
		<p>
				<label for="correo">Correo Electr&oacute;nico:</label><br>
				<input id="correo" class="auth-input dis" type="text" value="" name="correo" rows="2" readonly placeholder="<?php  echo $data[0]->email;?>"></input>
				</p> 
				<p>
				<label for="tipo_actividad_for">Tipo de Actividad:</label><br>
				 <input id="tipo_actividad_for" class="auth-input" type="text" name="tipo_actividad_for" rows="2" value="<?php  echo $data[0]->tipo_actividad_for;?>"></input>
				</p> 
				<p>
				 <label for="act_nombre_for">Tipo de Actividad:</label><br>
				  <input id="act_nombre_for" class="auth-input" type="text" name="act_nombre_for" rows="2" value="<?php  echo $data[0]->act_nombre_for;?>"></input>
				</p> 		
				<p>
				  <label for="tot_asistentes_for">Total de Asistentes</label><br>
				  <input id="tot_asistentes_for" class="auth-input" type="text"  name="tot_asistentes_for" rows="2" value="<?php  echo $data[0]->tot_asistentes_for;?>"></input>
				</p>				
				<p>
				<label for="tot_femeninos_for">Total Femenino</label><br>
				 <input id="tot_femeninos_for" class="auth-input" type="text" name="tot_femeninos_for" rows="2" value="<?php  echo $data[0]->tot_femeninos_for;?>"></input>
				</p>
				<p>
				<label for="tot_masculinos_for">Total Masculino</label><br>
				<input id="tot_masculinos_for" class="auth-input" type="text" name="tot_masculinos_for" rows="2" value="<?php  echo $data[0]->tot_masculinos_for;?>"></input>
				</p>
			</div>
			<div class="col-lg-4">

				<p>
				<label for="tot_div_sexual_for">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				<?php //print_r($data[0]->tot_div_sexual_for);
				if($data[0]->tot_div_sexual_for <= '0'){ ?>
				<label>
				1.Si <input type='radio' value='Si' name='tot_div_sexual_for' onclick='mostrar_total_diversidad_sexual()'>&nbsp;
				2.No <input type='radio' value='0' name='tot_div_sexual_for' checked='checked' onclick='ocultar_total_diversidad_sexual()'>
				</label>
				<?php }else{ ?>
				
				<label>
				1.Si <input type='radio' value='Si' name='tot_div_sexual_for' checked='checked' onclick='mostrar_total_diversidad_sexual()'>&nbsp;
				2.No <input type='radio' value='0' name='tot_div_sexual_for' onclick='ocultar_total_diversidad_sexual()'>
				</label>
				<br>
				<div id='diversidad_sexual2'>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input' value="<?php echo $data[0]->tot_div_sexual_for; ?>"/>
				</div>
				
				<?php } ?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_for">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_for=="0"){ ?>
				<label>
				1.Si <input type='radio' value='' name='tot_mujeres_indigenas_for' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_indigenas_for' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>
				1.Si <input type='radio' value='' name='tot_mujeres_indigenas_for' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_indigenas_for'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_indigenas_for;?>" />
				<?php } ?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_for">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_for=="0"){ ?>
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_for' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_discapacidad_for' checked='checked'>
				</label>
				<?php }else{ ?>
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_for' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_discapacidad_for'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_discapacidad_for; ?>" />
				<?php } ?>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_for">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_for=="0"){ ?>
				<label>
				1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' checked='checked'>
				</label>
				<?php } else{ ?>
				
				<label>
				1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_for'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_afrodecendientes_for; ?>" />
				}?>
				</p>
				<p>
				<label for="tot_movimientos_mujeres_for">&iquest;Hubo participaci&oacute;n de Movimientos de Mujeres&#63;</label><br>
				<?php if($data[0]->tot_movimientos_mujeres_for=="0"){ ?>
				<label>
				1.Si <input type='radio' value='' name='tot_movimientos_mujeres_for' >&nbsp;
				2.No <input type='radio' value='' name='tot_movimientos_mujeres_for' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>
				1.Si <input type='radio' value='' name='tot_movimientos_mujeres_for' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_movimientos_mujeres_for'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_movimientos_mujeres_for;?>" />
				<?php } ?>
				</p>
				<p>
				<label for="nombre_movimientos">Nombre de los movimientos participantes</label><br>
				<input id="nombre_movimientos" class="auth-input dis" type="text" value="" name="nombre_movimientos" rows="2" readonly placeholder="<?php  echo $data[0]->nombre_movimiento_for;?>"></input>
				</p>
				<p>
				<label for="fec_ini">Fecha de Inicio</label><br>
				<input id="fec_ini" class="auth-input dis" type="text" value="" name="fec_ini" rows="2" readonly placeholder="<?php  echo $data[0]->fec_inicio_for;?>"></input>
				</p>
				<p>
				<label for="fec_fin">Fecha de Culminaci&oacute;n:</label><br>
				<input id="fec_fin" class="auth-input dis" type="text" value="" name="fec_fin" rows="2" readonly placeholder="<?php  echo $data[0]->fec_final_for;?>"></input>
				</p>
				
		</div>
		<div class="col-lg-4">
				
				<p>
				<label for="tot_div_sexual_div">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				<?php if($data[0]->tot_div_sexual_div=="0"){?>
				<label>1.Si <input type='radio' value='' name='tot_div_sexual_div' >&nbsp;
				2.No <input type='radio' value='' name='tot_div_sexual_div' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>
				1.Si <input type='radio' value='' name='tot_div_sexual_div' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_div_sexual_div'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_div_sexual_div;?>" />
				<?php } ?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_div">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_div=="0"){?>
				<label>1.Si <input type='radio' value='' name='tot_mujeres_indigenas_div' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_indigenas_div' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>
				1.Si <input type='radio' value='' name='tot_mujeres_indigenas_div' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_indigenas_div'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_indigenas_div; ?>" />
				}?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_div">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_div=="0"){ ?>
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_div' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_discapacidad_div' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_div' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_discapacidad_div'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_discapacidad_div; ?>" />
				<?php } ?>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_div">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_div=="0"){?>

				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' >&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' checked='checked'>
				</label>
				<?php }else{ ?>
				
				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_div'>
				</label>
				<br>
				<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder="<?php echo $data[0]->tot_mujeres_afrodecendientes_div; ?>" />
				<?php } ?>
				</p>
				<p>
				<label for="tipo_material_div">Tipo de material entregado:</label><br>
				<input id="tipo_material_div" class="auth-input dis" type="text" value="" name="tipo_material_div" rows="2" readonly placeholder="<?php  echo $data[0]->tipo_material_div;?>"></input>
				</p>
				<p>
				<label for="cantidad_div">Cantidad:</label><br>
				<input id="cantidad_div" class="auth-input dis" type="text"  name="cantidad_div" rows="2" value="<?php  echo $data[0]->cantidad_div;?>"></input>
				</p>
				<p>
				<label for="cantidad_div">Cantidad:</label><br>
				<input id="cantidad_div" class="auth-input dis" type="text" value="" name="cantidad_div" rows="2" readonly placeholder="<?php  echo $data[0]->cantidad_div;?>"></input>
				</p>
				<p>
				<label for="convocacion_medios_div">&iquest;Se realiz&oacute; convocatorias a los medios de comunicaci&oacute;n?:&#63;</label><br>
				<?php if($data[0]->convocacion_medios_div=="No"){ ?>
				<label>1.Si <input type='radio' value='' name='convocacion_medios_div' >&nbsp;
				2.No <input type='radio' value='' name='convocacion_medios_div' checked='checked'>
				</label>
				<?php }	else{
				echo "
				<label>1.Si <input type='radio' value='' name='convocacion_medios_div' checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tconvocacion_medios_div'>
				</label>";
				echo "<br>";
				//echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
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
					echo "<input type='checkbox' name='otros' value='otros'>Medios Comunitarios<br>";
					}else{
					echo "<input type='checkbox' name='otros' value='otros' checked='checked'> Otros<br>";
					}
				
				}?>
				</p>
		</div>
				
		</div>
	
	<div class="col-lg-12">
		<p>
			 <input type="submit" class="auth-button .btn-success go" value="Guardar" name="submit"></input>
		</p>

	   <?php echo form_close(); ?>
		<a class="auth-but-fix .btn-success fix-back" style="margin-top: -46px !important;" href="<?php echo base_url()?>informe">Volver</a>
	</div>
</div>