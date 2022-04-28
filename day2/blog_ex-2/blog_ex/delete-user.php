<?php

require_once 'connect.php';

$connection = connect();
$query = $connection->prepare("DELETE FROM users where id = :id");
$query->bindValue(':id', $_GET['id']);
$res = $query->execute();

if ($res) {
    echo "Utente eliminato";
}
