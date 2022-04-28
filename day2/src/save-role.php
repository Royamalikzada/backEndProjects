<?php
    $db = "blog";
    $hostname = "localhost:3306";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO(
            "mysql:host=$hostname;dbname=$db",
            $username,
            $password
        );
    } catch(Exception $e) {
        echo "Errore!";
        var_dump($e);
    }
    $queryRes = $pdo->query('SELECT * FROM roles;');
    foreach($queryRes as $row) {
        var_dump($row);
    }

    try {
        $pdo->query("INSERT INTO roles (name) VALUES ('{$_POST['name']}');");
    } catch (Exception $e) {
        echo "Errore!";
        var_dump($e);
    }

