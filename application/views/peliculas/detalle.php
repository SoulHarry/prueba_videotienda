<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controllers/peliculas.js" ></script>
<div class="container m-5">
	<div class="row">
        <div class="col-sm-6">
            <h3><strong>Detalle Pelicula</strong></h3>
        </div>
        <div class="col-sm-6" align="right">
            <a href="<?php echo site_url("Peliculas"); ?>" class="btn btn-info">Regresar</a>
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
					<th>Titulo <span class="asterisco">*</span></th>
					<td>
						<span><?php echo @$titulo ?></span>
					</td>
				</tr>
				<tr>
					<th>Año <span class="asterisco">*</span></th>
					<td>
						<span><?php echo @$anio ?></span>
					</td>
				</tr>
				<tr>
					<th>Sinopsis <span class="asterisco">*</span></th>
					<td>
						<span><?php echo @$sinopsis ?></span>
					</td>
				</tr>
			</tbody>
		</table>
</div>  