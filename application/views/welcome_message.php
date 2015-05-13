<div class="row">
<?php $r=$this->ion_auth->user(); 
 $rol = $this->ion_auth->get_users_groups()->row();?>
	<div class="col-lg-12">
			<?php
		$message = $this->session->flashdata('message');
		echo $message;
		?>
		<img class="banner-1" src="<?php echo base_url(); ?>img/encabezado.PNG">
		<nav class="navbar-inverse navbar-pnf">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <p class="head-nav-pnf">EFOSIG</p>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav navpnf">
				<li class="dropdown">
				  <a style="padding: 15px;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PNF<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="Pnf/argelia">PNF "Argelia Laya"</a></li>
					<li><a href="Pnf/yoMujer">PNF "Yo Mujer, Si quiero"</a></li>
					<li><a href="Pnf/defensoras">PNF Defensoras Comunitarias</a></li>
					<!--<li class="divider"></li>-->
					<li><a href="Pnf/somxs">PNF Somxs Diversidad</a></li>
					<!--<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>-->
				  </ul>
				</li>
				<li class="dropdown">
				  <a style="padding: 15px;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Registrarse<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="Persona/agregar">Persona</a></li>
					<li><a href="Persona/agregarMMDB">Persona MMDB</a></li>
				  </ul>
				</li>
				<li><a style="padding: 15px;" href="Cursos">Cursos Disponibles</a></li>
				<li><a style="padding: 15px;" href="Biblioteca">Biblioteca Virtual</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
    </nav>
		<img class="banner-2" src="<?php echo base_url(); ?>img/Banner.PNG">
	</div>
	<div class="col-lg-12" style="padding: 25px;font-size:18px;">
		<p>
			La Escuela de Formación Socialista para la igualdad de Género Ana María Campos” (EFOSIG.AMC),
			del MinMujer, creada en el año 2009, con una visión estratégica, para la elevación de la conciencia
			política de sus trabajadores y trabajadoras y de las miles de mujeres que se agrupan y se organizan en 
			la lucha por la inclusión e igualdad de género y por la defensa de los logros alcanzados en este proceso 
			revolucionario.
		</p>
	</div>
</div>
