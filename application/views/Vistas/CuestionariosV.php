<title>Registrar c</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Alta Cuestionario</h1>
    </section>
<body><!-- Inicio Menu Navegacion -->
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
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/AdminEstC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="<?= base_url()?>index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->

<body>
<center>
<div class="form">
	<h1>Cuestionario para el estudio <?= $idEst?></h1>
<?=form_open("/CuestionarioC/recibirdatos", 'class="form-group"') ?>
<?php
    $nomCuestionario = array(
            'name' => 'nomCuestionario',
            'placeholder' => 'Nobre de Cuestionario'
    );
    
?>
<?= form_hidden('idEst',$idEst) ?>
<?= form_label('Nombre del Cuestionario','','class="col-sm-4 col-form-label"')?>
<br>
<?= form_input($nomCuestionario) ?>
<br><br><br>
<center>
<?= form_submit('','Dar de alta cuestionario','class="btn btn-success"') ?>
<?php form_close() ?>

                            
 </div>
</center>

</center>
</div>
</body>
</html>
