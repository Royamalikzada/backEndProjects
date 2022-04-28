<?php

require_once 'connect.php';

if (!$_POST['email']) {
    die('Che stai a provà eh?');
}

$connection = connect();
$query = $connection->prepare("
    INSERT INTO users (email, password, first_name, last_name, role_id) VALUES
        (?, ?, ?, ?, ?);
");

$queryRes = $query->execute([
    $_POST['email'],
    password_hash($_POST['password'], PASSWORD_BCRYPT, [
        'salt' => '$2a$12$vZQ6haju4SIFrxbnea6dXud1y/pobqudZv3EEjEPYKDm6/RT9fSSm'
    ]),
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['roleId']
]);

header('Location: http://localhost/day1/src/blog_ex/users.php?success=' . ($queryRes ? 'true' : "false"));
exit;