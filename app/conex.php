<?php
/*
================================
Este archivo se encarga de conectar a la base de datos
y traer un objeto PDO
Recuerda cambiar tus credenciales
================================
*/

# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$host = "localhost";
$dbname = "imagesDB";
$username = "postgres";
$password = "1234";
#Variable puerto opcional
#$puerto = "";

try {
    $conn = new PDO("pgsql:host = $host; dbname = $dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo $err->getMessage();
}
