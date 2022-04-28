<?php

require 'main.php';
require_once 'start.php';
require_once 'connect.php';

$hasError = false;

if (count($_POST)){
    $connection = connect();
    $query = $connection->prepare('SELECT * FROM users WHERE email = ? LIMIT 1;');
    $query->execute([$_POST['email']]);

    $user = $query->fetch();

    if(!$user){
        $hasError = true;
    }

    if(password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = $user;
    } else {
        $hasError = true;
    }
}

?>

    <div class="container mt-5">

        <?php if ($_SESSION['user']): ?>
        <div><?= $_SESSION['user']['first_name'] ?> , you are authorized</div>
        <?php endif; ?>

        <?php if ($hasError): ?>
            <div>Incorrect email or password</div>
        <?php endif; ?>

        <form method="POST">
            <div>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name ="email">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div>
                <button class="btn btn-primary">Accedi</button>
            </div>
        </form>
    </div>
