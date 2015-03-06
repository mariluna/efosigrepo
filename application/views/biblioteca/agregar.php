<h1>Agregar a Biblioteca</h1>
<hr>
<div class="auth-form" ng-app="biblioteca">
	<?php $d=array('name' => 'form'); echo form_open_multipart(base_url().'Biblioteca/subir_archivo',$d); ?>
	
	<div class="col-lg-6">
		<p>
			<label for="desc">Descripcion del Archivo:</label><br>
			<textarea id="desc" class="auth-input auth-textarea" type="text" value="" name="desc" rows="2" required></textarea>
		</p>

		<p>
			<label for="archivo">Archivo</label><br>
			<input id="archivo" type="file" name="archivo" required/>
		</p>
	</div>
	
	<div class="col-lg-6">

		<p>
			<label for="tipo">Tipo:</label><br>
			<select name="tipo" class="auth-input" style="max-width: 300px !important; text-align: center;" required>
				<option value="">Seleccione</option>
				<option value="Video">Video</option>
				<option value="Archivo">Archivo</option>				
			</select>
		</p>
	</div>
	<div class="col-lg-12">
		<p>
			<input type="submit" class="auth-button .btn-danger go" value="Agregar" name="submit"></input>
		</p>
		<p>
			<a class="auth-button .btn-danger back" href="<?php echo base_url()?>Biblioteca">Volver</a>
		</p>
	</div>
	<?php echo form_close(); ?>
</div>