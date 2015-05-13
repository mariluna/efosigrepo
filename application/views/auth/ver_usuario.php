<h1>Ver Usuario</h1>
<hr>
<div class="auth-form">
  <h1><?php echo lang('edit_user_heading');?></h1>
  <p><?php echo lang('edit_user_subheading');?></p>

<div class="col-lg-6">
     <p>
         <label for="user">Nombre de Usuario:</label><br>
		<input class="auth-input dis dis" name="user" value="<?php //echo $extras->username;?>" id="user" type="text" readonly>
	</p>

   <p>
         <label for="pregunta">Pregunta Secreta:</label><br>
         <input id="pregunta" class="auth-input dis" type="text" value="<?php //echo $extras->pregunta; ?>" name="pregunta" readonly></input>
   </p>
   
      <p>
         <label for="respuesta">Respuesta:</label><br>
         <input id="respuesta" class="auth-input dis" type="text" value="<?php //echo $extras->respuesta; ?>" name="respuesta" readonly></input>
   </p>
</div>
<div class="col-lg-6">

		<?php if ($this->ion_auth->is_admin()): ?>
	   <p>
			 <label for="cargo">Cargo:</label><br>
			 <input id="cargo" class="auth-input dis" type="text" value="<?php //echo $extras->cargo; ?>" name="cargo" readonly></input>
	   </p>
		<?php endif ?>
  </div>

  <div class="col-lg-12">
  <br><br><br>
		<a class="auth-but-fix .btn-danger fix-back" href="<?php echo base_url()?>Auth">Volver</a>
	</div>
</div>