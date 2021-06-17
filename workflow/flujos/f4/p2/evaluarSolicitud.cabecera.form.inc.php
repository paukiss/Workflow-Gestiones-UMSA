<?php
    $sql = "select * from solicitudvacacion where nroTramite='$tramite'";
    $res = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_array($res);
    // echo $sql;
    // print_r($fila);
    $nombre = $fila['nombre'];
    $fechaIni = $fila['fechaIni'];
    $fechaFin = $fila['fechaFin'];
?>