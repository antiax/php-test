<?php
    $host = '127.0.0.1';
    $db = '';
    $user = '';
    $pass = '';
    $charset = 'utf8mb4';


    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'db/crud.php';
    require_once 'db/user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin", "password");
?>