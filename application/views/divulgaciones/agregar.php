<h1>Agregar Divulgaci&oacute;n</h1>
<hr>
<div class="auth-form" ng-app="divulgaciones">
<?php
    $d=array('name' => 'form');
    echo form_open(base_url().'api/divulgaciones_api/save',$d);
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.radio').hide();
		$('.tv').hide();
		$('.prensa').hide();
		$('.check').hide();
		$('.F').hide();
		$('.D').hide();
		
		$(document).on("change", "#curso", function() {
			var cursosel = $("#curso").val();
			 
				if (cursosel){
					$('.check').show("slow");
				}else {
					$('.check').hide("slow");
				}
				
		});
		
		$('#radio').click(function() {
			$('.radio').toggle("slow");
		});
		
		$('#tv').click(function() {
			$('.tv').toggle("slow");
		});
		
		$('#prensa').click(function() {
			$('.prensa').toggle("slow");
		});
		
		$('#F').click(function() {
			$('.F').toggle("slow");
		});
		
		$('#D').click(function() {
			$('.D').toggle("slow");
		});
		
		var idradio  = '#radio_' + $.now();
		var idtv 	 = '#tv_' + $.now();
		var idprensa = '#prensa_' + $.now();
		var time = $.now();
		
		$(".result").append(
			"<tr id='" + time + "' class='test'><td><input id='monto" + $.now() + "' class='auth-input monto' style='width:100%' name='monto[]' required></td>" +
			"<td><select onchange='checkForma(this)' id='forma_" + time + "' name='forma[]' class='auth-input forma' required><option value='' selected='selected'>Seleccione Forma Pago</option>" +
			$.get("index.php/api/Contribuyente_api/getFormas").done(function (data) {
				$(idforma).html(data);
			}) +
			"</select></td><td><select id='banco_" + time + "' name='banco[]' onchange='getCuenta(this)' class='auth-input disp'disabled><option value='' selected='selected' >Seleccione Banco</option>" +
			$.get("index.php/api/Contribuyente_api/getBancos").done(function (data) {
				$(idbanco).html(data);
			}) +
			"</select></td><td><select id='cuenta_" + time + "' name='cuenta[]' class='auth-input disp' disabled><option value='' selected='selected' >Seleccione Cuenta</option>" +
			"</td><td><input onchange='checkTran(this)' id='trans_" + time + "' class='auth-input disp' name='transacc[]' disabled></td><td><a onclick = 'eliminar("+time+")' class='fa fa-minus btn btn-danger rem'></a></td></tr>"
			);
        };
		
	});
</script>
<div class="col-lg-12">
	<p>
	   <label for="curso">Curso:</label><br>
       <select id="curso" class="auth-input" ng-model="curso" name="curso" style="max-width: 300px !important; text-align: center;" required>
		   <option value="">Seleccione..</option>
			<?php 
				foreach($curso as $key){
					 
					echo "<option value='".$key->id_curso."'>".$key->nombre."</option>";
		
				}
			?>	
       </select>
         <span style="color:red; font-size:12px" ng-show="form.curso.$error.required"><br>* Este campo es obligatorio</span>
	</p>
	<p class="check">

	</p>
	</div>
	<div>
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
					<input id="radio" type="checkbox">&nbsp; Radio</input>
                </td>
                <td>
                    <input id="tv" type="checkbox">&nbsp; Televisi&oacute;n</input>
                </td>
                <td>
					<input id="prensa" type="checkbox">&nbsp; Prensa</input>
                </td>
                <td>
                
                </td>
            </tr>
            </tbody>
            <tbody>
            <a ng-click="addCuota()" onclick="" class="fa fa-plus btn btn-danger add"> Agregar Cuota</a>&nbsp;
            </tbody>
        </table>
	</div>
	<div class="col-lg-4">
