<h1>Agregar Divulgaci&oacute;n</h1>
<hr>
	<div  ng-app="divulgaciones" ng-controller="addDivController">
	<?php
		$d=array('name' => 'form');
		echo form_open(base_url().'api/divulgaciones_api/save',$d);
	?>

<script type="text/javascript">
	
		function eliminar(div) {
			document.getElementById(div).remove();
		}
			
		$(document).ready(function() {
		
			$('#radioOptions_1').hide();
			$('#tvOptions_1').hide();
			$('#prensaOptions_1').hide();
			$("#fecha_1").datepicker({
			});
			
			$(document).on("change", "#curso", function() {
				var cursosel = $("#curso").val();
				 
					if (cursosel){
						$('.check').show("slow");
					}else {
						$('.check').hide("slow");
					}
			});
			
		$("#horaR_1").timepicker();
		$("#horatv_1").timepicker();
		});
		
		function radioOp(value) {

			var sep = value.id.split('_');
			
			if ($('#radio_' + sep[1]).is(':checked')){
			
				$('#radioOptions_' + sep[1]).show("slow");
				$('#emisoras_' + sep[1]).prop("required", true);
				$('#dial_' + sep[1]).prop("required", true);
				$('#horaR_' + sep[1]).prop("required", true);
				$('#tipDiv_' + sep[1]).prop("required", true);
			
			} else {
			
				$('#radioOptions_' + sep[1]).hide("slow");
				$('#emisoras_' + sep[1]).prop("required", false);
				$('#dial_' + sep[1]).prop("required", false);
				$('#horaR_' + sep[1]).prop("required", false);
				$('#tipDiv_' + sep[1]).prop("required", false);
				
			}        

		}
		
		function tvOp(value) {

		   var sep = value.id.split('_');
			
			if ($('#tv_' + sep[1]).is(':checked')){
			
				$('#tvOptions_' + sep[1]).show("slow");
				$('#nombreTv_' + sep[1]).prop("required", true);
				$('#canal_' + sep[1]).prop("required", true);
				$('#horatv_' + sep[1]).prop("required", true);
				$('#tipDivTv_' + sep[1]).prop("required", true);

			
			} else {
			
				$('#tvOptions_' + sep[1]).hide("slow");
				$('#nombreTv_' + sep[1]).prop("required", false);
				$('#canal_' + sep[1]).prop("required", false);
				$('#horatv_' + sep[1]).prop("required", false);
				$('#tipDivTv_' + sep[1]).prop("required", false);
				
			}      
		}
		
		function prensaOp(value) {

			var sep = value.id.split('_');
			
			if ($('#prensa_' + sep[1]).is(':checked')){
			
				$('#prensaOptions_' + sep[1]).show("slow");
				$('#nombrePrensa_' + sep[1]).prop("required", true);
				$('#fecha_' + sep[1]).prop("required", true);
				$('#tipDivPrensaSel_' + sep[1]).prop("required", true);
				$('#tipDivPrensa_' + sep[1]).prop("required", true);
			
			} else {
			
				$('#prensaOptions_' + sep[1]).hide("slow");
				$('#emisoras_' + sep[1]).prop("required", false);
				$('#dial_' + sep[1]).prop("required", false);
				$('#tipDivPrensaSel_' + sep[1]).prop("required", false);
				$('#tipDivPrensa_' + sep[1]).prop("required", false);				
			}    

		}
		
		function getPrensa(value) {

			var sep = value.id.split('_');

			$.post("index.php/api/Divulgaciones_api/getPrensa", {
				prensa: value.value
			}, function (data) {
				$("#tipDivPrensaSel_" + sep[1]).html(data);
			});

		}	
		
		
