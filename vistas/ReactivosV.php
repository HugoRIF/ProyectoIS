<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Añadir Reactivos</title>
    <h1>Añadir Reactivos</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body>
<div class="form">
	
<?=form_open("/ReactivosC/recibirdatos", 'class="form-group"') ?>
<?php
    $Pregunta = array(
        'name' =>'Pregunta',
        'placeholder' =>'Escriba su pregunta'
    );
    $RespuestaPree = array(
            'name' => 'RespuestaPree',
            'placeholder' => 'Respuesta preestablecida'
    );
    
    
?>
<?= form_label('Pregunta: ','Pregunta','class="col-sm-2 col-form-label"')?>
<?= form_input($Pregunta) ?>
<br><br><br>
<?= form_label('Respuesta preestablecida: ','RespuestaPree','class="col-sm-2 col-form-label"')?>
<?= form_textarea($RespuestaPree) ?>
<br><br><br>

<center>
<?= form_submit('','Añadir reactivo','class="btn btn-success"') ?>


<a class="btn btn-success"
href="http://localhost/ProyectoIng/index.php/MisCuestionariosC"
role="button">Ver Cuestionarios en este estudio</a>
</center>
<?php form_close() ?>

</div>
</body>
</html>