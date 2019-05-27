<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controllers/usuarios.js" ></script>
<div class="container m-5">
	<div class="row">
        <div class="col-sm-6">
            <h3><strong>Detalle Usuario</strong></h3>
        </div>
        <div class="col-sm-6" align="right">
            <a href="<?php echo site_url("Usuarios"); ?>" class="btn btn-info">Volver</a>
        </div>
    </div>
    
	<br>
	
		<table class="table table-bordered">
			<thead>
				<tr>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Nombre</th>
					<td>
						<?php echo @$nombre; ?>
					</td>
				</tr>
				<tr>
					<th>Nickname</th>
					<td>
						<?php echo @$nickname; ?>
					</td>
				</tr>
				<!-- <tr>
					<th>Password <span class="asterisco">*</span></th>
					<td>
						<input type="password"  name="password" id="password" class="form-control" required />
					</td>
				</tr> -->
			</tbody>
		</table> 
</div>  