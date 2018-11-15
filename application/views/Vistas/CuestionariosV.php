<title>Registrar U</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Alta Cuestionario</h1>
    </section>
<body><!-- Inicio Menu Navegacion -->
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
                <a class="nav-item nav-link active" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->

<body>
<div class="form">
	
<?=form_open("/CuestionariosC/recibirdatos", 'class="form-group"') ?>
<?php
    $numCuestionario = array(
            'name' => 'numCuestionario',
            'placeholder' => 'Numero de Cuestionario'
    );
    $idEst = array(
        'name' =>'idEst',
        'placeholder' =>'Id del estudio al que pertenece el Cuestionario'
    );
    
?>
<?= form_hidden('idEst',$idEst) ?>
<?= form_label('Nombre del Cuestionario','idEst','class="col-sm-2 col-form-label"')?>
<br>
<?= form_textarea($idEst) ?>
<br><br><br>
<center>
<?= form_submit('','Dar de alta cuestionario','class="btn btn-success"') ?>

<a class="btn btn-success"
href="http://localhost/ProyectoIng/index.php/EstudiosC"
role="button">Ver Cuestionarios en este estudio</a>
</center>
<?php form_close() ?>

</div>
</body>
</html>
