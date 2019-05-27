<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" />
	<title>Video Tienda</title>
</head>
<body class="text-center">
	<form class="form-sigin" action="" method="POST">
		<table class="table">
			<tbody>
				<tr>
					<td>
						<h1 class="h3 mb-3 font-weight-normal">Ingreso</h1>
						<?php if($this->session->flashdata('ErrLogueo')) { ?>
							<div class='alert alert-info' role='alert'>
								<?php echo $this->session->flashdata('ErrLogueo'); ?>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="usuario" class="sr-only">Usuario</label>
						<input type="text" id="nickname" name="nickname" class="form-control" placeholder="Nickname" required autofocus />
					</td>
				</tr>
				<tr>
					<td>
						<label for="password" class="sr-only">Contrase&ntilde;a</label>
						<input type="password" id="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required />
					</td>
				</tr>
				<tr>
					<td>
						<button class="btn btn-lg btn-primary btn-block bg-info" type="submit">Sign in</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>