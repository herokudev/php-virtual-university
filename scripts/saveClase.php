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
        $queryInsert = "insert into clases(nombre_clase)
         values('$nombreClase')";
        $resultado = $mysqli->query($queryInsert);

        if ($resultado == 1) {
                $queryId = "select max(id_clase) as claseId from clases";
                $resultado = $mysqli->query($queryId);
                $numfilas = $resultado->num_rows;
                $datos = $resultado->fetch_assoc();        
                if ($numfilas === 1) {
                    if ($id_maestro > 0) {
                        $query = "insert into asignaciones(id_usuario, id_clase) values('" . $id_maestro . "', '" . $datos['claseId'] . "')";
                        $resultado = $mysqli->query($query);
                    }
                }              
            }             

        mysqli_close($mysqli);		
  
        header("Location: ../pages/clasesList.php");
    }    

?>