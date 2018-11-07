<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eiminar Usuario</title>
	<meta charset="utf-8">
	<br>
	<h1 align="center" >Eliminar Usuario</h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body>
	
		<br>
		<br>
		
	<?= form_open('/RUNC/RegistrarU') ?>
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
	<pre>
	<left>
	<?= form_label(' Usuario:    ','nombre') ?>
	<?= form_input($nombre) ?>
	
	<?= form_label(' Contraseña:','contra') ?>
	 <?= form_password($contra) ?>
	 
	 <?= form_label('E-mail:   ','correo') ?>
     <?= form_input($correo) ?>
	<?php $options = array(
        'AS'         => 'Administrador de Sistema',
        'AE'           => 'Administrador de Estudios',
        'E'           => 'Encuestador',
        'A'           => 'Analista',
        );?>

	 <?= form_label('Tipo de Usuario:','Tipo') ?>
     <?= form_dropdown($Tipo, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	
	</left>
	<center>
	<?= form_submit("","Registrar",'class="btn btn-success"')?>
	
	<?= form_close()?>
	<?= form_open('/RUNC/inicio','class="form-inline"') ?>
	<?= form_submit("","Cancelar",'class="btn btn-danger"')?>
	<?= form_close()?>
	</center>
	</pre>
	
</body>
</html> 