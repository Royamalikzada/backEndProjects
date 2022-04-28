<?php

require_once 'main.php';
require 'connect.php';

$connection = connect();
$data = $connection->query('SELECT * FROM users;');
$user=[];
$crypto = password_hash($_POST['password'], PASSWORD_BCRYPT, [
    'salt' => '$2a$12$vZQ6haju4SIFrxbnea6dXud1y/pobqudZv3EEjEPYKDm6/RT9fSSm'
]);

foreach($data as $item){
$user[]=$item;
}

try {
    $connection->query("
        
        INSERT INTO users (
            email, 
            password, 
            first_name, 
            last_name) 
            VALUES
            ('{$_POST['email']}', 
            '{$crypto}',
            '{$_POST['first_name']}',
            '{$_POST['last_name']}');
        
    ");
} catch(Exception $e) {
    echo "Try again!";
}


?>
<div class="container">
    <form method="POST">
        <div class="mt-5 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="first_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" name="last_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div>
            <button class="btn btn-info">Sign up</button>
        </div>
    </form>
</div>