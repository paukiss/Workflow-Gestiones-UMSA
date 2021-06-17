<?php
    
    $estado = 0;
    if (isset($_POST["ok"]))
    {   
        // $msg = "";
        $user = $_SESSION["IdUser"];
        
        $nombre = $_POST['nombre'];
        $fechaIni = $_POST['fechaIni'];
        $fechaFin = $_POST['fechaFin'];
        
        $sql = "INSERT INTO `solicitudvacacion`(`idRol`, `nroTramite`, `nombre`, `fechaIni`, `fechaFin`) ";
        $sql.= " VALUES ('$user','$tramite','$nombre','$fechaIni','$fechaFin')";
        mysqli_query($conn, $sql);
        $estado = 1;
    }              
?>

<div class="container" style="padding: 5%; margin: 0% 0% -10% 5%;" <?php if ($estado == 1) echo "hidden" ?>>
    <h4 style="text-align:center; text-transform: uppercase;">Solicitud vacacion<br></h4>
    <form method="POST" action="" enctype="multipart/form-data" class="row g-3 needs-validation">
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name = "nombre" value="Juan Perez Perez" required> 
        </div>
        
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Fecha Inicio:</label>
            <input type="date" class="form-control" name = "fechaIni" required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Fecha Fin:</label>
            <input type="date" class="form-control" name = "fechaFin" required>
        </div>
        
        <input type="text" name="ok" value="ok" hidden>
        
        <div class="col-md-12">
            <input type="submit" value="Solicitar vacacion" name="upload" style="padding: 10px 50px; background-color: green;">
        </div>
    </form>
</div>