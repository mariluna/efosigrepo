<html class="no-js" style="background-color: #6E6E6E;">
<?php $rol = $this->ion_auth->get_users_groups()->row();?>
  <head>
    <meta charset="UTF-8">
<script>
    function menuopen() {
      var time = document.getElementById("menucol").style.display;
      if (time = "none") {
          document.getElementById("menucol").style.display = "inline";
      } else if (time = "inline") {
          document.getElementById("menucol").style.display = "none";
      } else {
          document.getElementById("menucol").style.display = "none";
      }
    }
</script>
    <base href="<?php echo base_url(); ?>">
	  <title>EFOSIG</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/minmujeroficial.jpg" type="image/jpg" />
    <!--Carga de angular y las diferentes apps -->
    <script src="<?php echo base_url(); ?>js/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
    <script src="<?php echo base_url(); ?>js/cursos.js"></script>
    <script src="<?php echo base_url(); ?>js/persona.js"></script>
	<script src="<?php echo base_url(); ?>js/divulgaciones.js"></script>
	<script src="<?php echo base_url(); ?>js/informe.js"></script>
	<script src="<?php echo base_url(); ?>js/agendas.js"></script>	
	<script src="<?php echo base_url(); ?>js/biblioteca.js"></script>
	<script src="<?php echo base_url(); ?>js/evaluacion.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylesheet.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.timepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/timepicker/jquery-ui-1.10.0.custom.min.css">
    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.timepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.timepicker-es.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.position.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.tabs.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/lib/timepicker/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.easyWizard.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
	
  </head>
    <body class="  " id="mybody">

    <div class="bg-dark dk" id="wrap">
      <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
			
            <header class="navbar-header">
			<?php if ($this->ion_auth->logged_in()){ ?>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" onclick="menuopen()">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			  <?php } ?>
              <a href="<?php echo base_url(); ?>" class="navbar-brand">
                <img style ="width: 275px; position: absolute;" src="<?php echo base_url(); ?>assets/img/logo_efosig.jpg" alt="">
              </a>
            </header>
			
               <div class="topnav">
               <?php if (!$this->ion_auth->logged_in()){
                  echo '<span class="user">Iniciar Sesi&oacute;n</span>';
                  ?>
                 <div class="btn-group">
                  <a href="<?php echo base_url(); ?>Auth/login" data-toggle="tooltip" data-original-title="Iniciar Sesion" data-placement="bottom" class="btn btn-metis-2 btn-sm">
                     <i class="fa fa-power-off"></i>
                  </a>
                 </div>
                 <?php }elseif($this->ion_auth->logged_in()){

                    echo '<span class="user">Cerrar Sesi&oacute;n</span>';

                 ?>
                 <div class="btn-group">
                   <a href="<?php echo base_url(); ?>Auth/logout" data-toggle="tooltip" data-original-title="Salir" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                     <i class="fa fa-power-off"></i>
                   </a>
                 </div>
                 <?php  } ?>
               </div>
		
        <div class="collapse navbar-collapse navbar-ex1-collapse">

       <!-- .nav -->
        <div id="menucol" class="menu-open">
			<ul id="menu" class="bg-blue dker">
				<li class="nav-header">Menu</li>
				<li class="nav-divider"></li>
				<li class="">
            <a href="Cursos">
              <i class="fa fa-newspaper-o"></i><span class="link-title">&nbsp;Cursos</span>
            </a>
        </li>
		  
		<li class="">
            <a href="<?php echo base_url(); ?>Biblioteca">
              <i class="fa fa-copy"></i><span class="link-title">&nbsp;Biblioteca</span>
            </a>
        </li>
		
		<li class="">
            <a href="<?php echo base_url(); ?>Evaluacion">
              <i class="fa fa-check-square-o"></i><span class="link-title">&nbsp;Evaluaci&oacute;n</span>
            </a>
        </li>
		
		<?php if($rol->id == 1 || $rol->id == 3){ ?>
          <li class="">
            <a href="<?php echo base_url(); ?>Auth">
              <i class="fa fa-group"></i><span class="link-title">&nbsp;Usuarios</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo base_url(); ?>Persona">
              <i class="fa fa-user"></i><span class="link-title">&nbsp;Persona</span>
            </a>
          </li>
		  
		  
		  
		  <li class="">
            <a href="<?php echo base_url(); ?>Divulgaciones">
              <i class="fa fa-newspaper-o"></i><span class="link-title">&nbsp;Divulgaciones</span>
            </a>
          </li>
		  
		   <li class="">
            <a href="<?php echo base_url(); ?>Informe">
              <i class="fa fa-file-text"></i><span class="link-title">&nbsp;Informe</span>
            </a>
          </li>
		  
		  <li class="">
            <a href="<?php echo base_url(); ?>Agenda">
              <i class="fa fa-tags"></i><span class="link-title">&nbsp;Agenda</span>
            </a>
          </li>
		  
		  <li class="">
            <a href="<?php echo base_url(); ?>Auditoria">
              <i class="fa fa-lock"></i><span class="link-title">&nbsp;Auditoria</span>
            </a>
          </li> 
		  
		  <?php } ?>
             <li class="nav-divider"></li>
           <li class="">
            <a  data-toggle="tooltip" onClick="document.getElementById('mybody').className += ' sidebar-right-opened'; $('#footer').hide()">
              <i class="fa fa-folder-open"></i><span class="link-title">&nbsp;Ver Agenda</span>
            </a>
          </li>
          <li class="">
            <a data-toggle="tooltip"  onClick="document.getElementById('mybody').className =' '; $('#footer').show()">
              <i class="fa fa-folder"></i><span class="link-title">&nbsp;Ocultar Agenda</span>
            </a>
          </li>
				<li class="nav-divider"></li>
			</ul><!-- /#menu -->
		</div>
        </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
      </div><!-- /#top -->
       <?php if ($this->ion_auth->logged_in()){ ?>

        <div id="left">
		<?php if (!$this->ion_auth->logged_in()){

                 }elseif($this->ion_auth->logged_in()){ ?>
                  <div class="btn-group">
                   <a style ="padding: 4px 6px !important;margin:0 !important; margin-left: 1px !important"data-toggle="tooltip" class="btn btn-metis-1 btn-sm min" onClick="document.getElementById('mybody').className = 'sidebar-left-mini'">
                     <i class="fa fa-arrow-left"></i>
                   </a>
                   <a style ="padding: 4px 6px !important; margin:0 !important;" data-toggle="tooltip" class="btn btn-metis-1 btn-sm" onClick="document.getElementById('mybody').className = ' '">
                     <i class="fa fa-arrow-right"></i>
                   </a>
                 </div>
                 <?php  } ?>
          <?php $user = $this->ion_auth->user()->row(); ?>

          <div class="media user-media bg-dark dker">
            <div class="user-media-toggleHover">
              <span class="fa fa-user"></span>
            </div>

            <div class="user-wrapper bg-dark">
              <div class="media-body" >
                <h5 class="media-heading fa fa-user">&nbsp;<?php echo $user->username; ?></h5>
                <ul class="list-unstyled user-info">

                  <li><a href="auth/edit_user/<?php echo $user->id; ?>" class="edit-profile fa fa-pencil"> Editar Perfil</a></li>
                  <li><small><i class="fa fa-calendar"></i>&nbsp;<?php echo date('d-m-Y');?></small></li>

                </ul>
              </div>
            </div>
          </div>


       <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>

         <li class="">
            <a href="Cursos">
              <i class="fa fa-newspaper-o"></i><span class="link-title">&nbsp;Cursos</span>
            </a>
        </li>
		  
		<li class="">
            <a href="<?php echo base_url(); ?>Biblioteca">
              <i class="fa fa-copy"></i><span class="link-title">&nbsp;Biblioteca</span>
            </a>
        </li>
		
		<li class="">
            <a href="<?php echo base_url(); ?>Evaluacion">
              <i class="fa fa-check-square-o"></i><span class="link-title">&nbsp;Evaluaci&oacute;n</span>
            </a>
        </li>

		<?php if($rol->id == 1 || $rol->id == 3){ ?>
          <li class="">
            <a href="<?php echo base_url(); ?>Auth">
              <i class="fa fa-group"></i><span class="link-title">&nbsp;Usuarios</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo base_url(); ?>Persona">
              <i class="fa fa-user"></i><span class="link-title">&nbsp;Persona</span>
            </a>
          </li>
		  
		  <li class="">
            <a href="<?php echo base_url(); ?>Divulgaciones">
              <i class="fa fa-newspaper-o"></i><span class="link-title">&nbsp;Divulgaciones</span>
            </a>
          </li>
		  
		   <li class="">
            <a href="<?php echo base_url(); ?>Informe">
              <i class="fa fa-file-text"></i><span class="link-title">&nbsp;Informe</span>
            </a>
          </li>
		  
		  <li class="">
            <a href="<?php echo base_url(); ?>Agenda">
              <i class="fa fa-tags"></i><span class="link-title">&nbsp;Agenda</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo base_url(); ?>Auditoria">
              <i class="fa fa-lock"></i><span class="link-title">&nbsp;Auditoria</span>
            </a>
          </li> 
		  <?php } ?>
             <li class="nav-divider"></li>
           <li class="">
            <a onClick="document.getElementById('mybody').className += ' sidebar-right-opened'; $('#footer').hide()">
              <i class="fa fa-folder-open"></i><span class="link-title">&nbsp;Ver Agenda</span>
            </a>
          </li>
          <li class="">
            <a data-toggle="tooltip"  onClick="document.getElementById('mybody').className =' '; $('#footer').show()">
              <i class="fa fa-folder"></i><span class="link-title">&nbsp;Ocultar Agenda</span>
            </a>
          </li>
           <li class="nav-divider"></li>
        </li>
        </ul><!-- /#menu -->
      </div><!-- /#left -->

       <div id="right"style="width:250px;">
               <?php //echo"hola"; print_r($rol); ?>
		   <ul id="menu" class="bg-blue dker">
			  <li class="nav-header">Agenda</li>
			  <li class="nav-divider"></li>
				<?php 
					$today = date("Y-m-d");
					$r=$this->ion_auth->user()->row();
					$X = pg_query("SELECT t1.id_actividad,t1.titulo, fecha  
								   FROM tb_actividad t1
							       INNER JOIN users t2 ON t1.id_usuario = t2.id 
								   WHERE  t1.id_usuario IN (1, $r->id)
								   AND fecha >= '$today' 
								   ORDER BY fecha ASC"); 
						
					while($row = pg_fetch_row($X)){
					
						$fecha = $row[2];
						$newFecha = explode("-",$fecha);
						$fechaFormat = $newFecha[2]."-".$newFecha[1]."-".$newFecha[0];
						echo "<li class=''>";					
						echo "<a  href = '".base_url()."/Agenda/ver/".$row[0]."'>".$fechaFormat." - ".$row[1]."</a>";
						echo "</li>";
					}
						
				?>
				<li class="nav-divider"></li>
			</ul>
      </div><!-- /#right -->
       <?php  } ?>
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
                 <div class="col-lg-12">

