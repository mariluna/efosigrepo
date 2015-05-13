<!-- Titulo -->
<?php $r=$this->ion_auth->user(); 
 $rol = $this->ion_auth->get_users_groups()->row();?>
<h1>Biblioteca</h1>
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
    <div class="span6" ng-controller="bibliotecaController" ng-app="biblioteca">
        <!--aqui el f=if para ocultar el boton de agregar -->
		<?php if(($rol != null) && ($rol->id == 1)){ ?>
		<div class="add-menu">
            <td><a ng-click="addEntity()" class="fa fa-plus btn btn-success"> Agregar </a></td>
        </div> 
		<?php }else{ ?>
		<div class="add-menu">
			<a href="<?php echo base_url(); ?>" class="fa fa-arrow-left  btn btn-danger"> Volver </a>
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
                    <th style="min-width: 80px; text-align: center;">Titulo</th>
                    <th style="min-width: 80px; text-align: center;">Descripci&oacute;n</th>
                    <th style="min-width: 80px; text-align: center;">Tipo</th>
                    <th style="min-width: 80px; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- con el ng-repeat le decimos que carge y repita tantas filas como datos obtenga y el filter para filtrar los datos-->
                <tr ng-repeat="biblioteca in filtered =( bibliotecas | filter:query ) | pagination : currentPage*itemsPerPage | limitTo: itemsPerPage">
                    <!-- Data que va a mostrar el CRUD -->
                    <td>{{ biblioteca.titulo }}</td>
                    <td>{{ biblioteca.descripcion }}</td>
                    <td>{{ biblioteca.tipo_multimedia }}</td>
					<td>
                        <a ng-click="viewMulti(biblioteca.ruta)" class="fa fa-search btn btn-small btn-info"></a>
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