<div class="auth-form">
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
    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
  </p>
</div>