<title>Selecionar P</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">seleccionar Participantes</h1>
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
                <a class="nav-item nav-link active" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/AdminEstC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
<div class="container-fluid ">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 ">Seleecionar Participantes</h3>
     
<?= form_open('/EparticularC/AsigEncuestas')?>
	
	<table class="table table-striped" > 

		<thead >
		<tr>
			<th scope="col" style="width:20%">Nombre de Usuario</th>
			<th scope="col" style="width:5% ">Encuestas Asignadas</th>
			
		</tr>
	
		</thead>
	<tbody>

	<?php
	$participantes = $seleccionados;
	$i=0;
	foreach ($participantes as $array){
		
			
		?><tr>
			<td style="text-align:center">
			<?= $participantes[$i];?></td>
			<?= form_hidden("datosU".$i,$participantes[$i]);?>
			<td style="text-align:center">
			<?= form_input('NumAsig'.$i);$i++;?></td>
				
		</tr>
			

	<?php
	
			}
			
	 ?>
	</tbody>
	</table>
		<center>
	<?= form_hidden("totalD",$i-1);?>
	<?= form_hidden("idEst",$idEst);?>
	<?= form_hidden("idPart",$participantes);?>
	
	<?= form_submit("","Asignar",'class="btn btn-success"');?>
	<?= form_close();?>
	<br><br>
		</center>

</body>

</html>