<div class="radio">
   <p>
         <label for="emisora">Emisora:</label><br>
         <input id="emisoras" ng-model="emisoras" class="auth-input" type="text" value="" name="emisoras" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>

   <p>
         <label for="dial">Dial:</label><br>
         <input id="dial" ng-model="dial" class="auth-input" type="text" value="" name="dial" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.duracion.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

   <p>
         <label for="hora">Hora de emision:</label><br>
         <input id="horaR" ng-model="horaR" class="auth-input" type="text" value="" name="horaR" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.required"><br>* Este campo es obligatorio</span>
         <span style="color:red; font-size:12px" ng-show="form.participantes.$error.integer"><br>* Este campo debe ser un numero entero</span>
   </p>

   <p>
       <label for="tDiv">Tipo de Divulgacion:</label><br>
       <select id="tipDiv" class="auth-input" ng-model="tipDiv" name="tipDiv" style="max-width: 300px !important; text-align: center;" required>
			<option value="">Seleccione.. </option>
			<option value="0">Micro </option>
			<option value="1">Programa </option>
	   </select>
         <span style="color:red; font-size:12px" ng-show="form.estado.$error.required"><br>* Este campo es obligatorio</span>
   </p>
   </div>
   </div>
<div class="col-lg-4">
<div class="tv">
   <p>
       <label for="nomTv">Nombre del programa:</label><br>
      <input id="nombreTv" ng-model="nombreTv" class="auth-input" type="text" value="" name="nombreTv" required integer></input>
   </p>
   
     <p>
       <label for="canal">Canal:</label><br>
      <input id="canal" ng-model="canal" class="auth-input" type="text" value="" name="canal" required integer></input>
   </p>
        <p>
       <label for="horaTv">Hora del Programa:</label><br>
      <input id="horatv" ng-model="horatv" class="auth-input" type="text" value="" name="horatv" required></input>
   </p>
   <p>
       <label for="divT">Tipo de Divulgacion:</label><br>
	   
              <select id="tipDivTv" class="auth-input" ng-model="divulgacion" name="tipDivTv" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione..</option>
				<option value="0">Propaganda Televisada </option>
				<option value="1">Programa </option>
				
				</select>

   </p>
</div>   

</div>
<div class="col-lg-4">
<div class="prensa">
	<p>
         <label for="nombre">Nombre del Medio:</label><br>
         <input id="participantes" ng-model="participantes" class="auth-input" type="text" value="" name="participantes" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>
   
   <p>
         <label for="nombre">Fecha de la Noticia:</label><br>
         <input id="participantes" ng-model="participantes" class="auth-input" type="text" value="" name="participantes" required integer></input>
         <span style="color:red; font-size:12px" ng-show="form.nombre.$error.required"><br>* Este campo es obligatorio</span>

   </p>
   <p>
     <label >Tipo de Divulgacion:</label><br>
	   <p class="check">

				<input id="F" type="checkbox">&nbsp; Fisica &nbsp; </input>

				<input id="D" type="checkbox">&nbsp; Digital</input>
	</p>
   </p>
   <div class="F">
      <p>
     <label >Fisica:</label><br>
	   	<input id="periodico" value="0" type="checkbox">&nbsp; Periodico &nbsp; </input>
		<input id="revista" value="1" type="checkbox">&nbsp; Revista</input>
		<input id="boletin" value="2" type="checkbox">&nbsp; Boletin</input>
	   </p>
   </div>
   <div class="D">
   <p>
     <label >Digital:</label><br>
	   	<input id="periodicoWeb" value="0" type="checkbox">&nbsp; Periodico Web &nbsp; </input>
		<input id="facebook" value="1" type="checkbox">&nbsp; Facebook</input> <br>
		<input id="blog" value="2" type="checkbox">&nbsp; Blog&nbsp;</input>
		<input id="twitter" value="3" type="checkbox">&nbsp; Twitter</input>	   
   </p>
   </div>
  </div>
</div>

 <p>
<input type="submit" class="auth-button .btn-danger go"  value="Agregar" name="submit"></input>
   </p>

<?php echo form_close(); ?>
<a class="auth-button .btn-danger back" href="<?php echo base_url()?>divulgaciones">Volver</a>

</div>