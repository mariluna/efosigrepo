<div class="row">
<?php $r=$this->ion_auth->user(); 
 $rol = $this->ion_auth->get_users_groups()->row();?>
	<div class="col-lg-12">
		<img style="width:100%; height:auto" src="<?php echo base_url(); ?>img/encabezado.PNG">
		<div>
		<ul>
			<li> <a href="Pnf/argelia">PNF "Argelia Laya"</a> </li>
			<li> <a href="Pnf/yoMujer">"Yo Mujer, Si quiero" </a></li>
			<li href="Pnf/defensoras">Defensoras Comunitarias</li>
			<li href="Pnf/somxs">Somxs Diversidad</li>
		</ul>
		</div>
		<img style="width:100%; height:auto" src="<?php echo base_url(); ?>img/Banner.PNG">
	</div>
	<?php if($rol == null){ ?>
	<div class="col-lg-6">
	
		<!-- <img style="width:100%; height:auto" src="<?php //echo base_url(); ?>img/logo_efosig.jpg"> -->
		<br><a href="Persona/agregar" class="fa fa-plus btn btn-success"> Registrarse como Persona</a>
		<br><br><a href="Cursos" class="fa fa-plus btn btn-success"> Ver Cursos Disponibles</a>
	</div>
	<?php }?>
	<div class="col-lg-6" style="padding-top: 25px;">
		<p>
			La Escuela de Formación Socialista para la igualdad de Género Ana María Campos” (EFOSIG.AMC),
			del MinMujer, creada en el año 2009, con una visión estratégica, para la elevación de la conciencia
			política de sus trabajadores y trabajadoras y de las miles de mujeres que se agrupan y se organizan en 
			la lucha por la inclusión e igualdad de género y por la defensa de los logros alcanzados en este proceso 
			revolucionario.
		</p>
	</div>
</div>
