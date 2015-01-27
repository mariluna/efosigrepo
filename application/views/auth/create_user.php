<?php
      if (!$this->ion_auth->is_admin()){
            redirect('auth');
      }
?>
<script type="text/javascript">
$(document).ready(function() {
    $(".submit").click(function(e) {
    var clave  = $('#password').val();
    var clave2 = $('#password_confirm').val();
	
      if(clave != clave2){
        alert("Las contraseñas no son iguales, verifique e intente de nuevo.");
        e.preventDefault();
      }
	  
	  if(clave.length <= 7){
        alert("La contraseña debe tener un minimo de 8 caracteres, intente de nuevo.");
        e.preventDefault();
      }
    });
 });
</script>
<div class="auth-form">
  <h1><?php echo lang('create_user_heading');?></h1>
  <p><?php echo lang('create_user_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>

 <?php echo form_open("auth/create_user");?>
<div class="col-lg-6">
	<p>
         <label for="user">Nombre de Usuario:</label><br>
		<input class="auth-input" name="user" value="" id="user" type="text" required>
	</p>
   
   <p>
         <label for="persona">Persona:</label><br>
		 <?php  $result=pg_query("select * from tb_persona where id_persona not in (select persona_id from users)"); ?>
				<select name="persona" class="auth-input" required>
				<option value="" selected>Seleccione</option>
		<?php		
			while ($row = pg_fetch_row($result)) {
				echo "<option value='$row[0]'>$row[6]</option>";
			}		 
		 ?>
		</select>
   </p>

   <p>
         <label for="pregunta">Pregunta Secreta:</label><br>
         <input id="pregunta" class="auth-input" type="text" value="" name="pregunta" required></input>
   </p>
   
      <p>
         <label for="respuesta">Respuesta:</label><br>
         <input id="respuesta" class="auth-input" type="text" value="" name="respuesta" required></input>
   </p>
</div>
<div class="col-lg-6">

	<p>
         <label for="email">Email:</label> <br>
         <input class="auth-input" name="email" value="" id="email" type="email" required>
   </p>

   <p>
         <label for="cargo">Cargo:</label><br>
         <input id="cargo" class="auth-input" type="text" value="" name="cargo" required></input>
   </p>

	<p>
         <label for="password">Contraseña:</label> <br>
         <input class="auth-input" name="password" value="" id="password" type="password">
   </p>
	<p>
         <label for="password_confirm">Confirmar contraseña:</label> <br>
         <input class="auth-input" name="password_confirm" value="" id="password_confirm" type="password">
   </p>
  </div>
<div class="col-lg-12">
   <p>  <input type="submit" class="auth-button .btn-success submit" value="Crear" name="submit"></input></p>
</div>
      <?php echo form_close();?>
</div>