<title>Eliminar U</title>
  </head>
  

<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Eliminar Usuario</h1>
    </section>
<body>
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
                <a class="nav-item nav-link " href="<?= base_url()?>index.php/EUC/inicio">Inicio</a>
                <a class="nav-item nav-link " href="<?= base_url()?>index.php/RUNC/index">Registrar Usuario</a>
                <a class="nav-item nav-link active " href="<?= base_url()?>index.php/EUC/index">Eliminar Usuario</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/EUC/Salir">Salir</a>
                
            </div>
            
        </div>
    </nav>
<!-- Fin menu de navegacion -->
<div class="container-fluid ">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 ">Seleeciona Para Eliminar</h3>
     
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
	$idUsuario=$this->EUM->MostrarId();
	
	$i=0;
	foreach ($Usuario as $array){
		if($i!=0){ 
			
		?><tr>
			<td style="text-align:center">
			<?= $Usuario[$i];?></td>
			<td style="text-align:center">
			<?= $Tipo[$i];?></td>
			<td style="text-align:center">
			<?= form_checkbox('datosU'.$i,$idUsuario[$i]);$i++;?></td>
				
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
	<a class="btn btn-danger" 
	href="<?= base_url()?>index.php/EUC/inicio" 
	role="button">Cancelar</a>
	
		</center>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="http://192.168.64.2/CodeIgniter/js/bootstrap.js"></script>

</html> 