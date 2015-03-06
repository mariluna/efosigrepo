<h1>Evaluaci&oacute;n</h1>
<hr>
<?php 
$r=$this->ion_auth->user()->row();	
//var_dump ($r->persona_id);
?>
<div class="auth-form"  ng-controller="evaluacionController" ng-app="evaluacion">
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" >
        <div class="add-menu">
            <!-- ng-click="createUT()" botones que disparan funciones en angular, las cuales se encuentran el la aplicacion -->
			<td></td>
        </div>
		<div style="width:30%;">
            <input type ="text" class="form-control" ng-model="query" placeholder="Filtrar">
		</div>	
        <!-- CRUD -->
        <table class="table table-striped table-condensed" style="text-align: center;">
            <thead>
                <tr>
                    <th style="min-width: 80px; text-align: center;">Curso</th>
					<th style="min-width: 80px; text-align: center;">Evaluaciones Total/Llenas</th>
					<th style="min-width: 80px; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="detalle in filtered =( detalles | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ detalle.nombre }}</td>
					<td>{{ detalle.total }} / {{ detalle.lleno }} </td>
					<td>
					<?php
						$rol = $this->ion_auth->get_users_groups()->row();
						if ($rol->id == 2 ) { ?>
						<a ng-click="addEvaluacion(detalle.id_curso)" class="fa fa-plus btn btn-success"> Agregar</a>
						<?php } else { ?>
                        <a ng-click="download(detalle.id_curso)" class="fa fa-download btn btn-info"> Excel</a>
						<?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
		<div class="pagination-div">
            <ul class="pagination">
                <li ng-class="DisablePrevPage()">
                    <a href ng-click="firstPage()"><i class="fa fa-angle-double-left pagi"></i></a>
                </li>
                <li ng-class="DisablePrevPage()">
                    <a href ng-click="prevPage()"><i class="fa fa-angle-left pagi "></i></a>
                </li>
                <li ng-repeat="n in range()" ng-class="{active: n == currentPage}" ng-click="setPage(n)">
                    <a href >{{n+1}}</a>
                </li>
                    <li ng-class="DisableNextPage()">
                    <a href ng-click="nextPage()"><i class="fa fa-angle-right pagi"></i></a>
                </li>
                </li>
                    <li ng-class="DisableNextPage()">
                    <a href ng-click="lastPage()"><i class="fa fa-angle-double-right pagi"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>