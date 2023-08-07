<?php
    session_start();

    if (!isset($_SESSION["admin"])) {
        require("nonauthorized.php");
        die();
    }     

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $birthDate = $_POST['birthDate'];

        //echo $email . " --> " . $firstName . " " . $lastName;
        //echo "<br />";
        //echo "vamos a editar usuar con id --> " . $_SESSION["editId"];

        $mysqli = new mysqli("localhost", "root", "", "php-university");
        $query = "UPDATE usuarios set dni='$dni', email='$email', nombre='$firstName', apellido='$lastName', direccion='$address', fecha_nac='$birthDate' where id_usuario = " . $_SESSION["editId"];
        $resultado = $mysqli->query($query);
        mysqli_close($mysqli);
    
        header("Location: ../pages/alumnosList.php");
    }    

?>