<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/scripts/dbCommands.php");

    session_start();
    
    if(isset($_POST['submit'])) {
        echo "Datos recibidos --> <br />";
        var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "<br /> email --> " . $email;
        echo "<br /> password --> " . $password;

        $emailExists = checkEmail($email);
        if ($emailExists === true) {
            $_SESSION["email"] = $email;
            $estado = getUserState($email);
            if ($estado == "Activo") {
                $getPWD = getPassword($email);
                if ($password == $getPWD) {
                    $getRol = getUserRol($email);
                    if ($getRol == 1) {
                        $_SESSION["admin"] = "";
                        header("Location: dashboard_admin.php"); 
                    } else {
                        if ($getRol == 2) {
                            $_SESSION["maestro"] = "";
                            header("Location: dashboard_maestro.php"); 
                        } else {
                            $_SESSION["alumno"] = "";     
                            header("Location: dashboard_alumno.php"); 
                        }                      
                    }      
                } else {
                    $_SESSION["mensaje"] = "No se puede hacer login --> Password No Valido!!";
                    header("Location: notification.php");                 
                }
            } else {
                $_SESSION["mensaje"] = "No se puede hacer login --> Usuario Inactivo!!";
                header("Location: notification.php"); 
            }
        } else {
            $_SESSION["mensaje"] = "No se puede hacer login --> Email NO REGISTRADO";
            header("Location: notification.php");                     
        }   
    }
    
?>