<?php
require 'connect.php';

$pdo = connect();
$users= $pdo->query('SELECT * FROM users;', PDO::FETCH_ASSOC);

$data = [];

foreach ($users as $user) {
    $data[] = $user;
}
// $jsonUser = json_encode(array_map(fn($e) => $e, $users);
var_dump($data);
$jsonUser = json_encode($data);
var_dump($jsonUser);

try {
    $h = fopen('../uploads/user-json.json', 'a+');  
} catch (Exception $e){
    die($e->getMessage());
}

fwrite($h, $jsonUser);