<html>
	<head><title>Informe</title>
		<style>
			body{
				font-weight: bold;
			}
			
			th, td {
			    border: 1px solid black;
			    border-collapse: collapse;
			    padding: 5px;
			    text-align: center;
			    margin:0 auto;
				font-weight: bold;
			}
			
			.info{
				font-size:10px;
				text-align:left;
			}
			
			.sub{
			
				font-size:10px;
				background-color:#C0C0C0;
			
			}
			
			table{
			    border: 1px solid black;
			    border-collapse: collapse;
			    padding: 5px;
			    text-align: center;
			    margin:0 auto;
				font-weight: bold;
				width:100%;
			}

			th{
				background-color: #D9534F;
				color: white;
				font-weight: bold;
				max-width: 30px;
			}
			
			.titulo{
				color: red;
				font-weight: bold;
				font-size:13px;
			}
			
			.subtitulo{
				color: red;
				font-size:11px;
				font-weight: bold;
			}
			
			.fecha{
				text-align:left;
				color: red;
				font-size:10px;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<table class="tg">
			<tr>
				<td class="titulo" colspan="4">INFORME BÁSICO CUALITATIVO Y CUANTITATIVO</td>
			</tr>
			<tr>
				<td class="subtitulo" colspan="4">INFORME REGIONAL SEMANAL POR ACTIVIDAD</td>
			</tr>
			<tr>
				<td class="subtitulo" colspan="4"> <?php echo date("d-m-Y", strtotime($content[0]->fecha_creacion));?> </td>
			</tr>
			<tr>
				<td class="sub" colspan="4">UBICACIÓN GEOGRAFICA</td>
			</tr>
			<tr>
				<td class="info" colspan="4">CURSO: &nbsp; <?php echo $content[0]->curso; ?></td>
			</tr>
			<tr>
			
				<td class="info">1. REDI: &nbsp; <?php echo $content[0]->redi; ?></td>
				<td class="info">2. Estado:&nbsp; <?php echo $content[0]->estado; ?></td>
				<td class="info">3. Municipio: &nbsp; <?php echo $content[0]->municipio; ?></td>
				<td class="info">4. Parroquia:&nbsp; <?php echo $content[0]->parroquia; ?></td>				
			</tr>
			<tr>			
				<td class="info" colspan="3">5. Nombres y Apellidos de la coordinadora: &nbsp; <?php echo $content[0]->usuario; ?></td>
				<td class="info">6. Número de C.I.: &nbsp; <?php echo $content[0]->cedula; ?></td>
			</tr>
			<tr>
				<td class="info" colspan="2">7. Telefono:&nbsp; <?php echo $content[0]->tel_celular;?> </td>
				<td class="info" colspan="2">8. Correo Electrónico: &nbsp; <?php echo $content[0]->email;?> </td>
			</tr>
			<tr>
				<td class="sub" colspan="4">FORMACION</td>
			</tr>
			<tr>				
				<td class="info" colspan="2">1. Tipo de Actividad:<br>
				<?php if($content[0]->tipo_actividad_for =='Taller'){
				echo "1.Taller (X) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) <br>5.Congreso ( )
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Foro'){
				echo "1.Taller ( ) 2. Foro (X) 3. Encuentro ( ) 4. Seminario ( ) <br>5.Congreso ( )
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Encuentro'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro (X) 4. Seminario ( ) <br>5.Congreso ( )<br>
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Seminario'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario (X) <br>5.Congreso ( )<br>
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Congreso'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) 5.Congreso (X)<br>
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Conversatorio'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) 5.Congreso ( )<br>
				6. Conversatorio (X) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Diplomado'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) 5.Congreso ( )<br>
				6. Conversatorio (X) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Curso'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) 5.Congreso ( )<br>
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso (X) 9. Plan de Formación ( )";
				}
				elseif($content[0]->tipo_actividad_for =='Plan de Formación'){
				echo "1.Taller ( ) 2. Foro ( ) 3. Encuentro ( ) 4. Seminario ( ) 5.Congreso ( )<br>
				6. Conversatorio ( ) 7. Diplomado ( ) 8. Curso ( ) 9. Plan de Formación (X)";
				}
?>
</td>
				<td class="info" colspan="2">1.1. Nombre de la Actividad:&nbsp; <br><?php echo $content[0]->act_nombre_for;?></td>
			</tr>
			<tr>
				<td class="info">2. Total de Asistentes:&nbsp; <?php echo $content[0]->tot_asistentes_for;?><br></td>
				<td class="info">2.1. Total Femenino: &nbsp; <?php echo $content[0]->tot_femeninos_for;?><br></td>				
				<td class="info" colspan="2">2.2. Total Masculino: &nbsp; <?php echo $content[0]->tot_masculinos_for;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="2">3. ¿Hubo participación de la Diversidad Sexual? &nbsp; 
				<?php if($content[0]->tot_div_sexual_for <= '0'){
				echo "SI ( ) NO (X)";
				$total="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$total="Total de participantes:".$content[0]->tot_div_sexual_for."";}
				?>
				</td>
				<td class="info" colspan="2">3.1.  <?php echo $total;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="2">4. ¿Hubo participación de Mujeres Indigenas? &nbsp;
				<?php if($content[0]->tot_mujeres_indigenas_for <= '0'){
				echo "SI ( ) NO (X)";
				$ind="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$ind="Total de participantes:".$content[0]->tot_mujeres_indigenas_for."";}
				?></td>
				<td class="info" colspan="2">4.1.  <?php echo $ind;?><br></td>
			</tr>
			<tr>			
				<td class="info" colspan="2">5. ¿Hubo participación de Mujeres con Discapacidad? &nbsp;
				<?php if($content[0]->tot_mujeres_discapacidad_for <= '0'){
				echo "SI ( ) NO (X)";
				$dis="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$dis="Total de participantes:".$content[0]->tot_mujeres_discapacidad_for."";}
				?></td>
				<td class="info" colspan="2">5.1. <?php echo $dis;?><br></td>
			</tr>
			<tr>			
				<td class="info" colspan="2">6. ¿Hubo participación de Mujeres Afrodecendientes?  &nbsp;
				<?php if($content[0]->tot_mujeres_afrodecendientes_for <= '0'){
				echo "SI ( ) NO (X)";
				$afr="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$afr="Total de participantes:".$content[0]->tot_mujeres_afrodecendientes_for."";}
				?></td>
				<td class="info" colspan="2">6.1.  <?php echo $afr;?><br></td>
			</tr>
			<tr>			
				<td class="info" colspan="2">7. ¿Hubo participación de Movimientos de Mujeres? &nbsp;
				<?php if($content[0]->tot_movimientos_mujeres_for <= '0'){
				echo "SI ( ) NO (X)";
				$mov="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$mov="Total de participantes:".$content[0]->tot_movimientos_mujeres_for."";}
				?></td>
				<td class="info" colspan="2">7.1.  <?php echo $mov;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="4">7.2. Nombre de los movimientos participantes: &nbsp;  
				<?php IF($content[0]->nombre_movimiento_for==" "){
				echo "NO APLICA";}else{
				echo $content[0]->nombre_movimiento_for;}?></td>
			</tr>
			<tr>
				<td class="info" colspan="2">8. Fecha de inicio: &nbsp;  <?php echo date("d-m-Y", strtotime($content[0]->fec_inicio_for));?></td>			
				<td class="info" colspan="2">9. Fecha de Culminación: &nbsp;  <?php echo date("d-m-Y", strtotime($content[0]->fec_final_for));?></td>
			</tr>
			<tr>
				<td class="sub" colspan="4">DIVULGACI&Oacute;N</td>
			</tr>
			<tr>
				<td class="info" colspan="2">1. Tipo de Actividad:<br>
				<?php if($content[0]->tipo_actividad_div =='Toma comunitaria'){
				echo "1.Toma comunitaria (X) 2. Bautizo ( ) 3. Lanzamiento ( )<br>4. Premiación ( )";
				}
				elseif($content[0]->tipo_actividad_div =='Bautizo'){
				echo "1.Toma comunitaria ( ) 2. Bautizo (X) 3. Lanzamiento ( )<br>4. Premiación ( )";
				}
				elseif($content[0]->tipo_actividad_div =='Lanzamiento'){
				echo "1.Toma comunitaria ( ) 2. Bautizo ( ) 3. Lanzamiento (X)<br>4. Premiación ( )";
				}
				elseif($content[0]->tipo_actividad_div =='Premiacion'){
				echo "1.Toma comunitaria ( ) 2. Bautizo ( ) 3. Lanzamiento ( )<br>4. Premiación (X)";
				}?>
				</td>
				<td class="info" colspan="2">1.1. Nombre de la Actividad:&nbsp; <br> <?php echo $content[0]->act_nombre_div;?></td>
			</tr>
			<tr>
				<td class="info">2. Total de Asistentes:&nbsp;  <?php echo $content[0]->tot_asistentes_div;?><br></td>
				<td class="info">2.1. Total Femenino:&nbsp;  <?php echo $content[0]->tot_femeninos_div;?><br></td>				
				<td class="info" colspan="2">2.2. Total Masculino:&nbsp;  <?php echo $content[0]->tot_masculinos_div;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="2">3. ¿Hubo participación de la Diversidad Sexual? 
				<?php if($content[0]->tot_div_sexual_div <= '0'){
				echo "SI ( ) NO (X)";
				$dv="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$dv="Total de participantes:".$content[0]->tot_div_sexual_div."";}
				?></td>
				<td class="info" colspan="2">3.1.&nbsp;  <?php echo $dv;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="2">4. ¿Hubo participación de Mujeres Indigenas? 
				<?php if($content[0]->tot_mujeres_indigenas_div <= '0'){
				echo "SI ( ) NO (X)";
				$indv="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$indv="Total de participantes:".$content[0]->tot_mujeres_indigenas_div."";}
				?></td>
				<td class="info" colspan="2">4.1. &nbsp;  <?php echo $indv;?><br></td>
			</tr>
			<tr>			
				<td class="info" colspan="2">5. ¿Hubo participación de Mujeres con Discapacidad? 
				<?php if($content[0]->tot_mujeres_discapacidad_div <= '0'){
				echo "SI ( ) NO (X)";
				$disv="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$disv="Total de participantes:".$content[0]->tot_mujeres_discapacidad_div."";}
				?></td>
				<td class="info" colspan="2">5.1. &nbsp;  <?php echo $disv;?><br></td>
			</tr>
			<tr>			
				<td class="info" colspan="2">6. ¿Hubo participación de Mujeres Afrodecendientes?
				<?php if($content[0]->tot_mujeres_afrodecendientes_div <= '0'){
				echo "SI ( ) NO (X)";
				$afrv="NO APLICA";}
				else{
				echo "SI (X) NO ( )";
				$afrv="Total de participantes:".$content[0]->tot_mujeres_afrodecendientes_div."";}
				?></td>
				<td class="info" colspan="2">6.1. &nbsp;  <?php echo $afrv;?><br></td>
			</tr>
			<tr>
				<td class="info" colspan="2">7. Tipo de material entregado: 
				<?php if($content[0]->tipo_material_div =='Folletos'){
				echo "1. Folletos (X) 2. Díptricos ( ) <br>3. Trípticos ( ) 4. Volantes ( )
				5. Afiches ( ) 6. Libros ( ) ";
				}
				elseif($content[0]->tipo_material_div =='Diptricos'){
				echo "1. Folletos ( ) 2. Díptricos (X) <br>3. Trípticos ( ) 4. Volantes ( )
				5. Afiches ( ) 6. Libros ( ) ";
				}
				elseif($content[0]->tipo_material_div =='Tripticos'){
				echo "1. Folletos ( ) 2. Díptricos ( ) <br>3. Trípticos (X) 4. Volantes ( )
				5. Afiches ( ) 6. Libros ( ) ";
				}
				elseif($content[0]->tipo_material_div =='Volantes'){
				echo "1. Folletos ( ) 2. Díptricos ( ) <br>3. Trípticos ( ) 4. Volantes (X)
				5. Afiches ( ) 6. Libros ( ) ";}
				elseif($content[0]->tipo_material_div =='Afiches'){
				echo "1. Folletos ( ) 2. Díptricos ( ) <br>3. Trípticos () 4. Volantes ( )
				5. Afiches (X) 6. Libros ( ) ";
				}
				elseif($content[0]->tipo_material_div =='Libros'){
				echo "1. Folletos ( ) 2. Díptricos ( ) <br>3. Trípticos ( ) 4. Volantes ( )
				5. Afiches ( ) 6. Libros (X) ";
				}?>
				</td>
				
				<td class="info" colspan="2">8. Cantidad:&nbsp;  <?php echo $content[0]->cantidad_div;?></td>
			</tr>
			<tr>
				<td class="info" colspan="2">9. ¿Se realizó convocatorias a los medios de comunicación?:<br>
					<?php if($content[0]->convocacion_medios_div == 'No'){
				echo "SI ( ) NO (X)";
				
			$Radio="NO APLICA ";
			$prensa=" ";
			$tv=" ";
			$medios=" ";
			$otros=" ";
				}
				else{
				echo "SI (X) NO ( )";
				if($content[0]->medios_radio_div == 'radio'){
				$Radio="1. Radio (X) ";
				}else{
				$Radio="1. Radio ( ) ";}
				
				if($content[0]->medios_prensa_div== 'prensa'){
				$prensa="2. Prensa (X) ";
				}else{
				$prensa="2. Prensa ( ) ";}
				if($content[0]->medios_tv_div== 'T.V.'){
				$tv="3. T.V. (X) ";
				}else{
				$tv="3. T.V. ( ) ";}
				if($content[0]->medios_comunitarios_div== 'Medios Comunitarios'){
				$medios="4. Medios Comunitarios (X) ";
				}else{
				$medios="4. Medios Comunitarios ( ) ";}
				
				if($content[0]->medios_comunitarios_div== 'Otros'){
				$otros="5. Otros (X) ";
				}else{
				$otros="5. Otros ( ) ";}
				
				
				}
				?></td>
				</td>
				<td class="info" colspan="2">9.1. <?php echo $Radio;?>&nbsp; <?php echo $prensa;?> &nbsp;<?php echo $tv;?> <br>
			&nbsp;<?php echo $medios; ?> &nbsp; <?php echo $otros;?>
		
				</td>
			</tr>
		</table>
		<div><br>
			Generado por: <?php echo  $user->first_name.' '.$user->last_name ?><br>
			Fecha: <?php echo  date("d-m-y");  ?><br>
			Hora: <?php echo date("H:i:s");?>
		</div>
	</body>
</html>