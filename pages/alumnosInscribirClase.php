<?php

    session_start();
    
    if (!isset($_SESSION["alumno"])) {
        require("nonauthorized.php");
        die();
    }
    echo "<br />Vamos hacer insert en asignaciones con claseId --> ";
    if ($_SERVER["REQUEST_METHOD"] === "GET") {        
        $claseId = $_GET['claseId'];
        $userId = $_GET['userId'];

        $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $queryInsert = "insert into asignaciones(id_usuario, id_clase) values('$userId', '$claseId')";
        $resultado = $mysqli->query($queryInsert);

        mysqli_close($mysqli);		
        header("Location: esquemaClases.php");
    }    
?>    