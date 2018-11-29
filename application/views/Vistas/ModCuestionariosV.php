<title>Admin Estudio</title>
  </head>
  
<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Modificar Encuestas</h1>
    </section>
<!-- Inicio Menu Navegacion -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="navbar-brand" href="">
            
			<img src="<?= base_url()?>img/menu.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Bootstrap">
            Menu
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="navbar-nav mr-auto ml-auto text-left">
                <a class="nav-item nav-link active" href="<?= base_url()?>index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/EstudiosC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="<?= base_url()?>index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->

<body>
<center>
<h1>Modificar Cuestionario</h1>

<div class="form">
	
<?=form_open("/ModCuestionariosC/recibirdatos", 'class="form-group"') ?>
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
<?= form_submit('','Modificar datos del cuestionario','class="btn btn-success"') ?>

<a class="btn btn-success"
href="http://localhost/ProyectoIng/index.php/MisCuestionariosC"
role="button">Ver Cuestionarios en este estudio</a>
<?php form_close() ?>

</center><br>
</div>
</body>
</html>