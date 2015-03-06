<h1>Informe regional por actividad</h1>
<hr>
<div class="auth-form" ng-controller="informeController" ng-app="informe">
		<div class="col-lg-4">
	
	    <p>
			 <label for="curso">Curso:</label><br>
			 <input id="curso" class="auth-input dis" type="text" value="" name="curso" rows="2" readonly placeholder="<?php  echo $data[0]->curso; ?>"></input>
	   </p>
         <p>
			 <label for="redi">REDI:</label><br>
			 <input id="redi" class="auth-input dis" type="text" value="" name="redi" rows="2" readonly placeholder="<?php  echo $data[0]->redi; ?>"></input>
	   </p>

	   <p>
			 <label for="estado">Estado:</label><br>
			 <input id="estado" class="auth-input dis" type="text" value="" name="estado" readonly placeholder="<?php  echo $data[0]->estado; ?>"></input>
	   </p>
		<p>
         <label for="municipio">Municipio:</label><br>
          <input id="municipio" class="auth-input dis" type="text" value="" name="municipio" rows="2" readonly placeholder="<?php  echo $data[0]->municipio;?>"></input>
		</p> 
		<p>
         <label for="parroquia">Parroquia:</label><br>
          <input id="parroquia" class="auth-input dis" type="text" value="" name="parroquia" rows="2" readonly placeholder="<?php  echo $data[0]->parroquia;?>"></input>
		</p> 	
				
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
				 <input id="tipo_actividad_for" class="auth-input dis" type="text" value="" name="tipo_actividad_for" rows="2" readonly placeholder="<?php  echo $data[0]->tipo_actividad_for;?>"></input>
				</p> 
				<p>
				 <label for="act_nombre_for">Tipo de Actividad:</label><br>
				  <input id="act_nombre_for" class="auth-input dis" type="text" value="" name="act_nombre_for" rows="2" readonly placeholder="<?php  echo $data[0]->act_nombre_for;?>"></input>
				</p> 		
				<p>
				  <label for="tot_asistentes_for">Total de Asistentes</label><br>
				  <input id="tot_asistentes_for" class="auth-input dis" type="text" value="" name="tot_asistentes_for" rows="2" readonly placeholder="<?php  echo $data[0]->tot_asistentes_for;?>"></input>
				</p>				
				<p>
				<label for="tot_femeninos_for">Total Femenino</label><br>
				 <input id="tot_femeninos_for" class="auth-input dis" type="text" value="" name="tot_femeninos_for" rows="2" readonly placeholder="<?php  echo $data[0]->tot_femeninos_for;?>"></input>
				</p>
				<p>
				<label for="tot_masculinos_for">Total Masculino</label><br>
				<input id="tot_masculinos_for" class="auth-input dis" type="text" value="" name="tot_masculinos_for" rows="2" readonly placeholder="<?php  echo $data[0]->tot_masculinos_for;?>"></input>
				</p>
			</div>

			<div class="col-lg-4">

				<p>
				<label for="tot_div_sexual_for">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				<?php if($data[0]->tot_div_sexual_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_div_sexual_for' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_div_sexual_for' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_div_sexual_for' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_div_sexual_for' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_div_sexual_for."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_for">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_indigenas_for' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_indigenas_for' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_indigenas_for' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_indigenas_for' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_indigenas_for."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_for">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_for' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_discapacidad_for' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_for' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_discapacidad_for' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_discapacidad_for."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_for">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_for' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_for."' />";
				}?>
				</p>
				<p>
				<label for="tot_movimientos_mujeres_for">&iquest;Hubo participaci&oacute;n de Movimientos de Mujeres&#63;</label><br>
				<?php if($data[0]->tot_movimientos_mujeres_for=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_movimientos_mujeres_for' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_movimientos_mujeres_for' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_movimientos_mujeres_for' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_movimientos_mujeres_for' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_movimientos_mujeres_for."' />";
				}?>
				</p>
				<p>
				<label for="nombre_movimientos">Nombre de los movimientos participantes</label><br>
				<textarea id="nombre_movimientos" class="auth-input auth-textarea dis" type="text" value="" name="nombre_movimientos" rows="2" readonly placeholder="<?php echo $data[0]->nombre_movimiento_for; ?>"></textarea>
				</p>
				<p>
				<label for="fec_ini">Fecha de Inicio</label><br>
				<input id="fec_ini" class="auth-input dis" type="text" value="" name="fec_ini" rows="2" readonly placeholder="<?php 
				$fec_ini= explode("-",$data[0]->fec_inicio_for); 	echo $fec_ini[2]."-".$fec_ini[1]."-".$fec_ini[0];?>"></input>
				</p>
				<p>
				<label for="fec_fin">Fecha de Culminaci&oacute;n:</label><br>
				<input id="fec_fin" class="auth-input dis" type="text" value="" name="fec_fin" rows="2" readonly placeholder="<?php  
				$fec_fin= explode("-",$data[0]->fec_final_for); echo $fec_fin[2]."-".$fec_fin[1]."-".$fec_fin[0];?>"></input>
				</p>
				
		</div>
		<div class="col-lg-4">
				
				<p>
				<label for="tot_div_sexual_div">&iquest;Hubo participaci&oacute;n de la Diversidad Sexual&#63;</label><br>
				<?php if($data[0]->tot_div_sexual_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value=''  name='tot_div_sexual_div' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_div_sexual_div'  checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_div_sexual_div'  checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value=''  name='tot_div_sexual_div' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text'  class='auth-input dis' readonly placeholder='".$data[0]->tot_div_sexual_div."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_indigenas_div">&iquest;Hubo participaci&oacute;n de Mujeres Indigenas&#63;</label><br>
				<?php if($data[0]->tot_mujeres_indigenas_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_indigenas_div' disabled >&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_indigenas_div' checked='checked' disabled>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_indigenas_div' checked='checked' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_indigenas_div' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_indigenas_div."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_discapacidad_div">&iquest;Hubo participaci&oacute;n de Mujeres con Discapacidad&#63;</label><br>
				<?php if($data[0]->tot_mujeres_discapacidad_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_div' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_discapacidad_div' disabled checked='checked'>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_discapacidad_div' disabled checked='checked'>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_discapacidad_div' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_discapacidad_div."' />";
				}?>
				</p>
				<p>
				<label for="tot_mujeres_afrodecendientes_div">&iquest;Hubo participaci&oacute;n de Mujeres Afrodecendientes&#63;</label><br>
				<?php if($data[0]->tot_mujeres_afrodecendientes_div=="0")
				{ echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' disabled>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' disabled checked='checked'>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' disabled checked='checked'>&nbsp;</label>
				<label>2.No <input type='radio' value='' name='tot_mujeres_afrodecendientes_div' disabled>
				</label>";
				echo "<br>";
				echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
				}?>
				</p>
				<p>
				<label for="tipo_material_div">Tipo de material entregado:</label><br>
				<input id="tipo_material_div" class="auth-input dis" type="text" value="" name="tipo_material_div" rows="2" readonly placeholder="<?php  echo $data[0]->tipo_material_div;?>"></input>
				</p>
				
				<p>
				<label for="cantidad_div">Cantidad:</label><br>
				<input id="cantidad_div" class="auth-input dis" type="text" value="" name="cantidad_div" rows="2" readonly placeholder="<?php  echo $data[0]->cantidad_div;?>"></input>
				</p>
				<p>
				<label for="convocacion_medios_div">&iquest;Se realiz&oacute; convocatorias a los medios de comunicaci&oacute;n?:&#63;</label><br>
				<?php if($data[0]->convocacion_medios_div=="No")
				{ echo "
				<label>1.Si <input type='radio' value='' disabled  name='convocacion_medios_div' >&nbsp;
				2.No <input type='radio' value='' name='convocacion_medios_div' disabled checked='checked'>
				</label>";}
				else{
				echo "
				<label>1.Si <input type='radio' value='' name='convocacion_medios_div' disabled checked='checked'>&nbsp;
				2.No <input type='radio' value='' name='tconvocacion_medios_div' disabled>
				</label>";
				echo "<br>";
				//echo "<label>Total de participantes:</lable><br><input type='text' class='auth-input dis' readonly placeholder='".$data[0]->tot_mujeres_afrodecendientes_div."' />";
					if($data[0]->medios_radio_div==" " || $data[0]->medios_radio_div=="false" || $data[0]->medios_radio_div==NULL){
					echo "<input type='checkbox' name='radio' value='radio' disabled> Radio<br>";
					}else{
					echo "<input type='checkbox' name='radio' value='radio' disabled checked='checked'> Radio<br>";
					}
					if($data[0]->medios_prensa_div==" " || $data[0]->medios_prensa_div=="false" || $data[0]->medios_prensa_div==NULL){
					echo "<input type='checkbox' name='prensa' value='prensa' disabled>Prensa<br>";
					}else{
					echo "<input type='checkbox' name='prensa' value='prensa' checked='checked' disabled> Prensa<br>";
					}
					if($data[0]->medios_tv_div==" " || $data[0]->medios_tv_div=="false" || $data[0]->medios_tv_div==NULL){
					echo "<input type='checkbox' name='t_v' value='T.V.' disabled>T.V.<br>";
					}else{
					echo "<input type='checkbox' name='t_v' value='T.V.' checked='checked' disabled> T.V.<br>";
					}
					if($data[0]->medios_comunitarios_div==" " || $data[0]->medios_comunitarios_div=="false" || $data[0]->medios_comunitarios_div==NULL){
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios' disabled>Medios Comunitarios<br>";
					}else{
					echo "<input type='checkbox' name='medios_comunitarios' value='medios_comunitarios' disabled checked='checked'> Medios Comunitarios<br>";
					}
					if($data[0]->medios_otros_div==" " || $data[0]->medios_otros_div=="false" || $data[0]->medios_otros_div==NULL){
					echo "<input type='checkbox' name='otros' value='otros' disabled>Medios Comunitarios<br>";
					}else{
					echo "<input type='checkbox' name='otros' value='otros' disabled checked='checked'> Otros<br>";
					}
				
				}?>
				</p>
		</div>
	
	<div class="col-lg-12">
		<p>
			 <input ng-click="edit(<?php echo $data[0]->id_informe; ?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
		</p>

		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>informe">Volver</a>
	</div>
</div>