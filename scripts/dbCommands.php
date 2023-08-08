<?php

function checkEmail($email) {
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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

function getUserEmail($userId) {
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
    $query = "select email from usuarios where id_usuario='$userId'";
    $resultado = $mysqli->query($query);
    $numfilas = $resultado->num_rows;
    $datos = $resultado->fetch_assoc();        
    mysqli_close($mysqli);
    if ($numfilas === 1) {
        return $datos["email"];
    } else {
        return "";
    }              
} 

function getIdClase($userId) {
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
    $mysqli = new mysqli("localhost", $_SESSION["dbUser"], $_SESSION["dbPwd"], $_SESSION["dbName"]);
    
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
