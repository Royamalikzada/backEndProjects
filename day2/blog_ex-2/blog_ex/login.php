<?php
require_once 'start.php';
require_once 'connect.php';

/**
 * Checks if a POST requst has been received and tries to log the user in
 * 
 * @return bool True if an error has occured, false otherwise
 */
function login() {
    if ( !count($_POST) ) {
        return false;
    }

    $connection = connect();
    $query = $connection->prepare('SELECT * FROM users WHERE email = ? LIMIT 1;');
    $query->execute([$_POST['email']]);

    $user = $query->fetch();
    
    if (!$user) {
        return true;
    }

    if ( !password_verify($_POST['password'], $user['password']) ) {
        return true;
    }

    $_SESSION['user'] = $user;
    return false;
}

$hasError = login();

if ( isset($_SESSION['user']) ) {
    header('Location: /day1/src/blog_ex/dashboard');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($hasError): ?>
        <div>Email o password errati</div>
    <?php endif; ?>
    <form method="POST">
        <div>
            <label for="email">email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password">
        </div>
        <div>
            <button>Accedi</button>
        </div>
    </form>
</body>
</html>