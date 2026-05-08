<?php
session_start();
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

if (isset($_SESSION['user'])) {
    registrarLog($pdo, $_SESSION['user'], "Cierre de sesión");
}

session_unset();
session_destroy();

header("Location: index.php");
exit;