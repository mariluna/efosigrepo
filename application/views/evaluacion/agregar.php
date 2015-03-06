<h1>Evaluaci&oacute;n</h1>
<hr>
<div class="auth-form" ng-app="evaluacion">
	<?php $d=array('name' => 'form');
	echo form_open(base_url().'api/Evaluacion_api/save',$d); 
	//print_r($formu);
	//echo "<br>";
	//print_r($escalas);
	?><div class="col-lg-12" style="text-align:right">
	<?php	
		foreach($formu as $pregunta){
			echo "<p>".$pregunta->id_pregunta.".- ".$pregunta->descripcion."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
			echo "<input type='hidden' name='pregunta".$pregunta->id_pregunta."' value='$pregunta->id_pregunta'>";
			foreach($escalas as $escala){
				if ($escala->id_escala=3)
				{
					echo " <input type='radio' name='respuesta".$pregunta->id_pregunta."' value='$escala->id_escala' checked> ".$escala->descripcion;
				} else {
					echo " <input type='radio' name='respuesta".$pregunta->id_pregunta."' value='$escala->id_escala'> ".$escala->descripcion;
				}
			}
			echo"</p>";
		}
		?>
	</div>
	<div class="col-lg-12">
		<p>
			<input type="submit" class="auth-button .btn-danger go" value="Aceptar" name="submit"></input>
		</p>
		<p>
			<a class="auth-button .btn-danger back" href="<?php echo base_url()?>evaluacion">Volver</a>
		</p>
	</div>
	<?php echo form_close(); ?>
</div>