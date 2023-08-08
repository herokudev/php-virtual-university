<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/dbCommands.php");

    session_start();
    $userName = getUserName($_SESSION["email"]);

    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }    
    
    if (isset($_GET['borrarId'])) {
        $id = $_GET['borrarId'];
        //echo "Vamos a borrar datos de la clase con Id --> " . $id;
        $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $sql = "DELETE FROM clases where id_clase=" . $id;
        $result = $conn->query($sql);   
        $conn->close();
        header("Location: clasesList.php");
    }    
?>