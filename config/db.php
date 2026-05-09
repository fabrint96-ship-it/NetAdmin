<?php

$databaseUrl = getenv("DATABASE_URL");

if (!$databaseUrl) {
    die("Error: DATABASE_URL no está configurada.");
}

$url = parse_url($databaseUrl);

$host = $url["host"];
$port = $url["port"] ?? 5432;
$user = $url["user"];
$password = urldecode($url["pass"]);
$dbname = ltrim($url["path"], "/");

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}