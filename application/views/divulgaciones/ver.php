<h1>Ver Divulgacion</h1>

<hr>
<div class="auth-form" ng-controller="divulgacionesController as uni" ng-app="divulgaciones">
   <p>
         <label for="nombre">Nombre del Curso:</label><br>
         <textarea id="nombre" class="auth-input dis" type="text" value="" name="nombre" rows="2" readonly placeholder="<?php echo $prueba[0]["nombre"]; ?>"></textarea>
   </p>

   <div class="col-lg-4">
   <p>
         <label for="radio">Radio:</label><br>		
		 <label for="emisora">Emisora:</label><br>
         <input id="emisora" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php echo $prueba[0]["emisora"];  ?>"></input>
   </p>

   <p>
         <label for="dial">Dial:</label><br>
         <input id="dial" class="auth-input dis" type="text" value="" name="dial" readonly required placeholder="<?php echo $prueba[0]["dial"];  ?>"></input>

   </p>

   <p>
         <label for="hora">Hora:</label><br>
         <input id="hora" class="auth-input dis" type="text" value="" name="hora" readonly required placeholder="<?php echo $prueba[0]["hora_radio"];  ?>"></input>
   </p>

   <p>
         <label for="TDiv">Tipo de Divulgacion:</label><br>
         <input id="TDiv" class="auth-input dis" type="text" value="" name="TDiv"  readonly required placeholder="<?php echo $prueba[0]["tipo_divulgacion_radio"];  ?>"></input>
   </p>
</div>
<div class="col-lg-4">
	   <p>
         <label for="television">Television:</label><br>		
		 <label for="nomPrograma">Nombre del Programa:</label><br>
         <input id="nomPrograma" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php  echo $prueba[0]["nombre_tv"]; ?>"></input>
   </p>
   
     <p>		
		 <label for="canal">Canal:</label><br>
         <input id="canal" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php echo $prueba[0]["canal"];  ?>"></input>
   </p>
        <p>		
		 <label for="horaTv">Hora del Programa:</label><br>
         <input id="horaTv" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php  echo $prueba[0]["hora_tv"]; ?>"></input>
   </p>
   
        <p>		
		 <label for="TDiv2">Tipo de Divulgacion:</label><br>
         <input id="TDiv2" class="auth-input dis" type="text" value="" name="abrev" style="width:250px !important;" readonly required placeholder="<?php echo $prueba[0]["tipo_divulgacion_tv"];  ?>"></input>
   </p>
</div>

<div class="col-lg-4">
	   <p>
         <label for="prensa">Prensa:</label><br>		
		 <label for="nomMedio">Nombre del Programa:</label><br>
         <input id="nomMedio" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php echo $prueba[0]["prensa"];  ?>"></input>
   </p>
   
     <p>		
		 <label for="FNoticia">Fecha de la Noticia:</label><br>
         <input id="FNoticia" class="auth-input dis" type="text" value="" name="abrev" readonly required placeholder="<?php echo $prueba[0]["fecha_prensa"];  ?>"></input>
   </p>
   
        <p>		
		 <label for="TDiv3">Tipo de Divulgacion:</label><br>
   </p>
   <p>		
		 <label for="TDivA">Fisica:</label><br>
         <input id="TDiv1" type="checkbox" value="Periodico" name="abrev"  readonly required placeholder="<?php   ?>">Periodico</input>
		  <input id="TDiv2" class="" type="checkbox" value="Revista" name="abrev" readonly required placeholder="<?php   ?>">Revista</input>
		   <input id="TDiv3" class="" type="checkbox" value="Boletin" name="abrev" readonly required placeholder="<?php   ?>">Boletin</input>
   </p>
    <p>		
		 <label for="TDivB">Digital:</label><br>
         <input id="TDiv4" type="checkbox" value="Periodico Web" name="abrev" readonly required placeholder="<?php   ?>">Periodico Web</input>
		  <input id="TDiv5" class="" type="checkbox" value="" name="abrev" readonly required placeholder="<?php   ?>">Facebook</input>
		  	  <input id="TDiv5" class="" type="checkbox" value="" name="abrev" readonly required placeholder="<?php   ?>">Blog</input>
		   <input id="TDiv6" class="" type="checkbox" value="" name="abrev" readonly required placeholder="<?php   ?>">Twitter</input>
   </p>
</div>
	<p>
		 <input ng-click="edit(<?php $prueba[0]["id_divulgacion"];?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
	</p>

	<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>divulgaciones">Volver</a>
</div>
<script>
	function checkIn(valor)
	{
	    if (valor == $("#TDiv1").val()){
			$("#TDiv1").attr("checked",true);
		}
		
		 if (valor == $("#TDiv2").val()){
			$("#TDiv2").attr("checked",true);
		}
		
		 if (valor == $("#TDiv3").val()){
			$("#TDiv3").attr("checked",true);
		}
		 if (valor == $("#TDiv4").val()){
			$("#TDiv4").attr("checked",true);
		}
		 if (valor == $("#TDiv5").val()){
			$("#TDiv5").attr("checked",true);
		}
		 if (valor == $("#TDiv6").val()){
			$("#TDiv6").attr("checked",true);
		}
	}
	checkIn('<?= $prueba[0]["tipo_divulgacion_prensa"] ?>')
</script>