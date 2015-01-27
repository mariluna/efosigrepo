<!-- Titulo -->
<?php $r=$this->ion_auth->user(); 
//print_r($r);
?>
<h1>Divulgaciones</h1>
<hr>
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" ng-controller="divulgacionesController as uni" ng-app="divulgaciones">
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
                    <th style="min-width: 80px; text-align: center;">Nombre del Curso</th>
                    <th style="min-width: 80px; text-align: center;">Divulgacion(es)</th>
                    <th style="min-width: 80px; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="divulgacion in filtered =( divulgaciones | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ divulgacion.nombre}}</td>
                    <td>{{ divulgacion.nombre_radio | nombreDivR}} {{divulgacion.nombre_tv | nombreDivTv}} {{divulgacion.prensa | nombreDivP}}   </td>
                   <!-- + {{ divulgacion.nombre_tv | 'nombreDivTv'}} + {{divulgacion.prensa | 'nombreDivP'}} -->
                    <td>
                        <a ng-click="view(divulgacion.id_divulgacion)" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="edit(divulgacion.id_divulgacion)" class="fa fa-pencil btn btn-small btn-primary"></a>
                        <a ng-click="delete(divulgacion.id_divulgacion)" class="fa fa-trash btn btn-small btn-danger"></a>
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