<?php
    
    $estado = 0;
    if (isset($_POST["ok"]))
    {   
        // $msg = "";
        $user = $_SESSION["IdUser"];
        // $path = "documentos/".$user;
        // if (!file_exists($path))
        //     mkdir($path);
        // $filename = $_FILES["firma"]["name"];
        // $tempname = $_FILES["firma"]["tmp_name"];
        // $folderFirma = $path."/".$filename;        
        
        // move_uploaded_file($tempname, $folderFirma);
        
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $ci = $_POST['ci'];
        $matricula = $_POST['matricula'];
        $carrera = $_POST['carrera'];
        $facultad = $_POST['facultad'];
        $ciudad = $_POST['ciudad'];
        // $firma = $_POST['firma'];
      
        $sql = "INSERT INTO `formularioestudianteregular`(`idAlumno`, `nroTramite`, `nombre`, `aPaterno`, `aMaterno`, `ci`, `matricula`, `carrera`, `facultad`, `ciudad`)";
        $sql.= " VALUES ('$user','$tramite','$nombre','$paterno','$materno','$ci','$matricula','$carrera','$facultad','$ciudad')";
        mysqli_query($conn, $sql);
        $estado = 1;
    }              
?>

<div class="container" style="padding: 5%; margin: 0% 0% -10% 5%;" <?php if ($estado == 1) echo "hidden" ?>>
    <h4 style="text-align:center; text-transform: uppercase;">Formulario de Estudiante Regular<br></h4>
    <form method="POST" action="" enctype="multipart/form-data" class="row g-3 needs-validation">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre(s):</label>
            <input type="text" class="form-control" name = "nombre" value="Juan" required> 
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellido Paterno:</label>
            <input type="text" class="form-control" name = "paterno" value="Perez" required>
        </div>
        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Apellido Materno:</label>
            <input type="text" class="form-control" name = "materno" value="Perez" required>
        </div>
        <div class="col-md-6">
            <label for="validationCustom05" class="form-label">Carnet de Identidad:</label>
            <input type="text" class="form-control" name = "ci" required>
        </div>

        <div class="col-md-5">
            <label for="validationCustom06" class="form-label">Matricula:</label>
            <input type="text" class="form-control" name = "matricula" required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Carrera:</label>
            <input type="text" class="form-control" name = "carrera" required>
        </div>
        <div class="col-md-5">
            <label for="validationCustom07" class="form-label">Facultad:</label>
            <input type="text" class="form-control" name = "facultad" required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Ciudad:</label>
            <input type="text" class="form-control" name = "ciudad" required>
        </div>
        
        <div class="mb-3" hidden>
            <label for="formFile" class="form-label">Firma Digital Decano:</label>
            <input class="form-control" type="file" name="firma" >
        </div>
        <input type="text" name="ok" value="ok" hidden>
        <input type="submit" value="Subir y enviar formulario" name="upload" style="padding: 10px 50px; background-color: green;">

    </form>
</div>