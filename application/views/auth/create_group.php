<div class="auth-form">
	<h1><?php echo lang('create_group_heading');?></h1>
	<p><?php echo lang('create_group_subheading');?></p>

	<div id="infoMessage"><?php echo $message;?></div>

	<?php echo form_open("auth/create_group");?>

	      <p>
	            <?php echo lang('create_group_name_label', 'group_name');?> <br />
	            <?php echo form_input($group_name);?>
	      </p>

	      <p>
	            <?php echo lang('create_group_desc_label', 'description');?> <br />
	            <textarea id="description" class="auth-input auth-textarea" type="text" value="" name="description" rows="2"></textarea>
	      </p>

	      <p>  <input type="submit" class="auth-button .btn-success" value="Crear" name="submit"></input></p>

	<?php echo form_close();?>
</div>