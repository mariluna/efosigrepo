<div class="col-lg-6" style="text-align:center;">
  <h1><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>

  <div id="infoMessage">
    <?php echo $message;?>
  </div>

  <?php echo form_open("auth/login");?>

    <p>
      <label for="email">Correo:</label><br>
      <?php echo form_input($identity);?>
    </p>

    <p>
      <label for="password">Contraseña:</label><br>
      <?php echo form_input($password);?>
    </p>

    <p>
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </p>


    <p>
      <input type="submit" class="auth-button .btn-success" value="Ingresar" name="submit"></input>
    </p>

  <?php echo form_close();?>

  <p>
    <a href="Auth/forgot_password"><?php echo lang('login_forgot_password');?></a>
  </p>
</div>
<div class="col-lg-6" style="text-align:center;">
	<h1>Registrate</h1>
	<p>Si no posees usuario, oprime el boton de Registrarse<br><br>
		<a class="auth-but-fix .btn-success" style="padding: 9px 12px; !important;" href="<?php echo base_url()?>Persona/agregar">Registrarse</a>
	</p>
</div>