<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controllers/peliculas.js" ></script>
<div class="container m-5">
    <div class='alert alert-info' role='alert' id="alerta">

    </div>
	<div class="row">
        <div class="col-sm-6">
            <h3><strong>Editar Pelicula</strong></h3>
        </div>
        <div class="col-sm-6" align="right">
            <a href="<?php echo site_url("Peliculas"); ?>" class="btn btn-info">Volver</a>
        </div>
    </div>
    
	<br>
	<form method="post" action="<?php echo site_url('Peliculas/guardar'); ?>">
    <input type="hidden" id="id" value="<?php echo @$id ?>" />
		<table class="table table-bordered">
			<thead>
				<tr>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Titulo <span class="asterisco">*</span></th>
					<td>
						<input type="text"  id="titulo" name="titulo" value="<?php echo @$titulo ?>" class="form-control" required />
					</td>
				</tr>
				<tr>
					<th>Año <span class="asterisco">*</span></th>
					<td>
						<input type="number" name="anio" id="anio" value="<?php echo @$anio ?>" class="form-control" required />
					</td>
				</tr>
				<tr>
					<th>Sinopsis <span class="asterisco">*</span></th>
					<td>
						<textarea type="text"  name="sinopsis" id="sinopsis" class="form-control" required >
<?php echo @$sinopsis ?>
                        </textarea>
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
						<input type="button" id="btnEditarPelicula" class="btn btn-info" value="Guardar" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>  