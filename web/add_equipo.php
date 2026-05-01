<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../config/db.php';

$nombre = trim($_POST["nombre"]);
$ip = trim($_POST["ip"]);
$tipo = trim($_POST["tipo"]);
$ubicacion = trim($_POST["ubicacion"]);

$stmt = $conn->prepare("INSERT INTO equipos (nombre, ip, tipo, ubicacion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $ip, $tipo, $ubicacion);
$stmt->execute();

header("Location: equipos.php");
exit;
?>