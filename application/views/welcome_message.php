<div class="row">
<?php $r=$this->ion_auth->user(); 
 $rol = $this->ion_auth->get_users_groups()->row();?>
	<div class="col-lg-12">
		<img style="width:100%; height:auto" src="<?php echo base_url(); ?>img/encabezado.PNG">
		<nav class="navbar-inverse navbar-pnf">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <p class="head-nav-pnf">PNF</p>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav navpnf">
				<li><a style="padding: 15px;" href="Pnf/argelia">PNF "Argelia Laya"</a></li>
				<li><a style="padding: 15px;" href="Pnf/yoMujer">"Yo Mujer, Si quiero"</a></li>
				<li><a style="padding: 15px;" href="Pnf/defensoras">Defensoras Comunitarias</a></li>
				<li><a style="padding: 15px;" href="Pnf/somxs">Somxs Diversidad</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
    </nav>
		<img style="width:100%; height:auto" src="<?php echo base_url(); ?>img/Banner.PNG">
	</div>
	<?php if($rol == null){ ?>
	<div class="col-lg-3" style="text-align:center;">
		<br>
		<a href="Persona/agregar" class="fa fa-plus btn btn-metis-4"> Registrarse como Persona</a>
		<br><br>
		<a href="Cursos" class="fa fa-search btn btn-metis-4"> Ver Cursos Disponibles</a>
		<br><br>
		<a href="Biblioteca" class="fa fa-file-pdf-o btn btn-metis-4"> Ir a la Biblioteca Virtual</a>
		<br><br>
	</div>
	<?php }?>
	<div class="col-lg-9" style="padding-top: 25px;">
		<p>
			La Escuela de Formación Socialista para la igualdad de Género Ana María Campos” (EFOSIG.AMC),
			del MinMujer, creada en el año 2009, con una visión estratégica, para la elevación de la conciencia
			política de sus trabajadores y trabajadoras y de las miles de mujeres que se agrupan y se organizan en 
			la lucha por la inclusión e igualdad de género y por la defensa de los logros alcanzados en este proceso 
			revolucionario.
		</p>
	</div>
</div>
