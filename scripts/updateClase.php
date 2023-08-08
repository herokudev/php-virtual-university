<?php

    session_start();
    
    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {        
        $nombreClase = $_POST['nombreClase'];
        $id_maestro = $_POST['id_maestro'];

        $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $queryInsert = "update clases set nombre_clase ='$nombreClase' where id_clase =" . $_SESSION["editId"];
        $resultado = $mysqli->query($queryInsert);

        $queryAsig = "delete from asignaciones where id_usuario = " . $id_maestro;
        $resultado = $mysqli->query($queryAsig);
        $query = "insert into asignaciones(id_usuario, id_clase) values('" . $id_maestro . "', '" . $_SESSION["editId"] . "')";
        $resultado = $mysqli->query($query);          

        mysqli_close($mysqli);		
        header("Location: ../pages/clasesList.php");
    }    

?>