<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    require("nonauthorized.php");
    die();
}    

echo "This is the User profile page !!"

?>