<div class="container">
    <h4 style="text-align:center; text-transform: uppercase;">Solicitud vacacion de:<br></h4>
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
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado" value="aceptar" checked>
                    <label class="form-check-label" for="fef">
                        Aprobar solicitud
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-center">    
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado" value="rechazar">
                    <label class="form-check-label" for="rrr">
                        Rechazar solicitud
                    </label>
                </div>
            
            </div>
            
        </div>
    </div>
   
</div>