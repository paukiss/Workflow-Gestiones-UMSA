<?php
    print_r($_GET);
    if (isset($_GET["comprar"]))
    {
        echo "ok";
    }
    else
    {
        if (isset($_GET["Anterior"]))
            header("Location: bandeja.php");
        else 
            header("Location: motor.php?flujo=$flujo&proceso=$proceso&tramite=$tramite&error=si");
        exit();
    }
?>