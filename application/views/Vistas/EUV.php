<title>Eliminar U</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Eliminar Usuario</h1>
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
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/RUNC/inicio">Inicio</a>
                <a class="nav-item nav-link " href="http://192.168.64.2/ProyectoIS/index.php/RUNC/index">Registrar Usuario</a>
                <a class="nav-item nav-link active " href="http://192.168.64.2/ProyectoIS/index.php/EUC/index">Eliminar Usuario</a>
                <a class="nav-item nav-link" href="http://192.168.64.2/ProyectoIS/index.php/LoginC/index">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
	
<?= form_open('/EUC/EliminarU')?>
	
	<table class="table table-striped" > 

		<thead >
		<tr>
			<th scope="col" style="width:20%">Nombre de Usuario</th>
			<th scope="col" style="width:5% ">Tipo</th>
			<th scope="col" >Eliminar</th>
		</tr>
	
		</thead>
	<tbody>

	<?php
	$Usuario=$this->EUM->MostrarU();
	$Tipo=$this->EUM->MostrarTipo();

	
	$i=0;
	foreach ($Usuario as $array){
		if($i!=0){ 
			
		?><tr>
			<td style="text-align:center">
			<?= $Usuario[$i];?></td>
			<td style="text-align:center">
			<?= $Tipo[$i];?></td>
			<td style="text-align:left">
			<?= form_checkbox('datosU'.$i,$Usuario[$i]);$i++;?></td>
				
		</tr>
			

	<?php
		}else $i++;
			}
			
	 ?>
	</tbody>
	</table>
		<center>
	<?= form_hidden("totalD",$i-1);?>
	<?= form_submit("","Eliminar",'class="btn btn-primary"');?>
	<?= form_close();?>
	<br><br>
	<a class="btn btn-danger" href="http://192.168.64.2/ProyectoIS/index.php/RUNC/inicio" role="button">Cancelar</a>
	
		</center>

</body>

</html> 