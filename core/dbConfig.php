<?php 

$host = "localhost";
$user = "root";
$password = "";
$PASCUALOCT19 = "PASCUALOCT19";
$dsn = "mysql:host={$host};dbname={$PASCUALOCT19}";

$pdo = new PDO($dsn, $user, $password);
$conn = new PDO($dsn, $user, $password);
$conn->exec("SET time_zone = '+08:00';");

?>