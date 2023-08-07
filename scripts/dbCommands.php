<?php

function checkEmail($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select * from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return true;
    } else {
        return false;
    }        
};

function getPassword($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select password from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["password"];
    } else {
        return "";
    }              
}

function getUserName($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select nombre, apellido from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["nombre"] . " " . $datos["apellido"];
    } else {
        return "";
    }              
}

function getUserState($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select estado from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["estado"];
    } else {
        return "";
    }              
}  

function getUserRol($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select id_rol from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["id_rol"];
    } else {
        return "";
    }              
}  

function getUserId($email) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select id_usuario from usuarios where email='$email'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["id_usuario"];
    } else {
        return "";
    }              
} 

function getIdClase($userId) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select id_clase from asignaciones where id_usuario='$userId'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["id_clase"];
    } else {
        return "";
    }              
} 

function getNombreClase($userId) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    
    $query = "select nombreClase from asig_namesr2 where id_usuario='$userId'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["nombreClase"];
    } else {
        return "";
    }              
} 

function UpdateAlumno($id, $dni, $email, $firstName, $lastName, $address, $birthDate) {
    $mysqli = new mysqli("localhost", "root", "", "php-university");
    $query = "UPDATE usuarios set dni='$dni', email='$email', nombre='$firstName', apellido='$lastName', direccion='$address', fecha_nac='$birthDate' where id_usuario = $id";
    $resultado = $mysqli->query($query);
    mysqli_close($mysqli);
    return $resultado;                 
} 