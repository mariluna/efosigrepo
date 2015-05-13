<!-- Titulo -->
<?php $r=$this->ion_auth->user(); ?>
<h1>Actividad regional por curso</h1>
<hr>
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" ng-controller="informeController" ng-app="informe">
        <div class="add-menu">
            <td><a ng-click="addEntity()" class="fa fa-plus btn btn-success"> Agregar </a></td>
        </div>
        <!-- Input que contiene un modelo, con el cual podemos filtrar la data del CRUD -->
        <div style="width:30% !important;">
            <input type ="text" class="form-control" ng-model="query" placeholder="Filtrar">
           <!--  <div ng-hide="filtered.length===3">{{filtered.length}}</div> -->
        </div>
        <!-- CRUD -->
		<?php
		$message = $this->session->flashdata('message');
		echo $message;
		?>
        <table class="table table-striped table-condensed" style="text-align: center;">
            <thead>
                <tr>
                    <th style="min-width: 80px; text-align: center;">Regi&oacute;n</th>
                    <th style="min-width: 80px; text-align: center;">Curso</th>
					<th style="min-width: 80px; text-align: center;">Actividad</th>
                    <th style="min-width: 80px; text-align: center;">Nombre de la actividad</th>
					  <th style="min-width: 80px; text-align: center;">Creado</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="informe in filtered =( informes | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ informe.region }}</td>
                     <td>{{ informe.curso }}</td>
					 <td>{{ informe.tipo_actividad_for }}</td>
					 <td>{{ informe.act_nombre_for }}</td>
					  <td>{{ informe.usuario}}</td>
                    <td>
                        <a ng-click="view(informe.id_informe)" title="Ver Actividad" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="edit(informe.id_informe)" title="Actualizar Actividad"class="fa fa-pencil btn btn-small btn-primary"></a>
                        <a ng-click="delete(informe.id_informe)" title="Eliminar Actividad" class="fa fa-trash btn btn-small btn-danger"></a>
						<a ng-click="viewInforme(informe.id_informe)" title="Informe PDF" target="_blank" class="fa fa-file-pdf-o btn btn-small btn-danger"></a>
                    </td>
                </tr>
            </tbody>
        </table>
		          <div class="pagination-div" ng-hide="filter:query">
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