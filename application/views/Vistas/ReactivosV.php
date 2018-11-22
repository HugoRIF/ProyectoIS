<title>Reactivos</title>
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
role="button">Terminar Cuestionario</a>
</center>
<?php form_close() ?>

</div>
</body>
</html>