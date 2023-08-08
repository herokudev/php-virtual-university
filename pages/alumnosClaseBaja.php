<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/dbCommands.php");

    session_start();
    $userName = getUserName($_SESSION["email"]);

    if (!isset($_SESSION["alumno"])) {
        require("nonauthorized.php");
        die();
    }    
    
    if (isset($_GET['borrarId'])) {
        $id_clase = $_GET['borrarId'];
        $userId = $_GET['userId'];
        echo "Vamos a desasignar clase con Id --> " . $id_clase;
        echo "<br />";
        echo "Vamos a desasignar clase con usuarioId --> " . $userId;
        $conn = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $sql = "DELETE FROM asignaciones where id_usuario=" . $userId . " and id_clase=" . $id_clase;
        $result = $conn->query($sql);   
        $conn->close();
        header("Location: esquemaClases.php");
    }    
?>