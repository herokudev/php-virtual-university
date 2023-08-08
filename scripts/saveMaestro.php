<?php

    session_start();
    
    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {        
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $birthDate = $_POST['birthDate'];
        $claseAsignada = $_POST['id_clase'];

        $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $queryInsert = "insert into usuarios(email, password, nombre, apellido, direccion, fecha_nac, estado, id_rol)
         values('$email', 'maestro', '$firstName', '$lastName', '$address', '$birthDate', 'Activo', '2')";
        $resultado = $mysqli->query($queryInsert);

        if ($resultado == 1) {
                $queryId = "select max(id_usuario) as userId from usuarios where id_rol=2";
                $resultado = $mysqli->query($queryId);
                $numfilas = $resultado->num_rows;
                $datos = $resultado->fetch_assoc();        
                if ($numfilas === 1) {
                    if ($claseAsignada > 0) {
                        $query = "insert into asignaciones(id_usuario, id_clase) values('" . $datos["userId"] . "', '$claseAsignada')";
                        $resultado = $mysqli->query($query);
                    }
                }              
            }             

        mysqli_close($mysqli);
    
        header("Location: ../pages/maestrosList.php");
    }    

?>