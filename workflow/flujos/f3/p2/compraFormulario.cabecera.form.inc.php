<?php
    if (isset($_GET["error"]))
    {
        $message = "No compro el formulario";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
