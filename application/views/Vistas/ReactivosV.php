<title>Reactivos</title>
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
<div class="container-fluid">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 "> Creacion de reactivo</h3>
            <p class="lead text-center mb-4 "></p>

</div>
<body>
<div class="form">
	
<?=form_open("/CuestionarioC/AgregaReactivo", 'class="form-group"') ?>
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
<?= form_label('Como sera la Respuesta preestablecida: ','RespuestaPree','class="col-sm-4 col-form-label"')?>
<table class="table table-striped" > 

		<thead >
		<tr>
			<th scope="col" style="width:10% ">Opcion Mutiple</th>
			<th scope="col" style="width:10% ">Binaria (S/N)</th>
            <th scope="col" style="width:10% ">Abierta</th>
            
		</tr>
	
		</thead>
	<tbody>
    <tr>
			
            <td style="text-align:center">
			<?= form_radio('TipoP', 'MULTIPLE', FALSE);?></td>
			<td style="text-align:center">
			<?= form_radio('TipoP', 'BINARIA', FALSE);?></td>
			<td style="text-align:center">
			<?= form_radio('TipoP', 'ABIERTA', FALSE);?></td>
				
		</tr>
        <tr>
        <td>
        <?php
        $opcion1 = array(
        'name' =>'opcion1',
        'placeholder' =>'Opcion 1'
        );
        ?>
        <?= form_input($opcion1)?>
        </td>
        </tr>
        <tr>
        <td>
        <?php
        $opcion2 = array(
        'name' =>'opcion2',
        'placeholder' =>'Opcion 2'
        );
        ?>
        <?= form_input($opcion2)?>
        </td>
        </tr>
        <tr>
        <td>
        <?php
        $opcion3 = array(
        'name' =>'opcion3',
        'placeholder' =>'Opcion 3'
        );
        ?>
        <?= form_input($opcion3)?>
        </td>
        </tr>
        </tbody>
	</table>
<center>
<?= form_hidden("nomCuestionario",$nomCuestionario);?>
<?= form_hidden("idEst",$idEst);?>
<?= form_hidden("idCuestionario",$idCuestionario);?>
	
<?= form_submit('','Añadir reactivo','class="btn btn-success"') ?>


<a class="btn btn-success"
href="<?= base_url()?>index.php/EstudiosC/EstudiosIn"
role="button">Terminar Cuestionario</a>
</center>
<?php form_close() ?>

</div>
</body>
</html>