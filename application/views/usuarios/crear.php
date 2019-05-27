<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controllers/usuarios.js" ></script>
<div class="container m-5">
    <div class='alert alert-info' role='alert' id="alerta">

	</div>
	<div class="row">
        <div class="col-sm-6">
            <h3><strong>Nuevo Usuario</strong></h3>
        </div>
        <div class="col-sm-6" align="right">
            <a href="<?php echo site_url("Usuarios"); ?>" class="btn btn-info">Volver</a>
        </div>
    </div>
    
	<br>
	<form method="post" action="<?php echo site_url('Usuarios/guardar'); ?>">
		<table class="table table-bordered">
			<thead>
				<tr>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Nombre <span class="asterisco">*</span></th>
					<td>
						<input type="text"  id="nombre" name="nombre" min="5" class="form-control"  title="El nombre debe ser minimo de 5 caracteres" required />
					</td>
				</tr>
				<tr>
					<th>Nickname <span class="asterisco">*</span></th>
					<td>
						<input type="text" name="nickname" id="nickname" class="form-control" pattern="^.[a-zA-Z0-9_]{3,20}$" title="El nickname solo puede tener letras, numeros y _" required />
					</td>
				</tr>
				<tr>
					<th>Password <span class="asterisco">*</span></th>
					<td>    
						<input type="password"  name="password" id="password" class="form-control" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_~\-+|}{:;?/>.<,])(?!.*\s)(?!.*\s).{8,55}$" title="La contraseña debe terner al menos una letra mayuscula, al menos una letra minuscula, al menos un numero y al menos un caracter especial" required />
					</td>
				</tr>
			</tbody>
		</table> 
		<div class="row">
			<div class="col-sm">
				<div class="row"></div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-8" align="right">
						<input type="button" id="btnGuardarUsuario" class="btn btn-info" value="Guardar" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>  