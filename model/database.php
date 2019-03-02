<?php

$dsn = 'mysql:host=localhost;dbname=wp_ca3_karpinski_bartek';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>