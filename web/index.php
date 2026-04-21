<?php
$conn = new mysqli("localhost", "root", "", "netadmin");

if ($conn->connect_error) {
    die("Error conexión");
}

echo "<h1>Conectado a MySQL correctamente</h1>";
?>