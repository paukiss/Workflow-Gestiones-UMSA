
<div class="container">
    <h4 style="text-align:center; text-transform: uppercase;">Formulario de Estudiante Regular<br></h4>
    <div class="row g-3 needs-validation">
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
            <label for="validationCustom06" class="form-labe    l">Matricula:</label>
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
        <div class="col-md-3">
        <img src="<?php echo $firma?>" alt="ci2" class="card-img-top" style="width: 100px;">
        </div>
        <div class="mb-3">
            <input type="submit" value="Descargar carta" name="upload" style="padding: 10px 50px; background-color: green;" disabled>
        </div>
        <div class="mb-3" hidden>
            <label for="formFile" class="form-label">Firma Digital Decano:</label>
            <input class="form-control" type="file" name="firma" >
        </div>
    </div>
</div>

