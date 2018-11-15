<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Alta Estudios</title>
    <h1>Alta Estudios</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body>
<div class="form">
	
<?=form_open("/EstudiosC/recibirdatos", 'class="form-group"') ?>
<?php
    $idEst = array(
        'name' =>'idEst',
        'placeholder' =>'idEstudio'
    );
    $nombreEst = array(
            'name' => 'nombreEst',
            'placeholder' => 'Nombre del estudio'
    );
    $DescEst = array(
        'name' =>'DescEst',
        'placeholder' =>'Descripcion del curso, solo 500 caracteres'
    );
    
?>
<?= form_label('idEstudio: ','idEst','class="col-sm-2 col-form-label"')?>
<?= form_input($idEst) ?>
<br><br><br>
<?= form_label('nombre del estudio: ','nombreEst','class="col-sm-2 col-form-label"')?>
<?= form_input($nombreEst) ?>
<br><br><br>
<?= form_label('Descripcion del estudio: ','DescEst','class="col-sm-2 col-form-label"')?>
<br>
<?= form_textarea($DescEst) ?>
<br><br><br>
<center>
<?= form_submit('','Dar de alta estudio','class="btn btn-success"') ?>
<a class="btn btn-success"
href="http://localhost/ProyectoIng/index.php/EstudiosInC"
role="button">Ver estudios</a>

</center>
<?php form_close() ?>

</div>
</body>
</html>