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