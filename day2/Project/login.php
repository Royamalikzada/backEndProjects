<?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <?php if ($_SESSION['user']): ?>
        <div><?= $_SESSION['user']['first_name'] ?> , you are authorized</div>
        <?php endif; ?>

        <?php if ($hasError): ?>
            <div>Email o password errati</div>
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
</body>
</html>