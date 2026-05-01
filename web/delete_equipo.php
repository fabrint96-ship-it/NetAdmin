<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../config/db.php';

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM equipos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: equipos.php");
exit;
?>