<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cuestionario</title>
</head>  

<body>  
    <h1 align='center'>Cuestionario</h1>  



<?php
   $nombre='';
   $id = 0;
   if (! defined('BASEPATH')) exit('No direct script access allowed');  
   
   if (isset($_POST["GuardarNombre"])){
    $nombre=$_POST['cuestionario'];
    include('codigofacilito/abre_conexion.php');  


    $query = "SELECT max(id_cuestionario) maxi FROM cuest_encabezado where nombre='".$nombre."'";     // Esta linea hace la consulta 
    $result = mysqli_query($enlace, $query);  
    while ($registro = mysqli_fetch_array($result)){ 
      if (! is_null( $registro['maxi'])) {$id = $registro['maxi'];} else  { $id = 0;}
    }
    mysqli_free_result($result);

    if ($id== 0){
      $query = "SELECT max(id_cuestionario) maxi FROM cuest_encabezado";     // Esta linea hace la consulta 
      $result = mysqli_query($enlace, $query);  

      while ($registro = mysqli_fetch_array($result)){ 
        if (! is_null( $registro['maxi'])) {$id = $registro['maxi']+1;} else  { $id = 1;}
        $sql="insert into cuest_encabezado(id_cuestionario, nombre)values(";
        $sql=$sql.$id.",";
        $sql=$sql."'".$nombre."')" ;
        mysqli_query($enlace, $sql);
        echo "  <h2>Se crea el cuestionario ".$_POST['cuestionario']."</h2> ";
       }
      mysqli_free_result($result);
    }
    include('codigofacilito/cierra_conexion.php');
  }
?>

<?php
   $num = 0;
   if (! defined('BASEPATH')) exit('No direct script access allowed');  
   
   if (isset($_POST["Guardar"])){
    $id = $_POST["id_c"];
    include('codigofacilito/abre_conexion.php');  


    $query = "SELECT max(num) maxi FROM cuestionario where id_cuestionario=".$id;     // Esta linea hace la consulta 

    $result = mysqli_query($enlace, $query);  

    while ($registro = mysqli_fetch_array($result)){ 
      if (! is_null( $registro['maxi'])) {$num = $registro['maxi']+1;} else  { $num = 1;}
     $sql="insert into cuestionario(id_cuestionario, num, pregunta)values(";
      $sql=$sql.$id.",";
      $sql=$sql.$num.",";
      $sql=$sql."'".$_POST['pregunta']."')" ;
      mysqli_query($enlace, $sql);

     $sql="insert into cuest_opciones(id_cuestionario, num, inciso, opcion)values(";
      $sql=$sql.$id.",";
      $sql=$sql.$num.",";
      $sql=$sql."'a'," ;
      $sql=$sql."'".$_POST['inciso_a']."')" ;
      mysqli_query($enlace, $sql);

     $sql="insert into cuest_opciones(id_cuestionario, num, inciso, opcion)values(";
      $sql=$sql.$id.",";
      $sql=$sql.$num.",";
      $sql=$sql."'b'," ;
      $sql=$sql."'".$_POST['inciso_b']."')" ;
      mysqli_query($enlace, $sql);

     $sql="insert into cuest_opciones(id_cuestionario, num, inciso, opcion)values(";
      $sql=$sql.$id.",";
      $sql=$sql.$num.",";
      $sql=$sql."'c'," ;
      $sql=$sql."'".$_POST['inciso_c']."')" ;
      mysqli_query($enlace, $sql);
    }
    mysqli_free_result($result);
    include('codigofacilito/cierra_conexion.php');
    echo "  
    <h1>OK</h1>  
    ";
   }
?>

<form method="POST">  
<div align='left'>  
</div>  
<div>
<h3></h3>     
<h3>Nombre Cuestionario:</h3>     <input type="text"  name="cuestionario" required="required">
<input type="submit" value="Guardar" name="GuardarNombre">

</div>  
</form>  

<form method="POST">  
<div align='left'>  

</div>  
<div>
<?php
echo "<h1><font color='red'>".$nombre.":</font></h1><input type='readonly' name='id_c' value=$id size=1></input>";
?>
<h3>Pregunta:</h3>     <input type="text"  name="pregunta" required="required" maxlength=250 size=50>
<h3>a) <input type="text"  name="inciso_a" required="required"maxlength=250 size=20>
<h3>b) <input type="text"  name="inciso_b" required="required"maxlength=250 size=20>
<h3>c)   <input type="text"  name="inciso_c" required="required"maxlength=250 size=20>
<input type="submit" value="Guardar" name="Guardar">

<!--<h3>Pregunta 2:</h3>     <input type="text"  name="pregunta" required="required">
<input type="submit" value="Guardar" name="Guardar">

<h3>Pregunta 3:</h3>     <input type="text"  name="pregunta" required="required">
<input type="submit" value="Guardar" name="Guardar">

<h3>Pregunta 4:</h3>     <input type="text"  name="pregunta" required="required">
<input type="submit" value="Guardar" name="Guardar">

<h3>Pregunta 5:</h3>     <input type="text"  name="pregunta" required="required">
<input type="submit" value="Guardar" name="Guardar">-->

</div>  
</form>  

</body>  

</html>