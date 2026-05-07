<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "netadmin";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>