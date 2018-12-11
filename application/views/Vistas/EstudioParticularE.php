<title>Encuestador</title>
  </head>
  
<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Estudio Particular</h1>
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
                <a class="nav-item nav-link active" href="<?= base_url()?>index.php/EncuestadorC/inicio">Inicio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/EncuestadorC/index">Mis Estudios</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/EncuestadorC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
     </div>
<body>
<div class="container-fluid">
        <section class="container py-3 mt-3 mb-3">
            <h2 class="text-uppercase text-center mb-4 "><?=  $NombreEst ?></h2>
            <h3 class="lead text-center mb-4 "><?=  $Descripcion ?></h3>
            <p class="lead text-center mb-4 ">
            Encuestas Asignadas: <?= $EAsignadas?>
            <br>
          

</div>
<center>	
<?php 
    $idCuest=$this->EncuestadorM->dame_idCuest($this->session->userdata('id'),$idEst);
?>
	<?= form_open('/EncuestadorC/Cuest','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
    
    <?= form_hidden("idEst",$idEst);?>
    <?= form_hidden("NPregunta",0);?>
	<?= form_hidden("idCuest",$idCuest);?>

	<?= form_submit("","Nueva Encuesta",'class="btn btn-success"')?>
	
	<?= form_close()?>
	
<!--<?= $this->session->userdata('id');?>-->
</body>
</html>