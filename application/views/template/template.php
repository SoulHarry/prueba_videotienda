<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	
	
	<script>
		var baseUrl = "<?php echo base_url(); ?>";
		var siteUrl = "<?php echo site_url(); ?>";
	</script>
    <title>Video Tienda</title>
</head>
<body>
<?php echo $menu; ?>


<div class="container-fluid mt-5">
 <?php echo $contenido; ?>
</div>
</body>
</html>
