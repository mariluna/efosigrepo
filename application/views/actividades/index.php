<!-- Titulo -->
<?php $r=$this->ion_auth->user(); 
?>
<h1>Actividades</h1>
<hr>
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" ng-controller="actividadesController" ng-app="actividades">
        <div class="add-menu">
            <td><a ng-click="addEntity()" class="fa fa-plus btn btn-success"> Agregar </a></td>
        </div>
        <!-- Input que contiene un modelo, con el cual podemos filtrar la data del CRUD -->
        <div style="width:30% !important;">
            <input type ="text" class="form-control" ng-model="query" placeholder="Filtrar">
           <!--  <div ng-hide="filtered.length===3">{{filtered.length}}</div> -->
        </div>
        <!-- CRUD -->
        <table class="table table-striped table-condensed" style="text-align: center;">
            <thead>
                <tr>
                    <th style="min-width: 80px; text-align: center;">Titulo</th>
                    <th style="min-width: 80px; text-align: center;">Creado por</th>
                    <th style="min-width: 80px; text-align: center;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="actividad in filtered =( actividades | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ actividad.titulo }}</td>
                    <td>{{ actividad.name }}</td>
                    <td>{{ actividad.fecha }}</td>
                    <td>
                        <a ng-click="view(actividad.id_actividad)" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="edit(actividad.id_actividad)" class="fa fa-pencil btn btn-small btn-primary"></a>
                        <a ng-click="delete(actividad.id_actividad)" class="fa fa-trash btn btn-small btn-danger"></a>
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