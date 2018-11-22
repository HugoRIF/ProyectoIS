<title>Admin Estudio</title>
  </head>
  
<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Estudio Particular</h1>
    </section>
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
                <a class="nav-item nav-link active" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
     </div>
<body>
<div class="container-fluid">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 "><?=  $NombreEst ?></h3>
            <p class="lead text-center mb-4 "><?=  $Descripcion ?></p>

</div>
<center>	
	<?= form_open('/EparticularC/Cuest','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
    <?
    $Accion= array(
			'name' => 'Accion',
			'placeholder' => ''
    );?>
<?php $options = array(
        1         => 'Crear Encuesta',
        2           => 'Eliminar Encuesta',
        3           => 'Eliminar Estudio',
        4           =>'Seleccionar Participantes',
        );?>
	<div class="form-group mx-3 my-3">
  	 <?= form_label('Tipo de Usuario:','Tipo','class="mx-3 d-sm-block text-white"') ?>
     <?= form_dropdown($Accion, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	</div>
    <?= form_hidden("idEst",$idEst);?>
	

	<?= form_submit("","Ir",'class="btn btn-primary"')?>
	
	<?= form_close()?>
	
<!--<?= $this->session->userdata('id');?>-->
</body>
</html>