<?php
	if (!$this->ion_auth->is_admin()){
		redirect('auth');
	}
?>
<div class="auth-form">

	<h1><?php echo lang('edit_group_heading');?></h1>
	<p><?php echo lang('edit_group_subheading');?></p>

	<div id="infoMessage"><?php echo $message;?></div>

	<?php echo form_open(current_url());?>

	      <p>
	            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
	            <?php echo form_input($group_name);?>
	      </p>

	      <p>
	            <?php echo lang('edit_group_desc_label', 'description');?> <br />
	            <?php echo form_input($group_description);?>
	      </p>

	      <p>  <input type="submit" class="auth-button .btn-success" value="Editar" name="submit"></input></p>

	<?php echo form_close();?>
</div>