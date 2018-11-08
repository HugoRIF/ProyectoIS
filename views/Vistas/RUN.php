<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro de Usuario</title>
	<meta charset="utf-8">
	<br>
	<h1 align="center" >Registrar Usuario Nuevo</h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body>
	
		<br>
<div class="form">	
	<?= form_open('/RUNC/RegistrarU','class="form"') ?>
	
	<?
		$nombre = array(
			'name' => 'nombre',
			'placeholder' => 'Escribe el nombre'
		);
		$contra= array(
			'name' => 'contra',
			'placeholder' => 'Contraseña'
		);
		$correo= array(
			'name' => 'correo',
			'placeholder' => 'Correo Electronico'
		);
		$Tipo= array(
			'name' => 'Tipo',
			'placeholder' => ''
		);
	?>
	
	
	<?= form_label(' Usuario:    ','nombre','class="col-sm-2 col-form-label"') ?>
	
	<?= form_input($nombre,'','','class="form-group"') ?>
	<br><br>
	<?= form_label(' Contraseña:','contra','class="col-sm-2 col-form-label"') ?>
	 <?= form_password($contra) ?>
	 <br><br>
	 <?= form_label('E-mail:   ','correo','class="col-sm-2 col-form-label"') ?>
	 <?= form_input($correo) ?>
	 <br><br>
	<?php $options = array(
        'AS'         => 'Administrador de Sistema',
        'AE'           => 'Administrador de Estudios',
        'E'           => 'Encuestador',
        'A'           => 'Analista',
        );?>

	 <?= form_label('Tipo de Usuario:','Tipo','class="col-sm-2 col-form-label"') ?>
     <?= form_dropdown($Tipo, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	 <center>
	<br><br>
	<?= form_submit("","Registrar",'class="btn btn-success"')?>
	
	<?= form_close()?>
	<br><br>
	<?= form_open('/RUNC/inicio','class="form-inline"') ?>
	<?= form_submit("","Cancelar",'class="btn btn-danger"')?>
	<?= form_close()?>
	</center>
	
	</div>
</body>
</html>