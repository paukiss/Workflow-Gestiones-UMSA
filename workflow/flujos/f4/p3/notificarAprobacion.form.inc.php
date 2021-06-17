<div class="container">
    <h4 style="text-align:center; text-transform: uppercase;">Solicitud vacacion Aprobada<br></h4>
    <div class="row g-3 needs-validation">
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name = "nombre" value="<?php echo $nombre?>" disabled> 
        </div>
        
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Fecha Inicio:</label>
            <input type="date" class="form-control" name = "fechaIni" value="<?php echo $fechaIni?>" disabled >
        </div>
        <div class="col-md-3">
            <label for="validationCustom07" class="form-label">Fecha Fin:</label>
            <input type="date" class="form-control" name = "fechaFin" value="<?php echo $fechaFin?>" disabled>
        </div>
      
    </div>
   
</div>