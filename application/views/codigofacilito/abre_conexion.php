<?php
$enlace =  mysqli_connect('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysqli_connect_error());
}
/*echo 'Conectado satisfactoriamente';*/
mysqli_select_db ( $enlace , 'codigofacilito' );

?>