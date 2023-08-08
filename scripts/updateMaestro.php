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
        $queryUsuarios = "UPDATE usuarios set email='$email', nombre='$firstName', apellido='$lastName', direccion='$address', fecha_nac='$birthDate' where id_usuario = " . $_SESSION["editId"];
        $resultado = $mysqli->query($queryUsuarios);

        $queryAsig = "delete from asignaciones where id_usuario = " . $_SESSION["editId"];
        $resultado = $mysqli->query($queryAsig);
        $query = "insert into asignaciones(id_usuario, id_clase) values('" . $_SESSION["editId"] . "', '$claseAsignada')";
        $resultado = $mysqli->query($query);

        mysqli_close($mysqli);
    
        header("Location: ../pages/maestrosList.php");
    }    

?>