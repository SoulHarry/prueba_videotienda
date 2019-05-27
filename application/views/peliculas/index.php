<?php

?>
<div class="container-fluid">
	<form action="<?php echo site_url('Peliculas/buscar'); ?>" method="post">
		<div class="row">
			<div class="col-sm">
				<div class="row">
					<h3><strong>Busqueda Peliculas</strong></h3>
				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-6" align="right">
						<a href="<?php echo site_url('Peliculas/crear'); ?>" class="btn btn-info">Nueva Pelicula</a>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm">
				<div class="row">
					<div class="col-4">
						<label><strong>Titulo</strong></label>
					</div>
					<div class="col-6">
						<input type="text" name="titulo" id="titulo" class="form-control" <?php if(isset($_POST['titulo'])){ echo "value = '".$_POST['titulo']."'"; } ?> />
					</div>
				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<div class="col-4">
						<label><strong>Año</strong></label>
					</div>
					<div class="col-6">
						<input type="number" name="anio" id="anio" class="form-control" max="2019" min="1900" <?php if(isset($_POST['anio'])){ echo "value = '".$_POST['anio']."'"; } ?> />
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
    function fnBorrar(pelicula){
        if(confirm("Esta seguro que desea eliminar este registo? Esta acción no se podrá deshacer")){
            $(location).attr('href',siteUrl+'/peliculas/eliminar/'+pelicula);
        }
        
    }
</script>