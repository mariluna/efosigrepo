<html>
	<head>
	   <title>Divulgaciones</title>
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
				<td class="titulo" colspan="3">SISTEMATIZACI&Oacute;N DE LA DIVULGACI&Oacute;N DEL EVENTO EN MEDIOS DE COMUNICACI&Oacute;N<br>
REGIONALES Y NACIONALES</td>
			</tr>
			<tr>
				<td class="subtitulo" colspan="3">INFORME REGIONAL SEMANAL POR DIVULGACI&Oacute;N</td>
			</tr>
			<tr>
				<td class="subtitulo" colspan="3"><?php echo date("d-m-Y", strtotime($content[0]->fecha_actual)); ?> </td>
			</tr>
			<tr>
				<td class="sub" colspan="3">UBICACI&Oacute;N GEOGRAFICA</td>
			</tr>
			<tr>
				<td class="info" colspan="3">CURSO: &nbsp; <?php echo $content[0]->curso; ?></td>
			</tr>
			<tr>
				<td class="sub" colspan="3">RADIO</td>
			</tr>
			<tr>
			<?php $countRadio = 0;
					foreach ($content as $row ){
						if((!empty($row->emisora)) and (!empty($row->dial)) and (!empty($row->tipo_divulgacion_radio)) and (!empty($row->hora))){
							echo "
								<tr>
								<td class='info' width='70px'>1. Emisora: ".$row->emisora. " </td>
								<td class='info' width='30px'>1.1. Dial:&nbsp; ".$row->dial. "</td>
				                <td class='info' width='30px'>1.2. Hora de Emisi&oacute;n:&nbsp;".$row->hora. "</td> </tr>";
							echo "
							<tr>			
							<td class='info' colspan='3'>";
							 
							if($content[0]->tipo_divulgacion_radio=='')
								{ echo "2. Tipo de Divulgaci&oacute;n: 1. Micro ( ) 2. Programa ( )";}
						    elseif($content[0]->tipo_divulgacion_radio=='3')
								{ echo "2. Tipo de Divulgaci&oacute;n: 1. Micro (X) 2. Programa ( )";}
							elseif($content[0]->tipo_divulgacion_radio=='3')
								{ echo "2. Tipo de Divulgaci&oacute;n: 1. Micro ( ) 2. Programa (X)";}
							echo "</td></tr>";
				
							$countRadio++;
						}
					} 
					if($countRadio == 0){
				
					echo "<tr><td class='info' colspan='3' align='center'>NO APLICA </td></tr>";
					}
				?>
				<tr>
				<td class="sub" colspan="3">T.V.</td>
				</tr>
				<?php 
				$countTv = 0;
				foreach ($content as $row ){ 

					if((!empty($row->nombre_programa)) and (!empty($row->canal)) and (!empty($row->hora_emision))  and (!empty($row->tipo_divulgacion_tv))){
						echo "<tr>
						<td class='info' colspan='2'>1. Canal: ".$row->canal."</td>
				        <td class='info'>1.2. Hora de Emisi&oacute;n:&nbsp; ".$row->hora_emision."</td></tr>";
			    echo "<tr>			
				<td class='info' colspan='2' >";
				if($content[0]->tipo_divulgacion_tv=='')
					{ echo "2. Tipo de Divulgaci&oacute;n: 1. Propaganda Televisiva ( ) 2. Programa ( )";}
				elseif($content[0]->tipo_divulgacion_tv=='1')
					{ echo "2. Tipo de Divulgaci&oacute;n: 1. Propaganda Televisiva ( ) 2. Programa (X)";}
				elseif($content[0]->tipo_divulgacion_tv=='2')
				{ echo "2. Tipo de Divulgaci&oacute;n: 1. Propaganda Televisiva (X) 2. Programa ( )";}
				echo "</td>
				<td class='info' >2.2. Nombre del programa: &nbsp; ".$row->nombre_programa.
									"</td></tr>";
						$countTv++;
					}
				} 
				if($countTv == 0){
			echo "<tr><td class='info' colspan='3' align='center'>NO APLICA </td></tr>";
				}
				?>
			<tr>
				<td class="sub" colspan="3">PRENSA</td>
			</tr>
			<?php 
				$countPrensa = 0;
				foreach ($content as $row ){ 

					if((!empty($row->nombre_prensa)) and (!empty($row->fecha_prensa)) and (!empty($row->tipo_divulgacion_prensa))){
						$fecha = $row->fecha_prensa;
						$newFecha = explode("-",$fecha);
						$fechaFormat = $newFecha[2]."-".$newFecha[1]."-".$newFecha[0];
						echo "
							<tr>
							<td class='info' colspan='2'>1. Nombre del Medio: ".$row->nombre_prensa."</td>
				            <td class='info'>1.2. Fecha de la Noticia:&nbsp; ".$fechaFormat. "</td>
						</tr>
						<tr><td class='info' colspan='2' >";
				if($content[0]->tipo_divulgacion_prensa=='5')
					{ echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica (X) 2. Digital ( )";
					$periodico="1. Peri&oacute;dico (X)";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook ( )";
					$blog="3. Blog ( ) ";
					$tw="4. Twitter ( )";
					}
				elseif($content[0]->tipo_divulgacion_prensa=='6')
				   { echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica (X) 2. Digital ( )";
					$periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista (X)";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook ( )";
					$blog="3. Blog ( ) ";
					$tw="4. Twitter ( )";
					}
				elseif($content[0]->tipo_divulgacion_prensa=='7')	
				  {  echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica (X) 2. Digital ( )";
					$periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n (X)";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook ( )";
					$blog="3. Blog ( ) ";
					$tw="4. Twitter ( )";
				  }
				 elseif($content[0]->tipo_divulgacion_prensa=='8')	
				  {  echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica ( ) 2. Digital (X)";
				    $periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web (X)";
					$face=" 2. Facebook ( )";
					$blog="3. Blog ( )";
					$tw="4. Twitter ( )";
				  }
				  elseif($content[0]->tipo_divulgacion_prensa=='9')	
				  {  echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica ( ) 2. Digital (X)";
					$periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook (X)";
					$blog="3. Blog ( ) ";
					$tw="4. Twitter ( )";
				  }
				  elseif($content[0]->tipo_divulgacion_prensa=='11')	
				  {  echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica ( ) 2. Digital (X)";
					$periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook ( )";
					$blog="3. Blog (X) ";
					$tw="4. Twitter ( )";
				  }
				  elseif($content[0]->tipo_divulgacion_prensa=='10')	
				  {  echo "2. Tipo de Divulgaci&oacute;n: 1. F&iacute;sica ( ) 2. Digital (X)";
					$periodico="1. Peri&oacute;dico ( )";
					$revista="2. Revista ( )";
					$boletin="3. Bolet&iacute;n ( )";
					$periodicow="1. Peri&oacute;dico/Revista web ( )";
					$face=" 2. Facebook ( )";
					$blog="3. Blog ( ) ";
					$tw="4. Twitter (X)";
				  }
				  echo "</td>
				  <td class='info'>2.2. Si es F&iacute;sica, diga de que forma:<br>";
				 echo " ".$periodico." &nbsp;";
				 echo " ".$revista." &nbsp;";   
				 echo " ".$boletin." &nbsp;"; 
				echo "</td></tr>";
				echo "<tr>			
				<td class='info' colspan='3' >
				2.3. Si es Digital, diga de que forma: ";
				echo " ".$periodicow." &nbsp;";
				echo " ".$face." &nbsp;";
				echo " ".$blog." &nbsp;";
				echo " ".$tw." &nbsp;";
				echo "</td></tr>";

						$countPrensa++;
					}
				}
				if($countPrensa == 0){
				echo "<tr><td class='info' colspan='3' align='center'>NO APLICA </td></tr>";
				}
			?>
			
		</table>
		<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			Generado por: <?php echo  $user->first_name.' '.$user->last_name ?><br>
			Fecha: <?php echo  date("d-m-y");  ?><br>
			Hora: <?php echo date("H:i:s");?>
			
		</div>
	</body>
</html>