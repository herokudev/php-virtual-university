<?php

    session_start();
    
    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {        
        $emailUsuario = $_POST['emailUsuario'];
        $id_rol = $_POST['id_rol'];
        $status = $_POST['user_status'];

        $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $query = "update usuarios set email ='$emailUsuario', estado='$status', id_rol=$id_rol where id_usuario =" . $_SESSION["editId"];
        $resultado = $mysqli->query($query);      
        mysqli_close($mysqli);		

        //echo "update OK";
        header("Location: ../pages/permisosList.php");
    }    

?>