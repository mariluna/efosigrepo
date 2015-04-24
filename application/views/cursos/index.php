<!-- Titulo -->
<?php 
 //$r=$this->ion_auth->user(); 
 $rol = $this->ion_auth->get_users_groups()->row();
 $r=$this->ion_auth->user()->row();
 ?>
<h1>Cursos</h1>
<hr>
<script type="text/javascript">
$(document).ready(function() {
    $(".loader").fadeOut("slow");
	
	$('.close').click(function () {
		$('.alert').remove();
	});
})
</script>
<div class="loader"></div>
<div>
    <!-- Div que contiene la aplicacion ng-app="project" y el controlador de angular ng-controller="ApiController" -->
    <div class="span6" ng-controller="cursosController as uni" ng-app="cursos">
		<?php if ($rol==null){ ?>
		<div class="add-menu">
            <td><a href="<?php echo base_url(); ?>" class="fa fa-arrow-left  btn btn-success"> Volver </a></td>
        </div>
		<?php } ?>
        <!--aqui el f=if para ocultar el boton de agregar -->
		<?php if(($rol != null) && ($rol->id == 1)){ ?>
		<div class="add-menu">
            <td><a ng-click="addEntity()" class="fa fa-plus btn btn-success"> Agregar Nuevo Curso</a></td>
			<td><a ng-click="descAsis()" class="fa fa-download btn btn-info"> Descargar Asistencia </a></td>
        </div> 
		<?php }elseif(($rol != null) && ($rol->id == 3)){ ?>
		<div class="add-menu">
            <td><a ng-click="addAsiss()" class="fa fa-plus btn btn-primary"> Cargar Asistencia </a></td>
			<td><a ng-click="descAsis()" class="fa fa-download btn btn-info"> Descargar Asistencia </a></td>
		</div> 
		<?php } ?>	
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
                    <th style="min-width: 80px; text-align: center;">Nombre del Curso</th>
                    <th style="min-width: 80px; text-align: center;">Duraci&oacute;n</th>
                    <th style="min-width: 80px; text-align: center;">N° Participantes / Inscritos</th>
                    <th style="min-width: 80px; text-align: center;">Estatus</th>
                    <th style="min-width: 80px; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="curso in filtered =( cursos | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ curso.nombre + " ("+ curso.estado + ")"}}</td>
                    <td>{{ curso.duracion }} (Horas)</td>
                    <td>{{ curso.nro_participantes + " / " + curso.inscritos}}</td>
                    <td>{{ curso.status | estatusDir}}</td>
					<?php if(($rol != null) && ($rol->id == 1)){ ?>
                    <td>
                        <a ng-click="view(curso.id_curso, curso.estado)" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="edit(curso.id_curso, curso.estado)" class="fa fa-pencil btn btn-small btn-primary"></a>
                        <a ng-click="delete(curso.id_curso, curso.estado)" class="fa fa-trash btn btn-small btn-danger"></a>
						<a ng-click="register(curso.nro_participantes, curso.inscritos, curso.id_curso,<?php echo $r->persona_id; ?>,curso.id_estado)" class="fa fa-list-alt btn btn-small btn-success"></a>
                    </td>
					<?php }elseif($rol != null){ ?>
					<td>
                        <a ng-click="view(curso.id_curso, curso.estado)" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="register(curso.nro_participantes, curso.inscritos, curso.id_curso,<?php echo $r->persona_id; ?>,curso.id_estado)" class="fa fa-list-alt btn btn-small btn-success"></a>
                    </td>
					<?php } elseif($rol == null){?>
					<td>
                        <a ng-click="view(curso.id_curso, curso.estado)" class="fa fa-search btn btn-small btn-info"></a>
                        <a ng-click="regLogin(curso.nro_participantes, curso.inscritos, curso.id_curso)" class="fa fa-list-alt btn btn-small btn-success"></a>
                    </td>
					<?php } ?>
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