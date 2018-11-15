<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Alta Cuestionarios</title>
    <h1>Alta Cuestionarios</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body>
<div class="form">
	
<?=form_open("/CuestionariosC/recibirdatos", 'class="form-group"') ?>
<?php
    $idCuestionario = array(
        'name' =>'idCuestionario',
        'placeholder' =>'idCuestionario'
    );
    $numCuestionario = array(
            'name' => 'numCuestionario',
            'placeholder' => 'Numero de Cuestionario'
    );
    $idEst = array(
        'name' =>'idEst',
        'placeholder' =>'Id del estudio al que pertenece el Cuestionario'
    );
    
?>
<?= form_label('id del Cuestionario: ','idCuestionario','class="col-sm-2 col-form-label"')?>
<?= form_input($idCuestionario) ?>
<br><br><br>
<?= form_label('numero de cuestionario: ','numCuestionario','class="col-sm-2 col-form-label"')?>
<?= form_input($numCuestionario) ?>
<br><br><br>
<?= form_label('Id del estudio al que pertenece el Cuestionario: ','idEst','class="col-sm-2 col-form-label"')?>
<br>
<?= form_textarea($idEst) ?>
<br><br><br>
<center>
<?= form_submit('','Dar de alta cuestionario','class="btn btn-success"') ?>

<a class="btn btn-success"
href="http://localhost/ProyectoIng/index.php/MisCuestionariosC"
role="button">Ver Cuestionarios en este estudio</a>
</center>
<?php form_close() ?>

</div>
</body>
</html>