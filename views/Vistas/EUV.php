<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eiminar Usuario</title>
	<meta charset="utf-8">
	<br>
	<h1 align="center" >Eliminar Usuario</h1>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<hr>
</head>
<body >
	
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
	<?= form_open('/EUC/inicio','class="form-inline"') ?>
	<?= form_submit("","Cancelar ",'class="btn btn-danger"')?>
	<?= form_close()?>
		</center>

</body>

</html> 