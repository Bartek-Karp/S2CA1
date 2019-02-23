<?php
    $dsn = 'mysql:host=localhost;dbname=d00213436';
    $username = 'd00213436';
    $password = 'JG$VbWmS';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>