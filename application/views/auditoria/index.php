
<!-- Titulo -->
<?php $r=$this->ion_auth->user(); ?>
<h1>Auditor&iacute;a</h1>
<hr>
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" ng-controller="auditoriaController" ng-app="auditoria">
        <div class="add-menu">
            <td><a ng-click="respaldo()" class="fa fa-plus btn btn-success"> Respaldo de BD</a></td>
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
                    <th style="min-width: 80px; text-align: center;">Usuario</th>
                    <th style="min-width: 80px; text-align: center;">Acci&oacute;n</th>
					<th style="min-width: 80px; text-align: center;">Fecha Edici&oacute;n</th>
                    <th style="min-width: 80px; text-align: center;">Tabla Afectada</th>
					<!--<th style="min-width: 80px; text-align: center;">Campo Afectado</th>
					<th style="min-width: 80px; text-align: center;">Informacion campo</th> -->
                    <th style="min-width: 80px; text-align: center;">Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="auditoria in filtered =( auditorias | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ auditoria.username }}</td>
                    <td>{{ auditoria.accion }}</td>
                    <td>{{ auditoria.fecha }}</td>
                    <td>{{ auditoria.tabla_afectada }}</td>
                    <!-- <td>{{ auditoria.campo_afectado}}</td>
                    <td>{{ auditoria.informacion_campo}}</td> -->
                    <!-- botones que disparan funciones en angular, las cuales se encuentran el la aplicacion -->
                    <td>
                        <a ng-click="view(auditoria.id_auditoria)" class="fa fa-search btn btn-small btn-info"></a>
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