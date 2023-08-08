<?php

    session_start();
    
    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }     

    //echo "Aqui vamos a grabar un nuevo alumno";
    //echo "<br />";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $birthDate = $_POST['birthDate'];

        //echo $email . " --> " . $firstName . " " . $lastName;

        $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
        $query = "insert into usuarios(email, password, nombre, apellido, direccion, fecha_nac, dni, matricula, estado, id_rol)
         values('$email', 'alumno', '$firstName', '$lastName', '$address', '$birthDate', '$dni', '$dni', 'Activo', '3')";
        $resultado = $mysqli->query($query);
        mysqli_close($mysqli);
    
        header("Location: ../pages/alumnosList.php");
    }    

?>