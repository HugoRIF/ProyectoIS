<title>Encuestador</title>
  </head>
  
<section class="container-fluid slider d-flex justify-content-center align-items-center">
      <h1 class="display-3 text-white">Bienvenido Encuestador</h1>
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
<body>
     </div>
	 <div class="container-fluid ">
        <section class="container py-3 mt-3 mb-3">
            <h3 class="text-uppercase text-center mb-4 ">Mis Estudios</h3>
            
	 <?= form_open('/EncuestadorC/EParticular')?>
	
	<table class="table table-striped" > 

		<thead >
		<tr>
			<th scope="col" style="width:5%">id</th>
			<th scope="col" style="width:20% ">Estudio</th>
			<th scope="col" style="width:5% ">Accion</th>
		</tr>
	
		</thead>
	<tbody>

	<?php
	$idEstudio=$this->EncuestadorM->Mostrar_idEst($this->session->userdata('id'));
	
	$Estudio=$this->EncuestadorM->Mostrar_Est($this->session->userdata('id'));
	
	$i=0;
	foreach ($Estudio as $array){
		$data = array(
			'name'          => 'radio',
			'id'            => 'radio'.$i,
			'value'         => $idEstudio[$i],
			'checked'       => True,
			'style'         => 'margin:10px'
	);
		if($i!=0){ 
			
		?><tr>
			<td style="text-align:center">
			<?= $idEstudio[$i];?></td>
			<td style="text-align:center">
			<?= $Estudio[$i];?></td>
			<td style="text-align:center">
			<?= form_radio($data);$i++;?></td>
				
		</tr>
			

	<?php
		}else $i++;
			}
			
	 ?>
	</tbody>
	</table>
	<?= form_hidden("totalD",$i-1);?>
	<?= form_submit("","VER",'class="btn btn-primary"');?>
	
	<?= form_close();?>
	<br><br>
	
		


	 </div>

</body>
</html>