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
            <h3 class="lead text-center mb-4 "><?=  $NombrePregunta ?></h3>
           

</div>
<center>	
<?= form_open('/EncuestadorC/Cuest','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
    <?php 
       $aumento= $NPregunta+1;
            $P1= $Respuestas[0];
            $P2= $Respuestas[1];
            $P3= $Respuestas[2];
    ?>
    <?= form_hidden("idEst",$idEst);?>
    <?= form_hidden("NPregunta",$aumento);?>
	<?php
    $resp1 = array(
        'name'          => 'respuestaCampo',
        'id'          => 'respuestaCampo',
        'value'         => $P1,
        'checked'       => FALSE,
        'style'         => 'margin:10px'
        );
        $resp2 = array(
            'name'          => 'respuestaCampo',
            'id'          => 'respuestaCampo',
            'value'         => $P2,
            'checked'       => FALSE,
            'style'         => 'margin:10px'
    );
    $resp3 = array(
        'name'          => 'respuestaCampo',
        'id'          => 'respuestaCampo',
        'value'         => $P3,
        'checked'       => FALSE,
        'style'         => 'margin:10px'
);
        ?>
    <div class="form-group mx-3 my-3">
    <?= form_label($P1,'','class="mx-3 d-none d-block "') ?>
	<?= form_radio($resp1) ?>
	</div>
    <div class="form-group mx-3 my-3">
    <?= form_label($P2,'','class="mx-3 d-none d-block "') ?>
	<?= form_radio($resp2) ?>
	</div>
    <div class="form-group mx-3 my-3">
    <?= form_label($P3,'','class="mx-3 d-none d-block "') ?>
	<?= form_radio($resp3) ?>
	</div>
	<?= form_submit("","Siguiente",'class="btn btn-success"')?>
	
	<?= form_close()?>
	
	
<!--<?= $this->session->userdata('id');?>-->
</body>
</html>