</script>
	<div class="col-lg-12">
		<p align="center">
			<label for="curso">Curso:</label><br>
			<select id="curso" class="demo-default" required name="curso" required>
				<option value="">Seleccione..</option>
					<?php 
						foreach($curso as $key){
							 
							echo "<option value='".$key->id_curso."'>".$key->nombre."</option>";
				
						}
					?>	
			</select>
			<script>
			$('#curso').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		</script>
			<span style="color:red; font-size:12px" ng-show="form.curso.$error.required"><br>* Este campo es obligatorio</span>
			<br><br>
			<a ng-click="addDiv()" class="fa fa-plus btn btn-danger add"> Agregar Nueva Divulgaci&oacute;n </a>&nbsp;

		</p>
		

		
		<table class="table table-striped table-condensed cuotas" style="text-align: center; ">
			<thead>
				<tr>
					<th style="max-width: 80px; text-align: center;">Radio</th>
					<th style="max-width: 80px; text-align: center;">Television</th>
					<th style="max-width: 80px; text-align: center;">Prensa</th>
					<th style="max-width: 80px; text-align: center;">Accion</th>
				</tr>
			</thead>
			<tbody class="result">
				<tr id="1" class="test">
					<td>
						<input id="radio_1" type="checkbox" onclick="radioOp(radioOptions_1)">&nbsp; Radio</input>
						<div id="radioOptions_1">
							<p>
								<label style="font-size: 12px;" for="emisora">Emisora:</label><br>
								<input id="emisoras_1" maxlength="20" class="auth-input" type="text" value="" name="emisoras[]" ></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="dial">Dial:</label><br>
								<input id="dial_1" maxlength="6" class="auth-input" type="text" value="" name="dial[]" ></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="hora">Hora de emision:</label><br>
								<input id="horaR_1" class="auth-input" readonly type="text" value="" name="horaR[]" ></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="tDiv">Tipo de Divulgacion:</label><br>
								<select id="tipDiv_1" class="auth-input" name="tipDiv[]" style="max-width: 300px !important; text-align: center;">
									<option value="" selected>Seleccione.. </option>
									<?php 
									    foreach ($tipo_radio as $radio) {
											echo "<option value='$radio->id_tipo_divulgacion'>$radio->nombre</option>";
										}
									
									?>
								</select>
							</p>
						</div>
					</td>
					<td>
						<input id="tv_1" type="checkbox" onclick="tvOp(tvOptions_1)">&nbsp; Televisi&oacute;n</input>
						<div id="tvOptions_1">
							<p>
								<label style="font-size: 12px;" for="nomTv">Nombre del programa:</label><br>
								<input id="nombreTv_1" maxlength="40" class="auth-input" type="text" value="" name="nombreTv[]"></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="canal">Canal:</label><br>
								<input id="canal_1" maxlength="20" class="auth-input" type="text" value="" name="canal[]"></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="horaTv">Hora del Programa:</label><br>
								<input id="horatv_1" class="auth-input" readonly type="text" value="" name="horatv[]" ></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="divT">Tipo de Divulgacion:</label><br>
								<select id="tipDivTv_1" class="auth-input" ng-model="divulgacion" name="tipDivTv[]" style="max-width: 300px !important; text-align: center;">
									<option value="" selected>Seleccione..</option>
									<?php 
									    foreach ($tipo_tv as $tv) {
											echo "<option value='$tv->id_tipo_divulgacion'>$tv->nombre</option>";
										}
									
									?>
								</select>
							</p>
						</div>
					</td>
					<td>
						<input id="prensa_1" type="checkbox" onclick="prensaOp(prensaOptions_1)">&nbsp; Prensa</input>
						<div id="prensaOptions_1">
							<p>
								<label style="font-size: 12px;" for="nombre">Nombre del Medio:</label><br>
								<input id="nombrePrensa_1" maxlength="40" class="auth-input" type="text" value="" name="nombrePrensa[]"></input>
							</p>

							<p>
								<label style="font-size: 12px;" for="nombre">Fecha de la Noticia:</label><br>
								<input name="fecha[]"class="auth-input" type="text" id="fecha_1" readonly >
							</p>

							<p>
								<label style="font-size: 12px;">Tipo de Divulgacion:</label><br>
								<select onchange="getPrensa(tipDivPrensa_1)" id="tipDivPrensa_1" class="auth-input" name="tipDivPrensa[]" style="max-width: 300px !important; text-align: center;">
									<option value="" selected>Seleccione..</option>
									<option value="fisica">Fisica </option>
									<option value="digital">Digital </option>
								</select>
							</p>

							<p>
								<label style="font-size: 12px;">Seleccione:</label><br>
								<select id="tipDivPrensaSel_1" class="auth-input" name="tipDivPrensaSel[]" style="max-width: 300px !important; text-align: center;">
									<option value="" selected>Seleccione..</option>
								</select>
							</p>
						<div>
					</td>
					<td>

					</td>
				</tr>
			</tbody>
		</table>
			<p>
				<input style="float: right; margin-top:-9px" class="auth-button .btn-danger go" ng-disabled="form.nombre.$invalid" value="Agregar" type="submit">
				<a class="auth-button .btn-danger b" href="<?php echo base_url()?>Divulgaciones" >Volver</a>
			</p>
	<?php echo form_close(); ?>
	</div>
</div>