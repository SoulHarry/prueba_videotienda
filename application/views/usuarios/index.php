<?php

?>
<div class="container-fluid">
	<form action="<?php echo site_url('Usuarios/buscar'); ?>" method="post">
		<div class="row">
			<div class="col-sm">
				<div class="row">
					<h3><strong>Busqueda Usuarios</strong></h3>
				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-6" align="right">
						<a href="<?php echo site_url('Usuarios/crear'); ?>" class="btn btn-info">Nuevo Usuario</a>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm">
				<div class="row">
					<div class="col-4">
						<label><strong>Nombre</strong></label>
					</div>
					<div class="col-6">
						<input type="text" name="nombre" id="nombre" class="form-control" <?php if(isset($_POST['nombre'])){ echo "value = '".$_POST['nombre']."'"; } ?> />
					</div>
				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4">
						<label><strong>Nickname</strong></label>
					</div>
					<div class="col-6">
						<input type="text" name="nickname" id="nickname" class="form-control" <?php if(isset($_POST['nickname'])){ echo "value = '".$_POST['nickname']."'"; } ?> />
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm"></div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-6" align="right">
						<button type="submit" class="btn btn-info">Buscar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="container-fluid mt-3">
	<?php echo @$resultado; ?>
</div>
<script type="text/javascript">
    function fnBorrar(usuario){
        if(confirm("Esta seguro que desea eliminar este registo? Esta acción no se podrá deshacer")){
            $(location).attr('href',siteUrl+'/usuarios/eliminar/'+usuario);
        }
        
    }
</script>