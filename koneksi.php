<?php

$host = "localhost";
$port = "5432";
$dbname = "db_sipena";
$user = "postgres";
$password = "jefriaura";

try {
    $koneksi = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $koneksi->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

?>