<?php $extras=$this->db->query("select * from users where id=$user->id;")->row(); 
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
	  
    });
 });
</script>
<div class="auth-form">
  <h1><?php echo lang('edit_user_heading');?></h1>
  <p><?php echo lang('edit_user_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>

 <?php echo form_open("auth/edit_user/$extras->id");?>
<div class="col-lg-6">
     <p>
         <label for="user">Nombre de Usuario:</label><br>
		<input class="auth-input" name="user" value="<?php echo $extras->username;?>" id="user" type="text" required>
	</p>

   <p>
         <label for="pregunta">Pregunta Secreta:</label><br>
         <input id="pregunta" class="auth-input" type="text" value="<?php echo $extras->pregunta; ?>" name="pregunta" required></input>
   </p>
   
      <p>
         <label for="respuesta">Respuesta:</label><br>
         <input id="respuesta" class="auth-input" type="text" value="<?php echo $extras->respuesta; ?>" name="respuesta" required></input>
   </p>
</div>
<div class="col-lg-6">

	<p>
         <label for="password">Contraseña (si desea cambiarla):</label> <br>
         <input class="auth-input" name="password" value="" id="password" type="password">
   </p>
	<p>
         <label for="password_confirm">Confirmar contraseña (si desea cambiarla):</label> <br>
         <input class="auth-input" name="password_confirm" value="" id="password_confirm" type="password">
   </p>
   
		<?php if ($this->ion_auth->is_admin()): ?>
	   <p>
			 <label for="cargo">Cargo:</label><br>
			 <input id="cargo" class="auth-input" type="text" value="<?php echo $extras->cargo; ?>" name="cargo" required></input>
	   </p>
		<?php endif ?>
  </div>

  <div class="col-lg-12">     
  		<hr>
        <?php if ($this->ion_auth->is_admin()): ?>

            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <?php foreach ($groups as $group):?>
                <label class="checkbox">
                <?php
                    $gID=$group['id'];
                    $checked = null;
                    $item = null;
                    foreach($currentGroups as $grp) {
                        if ($gID == $grp->id) {
                            $checked= ' checked="checked"';
                        break;
                        }
                    }
                ?>
                <input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                <?php echo $group['name'];?>
                </label>
            <?php endforeach?>

        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>

        <p>  <input type="submit" class="auth-button .btn-success" value="Editar" name="submit"></input></p>
		</div>
  <?php echo form_close();?>
</div>