<h1>VER INFORME REGIONAL SEMANAL POR ACTIVIDAD</h1>
<hr>
<div class="auth-form" ng-controller="informeController as uni" ng-app="informe">

   <p>
         <label for="nombre">REDI:</label><br>
         <textarea id="nombre" class="auth-input auth-textarea dis-area" type="text" value="" name="redi" rows="2" readonly placeholder="<?php  echo $nombre; ?>"></textarea>
   </p>


	<p>
		 <input ng-click="edit(<?php echo $id_curso; ?>)" type="button" class="auth-button .btn-success go" value="Editar" name="submit"></input>
	</p>

	<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>informe">Volver</a>
</div>