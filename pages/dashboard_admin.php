<?php
    session_start();

    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    } else {
        echo "Bienvenido Administrador !!";
    }       
?>