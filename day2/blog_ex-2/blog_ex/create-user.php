<?php

require_once 'connect.php';

if (!$_POST['email']) {
    die('Ce stai a provà eh?');
}

$connection = connect();
$query = $connection->prepare("
    INSERT INTO users (email, password, first_name, last_name, role_id) VALUES
        (?, ?, ?, ?, ?);
");

$queryRes = $query->execute([
    $_POST['email'],
    password_hash($_POST['password'], PASSWORD_BCRYPT),
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['roleId']
]);

header('Location: http://localhost/day1/src/blog_ex/users.php?success=' . ($queryRes ? 'true' : "false"));
exit;