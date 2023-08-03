<?php
    session_start();

    if (!isset($_SESSION["maestro"])) {
        require("nonauthorized.php");
        die();
    } else {
        echo "Bienvenido Maestro !!";
    }       
?>