<title>Admin Estudio</title>
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
                <a class="nav-item nav-link active" href="<?= base_url()?>index.php/AdminEstC/index">Inicio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/AdminEstC/index">Alta Estudio</a>
                <a class="nav-item nav-link " href="<?= base_url()?>index.php/AdminEstC/index">Eliminar Estudio</a>
                <a class="nav-item nav-link" href="<?= base_url()?>index.php/AdminEstC/Salir">Salir</a>
                
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
<?php if($CCuestionarios<1){?>
	<?= form_open('/EparticularC/Cuest','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
    <?php
    $Accion= array(
			'name' => 'Accion',
			'placeholder' => ''
    );?>
<?php $options = array(
        1         => 'Crear Encuesta',
        2         => 'Eliminar Encuesta',
        4           =>'Seleccionar Participantes',
        );?>
	<div class="form-group mx-3 my-3">
  	 <?= form_label('Tipo de Usuario:','Tipo','class="mx-3 d-sm-block text-white"') ?>
     <?= form_dropdown($Accion, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	</div>
    <?= form_hidden("idEst",$idEst);?>
	

	<?= form_submit("","Ir",'class="btn btn-primary"')?>
	
	<?= form_close()?>
    <?php }else{
        
    ?>
    <?= form_open('/EparticularC/Cuest','class="form-horizontal justify-content-center flex-column flex-md-row"') ?>
    <?php
    $Accion= array(
			'name' => 'Accion',
			'placeholder' => ''
    );?>
    <?php $options = array(
        1         => 'Crear Encuesta',
        2         => 'Eliminar Encuesta',
        
        4           =>'Seleccionar Participantes',
        );?>
	<div class="form-group mx-3 my-3">
  	 <?= form_label('Tipo de Usuario:','Tipo','class="mx-3 d-sm-block text-white"') ?>
     <?= form_dropdown($Accion, $options,'','class="btn btn-primary dropdown-toggle"') ?>
	</div>
    <?= form_hidden("idEst",$idEst);?>
	

	<?= form_submit("","Ir",'class="btn btn-primary"')?>
	
	<?= form_close()?>
	 <?= form_open('/AdminEstC/EstParticular')?>
	
	<table class="table table-striped" > 

		<thead >
		<tr>
			<th scope="col" style="width:10% ">Cuestionario</th>
			<th scope="col" style="width:5% ">selec</th>
            
		</tr>
	
		</thead>
	<tbody>

	<?php
	$Cuest=$this->AdminEstM->Mostrar_NomCuestionarios($idEst);
	$idCuest=$this->AdminEstM->Mostrar_idCuestionarios($idEst);
	
	$i=0;
	foreach ($idCuest as $array){
        
		$data = array(
			'name'          => 'radio',
			'id'            => 'radio'.$i,
			'value'         => $idCuest[$i],
			'checked'       => True,
			'style'         => 'margin:10px'
    );
   
		if($i!=0){ 
			
		?><tr>
			<td style="text-align:center">
			<?= $Cuest[$i];?></td>
            <td style="text-align:center">
			<?= form_radio($data);$i++?></td>
				
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
        <?php }?>
</div>
</body>
</html>