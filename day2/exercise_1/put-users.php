<?php
require 'connect.php';

$pdo = connect();
$users= $pdo->query('SELECT * FROM users;', PDO::FETCH_ASSOC);

$h = fopen('../uploads/csv-users.csv','w+');


foreach($users as $user){
    fputcsv($h,$user);
}

