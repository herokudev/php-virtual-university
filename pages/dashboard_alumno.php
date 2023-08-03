<?php
    session_start();

    if (!isset($_SESSION["alumno"])) {
        require("nonauthorized.php");
        die();
    } else {
        echo "Bienvenido Alumno !!";
    }       
?>