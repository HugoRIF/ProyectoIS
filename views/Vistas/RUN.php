<title>Registrar U</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Alta Usuario</h1>
    </section>
<body>
<!-- Inicio Menu Navegacion -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="navbar-brand" href="">
            <img src="http://192.168.64.2/ProyectoIS/img/menu.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Bootstrap">
            Menu
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="navbar-nav mr-auto ml-auto text-left">
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/RUNC/inicio">Inicio</a>
                <a class="nav-item nav-link active" href="http://192.168.64.2/ProyectoIS/index.php/RUNC/index">Registrar Usuario</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/EUC/index">Eliminar Usuario</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/LoginC/index">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
<div class="container-fluid bg-success">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 text-white">Alta de Usuario</h3>
            <p class="lead text-center mb-4 text-white">Ingresa Todos los Valores</p>
	<center>	
	<?= form_open('/RUNC/RegistrarU','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
	
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
	
	<div class="form-group mx-3 my-3">
    <?= form_label(' Usuario:    ','nombre','class="mx-3 d-none d-sm-block text-white"') ?>
	<?= form_input($nombre,'','','class="form-control"') ?>
	</div>
	<div class="form-group mx-3 my-3">
    <?= form_label(' Contraseña:','contra','class="mx-3 d-none d-sm-block text-white"') ?>
	 <?= form_password($contra) ?>
	 </div>
	 <div class="form-group mx-3 my-3">
  	 <?= form_label('E-mail:   ','correo','class="mx-3 d-none d-sm-block text-white"') ?>
	 <?= form_input($correo) ?>
	 </div>
	<?php $options = array(
        1         => 'Administrador de Sistema',
        2           => 'Administrador de Estudios',
        3           => 'Encuestador',
        4           => 'Analista',
        );?>
	<div class="form-group mx-3 my-3">
  	 <?= form_label('Tipo de Usuario:','Tipo','class="mx-3 d-sm-block text-white"') ?>
     <?= form_dropdown($Tipo, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	</div>
	<?= form_submit("","Registrar",'class="btn btn-primary"')?>
	
	<?= form_close()?>
	<br>	
	<a class="btn btn-danger" href="http://192.168.64.2/ProyectoIS/index.php/RUNC/inicio" role="button">Cancelar</a>
	</center>
	
	</div>

</body>
</html>