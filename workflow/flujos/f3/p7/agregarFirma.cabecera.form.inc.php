
<?php

$sql = "select * from formularioestudianteregular where nroTramite='$tramite'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);
$nombre = $fila['nombre'];
$paterno = $fila['aPaterno'];
$materno = $fila['aMaterno'];
$ci = $fila['ci'];
$matricula = $fila['matricula'];
$carrera = $fila['carrera'];
$facultad = $fila['facultad'];
$ciudad = $fila['ciudad'];

$estado = 0;

if (isset($_POST["ok"]))
{   
    // $msg = "";
    $user = $_SESSION["IdUser"];
    $path = "documentos/".$user;
    if (!file_exists($path))
        mkdir($path);
    $filename = $_FILES["firma"]["name"];
    $tempname = $_FILES["firma"]["tmp_name"];
    $folderFirma = $path."/".$filename;        
    
    move_uploaded_file($tempname, $folderFirma);
    
    
    // $firma = $_POST['firma'];
    $sql = "UPDATE `formularioestudianteregular` SET `firmaDecano`='$folderFirma' where nroTramite='$tramite'";
    // $sql = "INSERT INTO `formularioestudianteregular`(`idAlumno`, `nroTramite`, `nombre`, `aPaterno`, `aMaterno`, `ci`, `matricula`, `carrera`, `facultad`, `ciudad`)";
    // $sql.= " VALUES ('$user','$tramite','$nombre','$paterno','$materno','$ci','$matricula','$carrera','$facultad','$ciudad')";
    mysqli_query($conn, $sql);
    $estado = 1;
}

?>
<div class="container" style="padding: 5%; margin: 0% 0% -10% 5%;" <?php if ($estado == 1) echo "hidden" ?>>
    <h4 style="text-align:center; text-transform: uppercase;">Formulario de Estudiante Regular<br></h4>
    <form method="POST" action="" enctype="multipart/form-data" class="row g-3 needs-validation">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre(s):</label>
            <input type="text" class="form-control" name = "nombre" value="<?php echo $nombre?>" required disabled> 
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellido Paterno:</label>
            <input type="text" class="form-control" name = "paterno" value="<?php echo $paterno?>" required disabled>
        </div>
        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Apellido Materno:</label>
            <input type="text" class="form-control" name = "materno" value="<?php echo $materno?>" required disabled>
        </div>
        <div class="col-md-6">
            <label for="validationCustom05" class="form-label">Carnet de Identidad:</label>
            <input type="text" class="form-control" name = "ci" value="<?php echo $ci?>" required disabled>
        </div>

        <div class="col-md-5">
            <label for="validationCustom06" class="form-label">Matricula:</label>
            <input type="text" class="form-control" name = "matricula" value="<?php echo $matricula?>" required disabled>
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Carrera:</label>
            <input type="text" class="form-control" name = "carrera" value="<?php echo $carrera?>" required disabled>
        </div>
        <div class="col-md-5">
            <label for="validationCustom07" class="form-label">Facultad:</label>
            <input type="text" class="form-control" name = "facultad" value="<?php echo $facultad?>" required disabled>
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Ciudad:</label>
            <input type="text" class="form-control" name = "ciudad" value="<?php echo $ciudad?>" required disabled>
        </div>
        
        <div class="mb-3">
            <label for="formFile" class="form-label">Firma Digital Decano:</label>
            <input class="form-control" type="file" name="firma" >
        </div>
        <input type="text" name="ok" value="ok" hidden>
        <input type="submit" value="Agregar Firma" name="upload" style="padding: 10px 50px; background-color: green;">

    </form>
</div>