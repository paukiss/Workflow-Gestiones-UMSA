
<?php

$sql = "select * from formularioestudianteregular where nroTramite='$tramite'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);

// print_r($fila);
$nombre = $fila['nombre'];
$paterno = $fila['aPaterno'];
$materno = $fila['aMaterno'];
$ci = $fila['ci'];
$matricula = $fila['matricula'];
$carrera = $fila['carrera'];
$facultad = $fila['facultad'];
$ciudad = $fila['ciudad'];
$firma = $fila['firmaDecano'];
?>