<title>Alta Estudio</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Alta Estudio</h1>
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
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link active" href="http://192.168.64.2/ProyectoIS/index.php/EstudiosC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
     </div>
	 <div class="container-fluid bg-info">
       <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 text-white ">ALTA</h3>
<body>
<div class="form">
<center>	
<?=form_open("/EstudiosC/recibirdatos", 'class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
<?php
$this->session->userdata('id');
    $idEst = array(
        'name' =>'idEst',
        'placeholder' =>'idEstudio'
    );
    $nombreEst = array(
            'name' => 'nombreEst',
            'placeholder' => 'Nombre del estudio'
    );
    $DescEst = array(
        'name' =>'DescEst',
        'placeholder' =>'Descripcion del curso, solo 500 caracteres'
    );
    
?>
<div class="form-group mx-3 my-3">
<?= form_label('nombre del estudio: ','nombreEst','class="mx-3 d-none d-sm-block text-white"')?>
<?= form_input($nombreEst,'','','class="form-control"') ?>
</div>
<div class="form-group mx-3 my-3">

<?= form_label('Descripcion del estudio: ','DescEst','class="mx-3 d-none d-sm-block text-white"')?>

<?= form_textarea($DescEst) ?>
</div>

<?= form_submit('','Dar de alta estudio','class="btn btn-success"') ?>
<a class="btn btn-primary"
href="http://192.168.64.2/ProyectoIS/index.php/EstudiosC/EstudiosIn"
role="button">Ver estudios</a>

</center>
<?php form_close() ?>

</div>
</body>
</html>