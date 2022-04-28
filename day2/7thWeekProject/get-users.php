<?php
    require 'connect.php';
    
    $pdo = connect();    
    $queryResUsers = $pdo->query('SELECT * FROM users;');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Users</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Secret</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="get-post.php">Blog</a>
                <a class="nav-link" href="save-user-form.php">Registration of users</a>
                <a class="nav-link" href="get-users.php">See users</a>
                <a class="nav-link" href="save-form-post.php">Post</a>
            </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>email</th>
                    <th>password</th>
                    <th>first name</th>
                    <th>last name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($queryResUsers as $row) {
                        echo "
                            <tr>
                                <td>{$row["id"]}</td>
                                <td>{$row["email"]}</td>
                                <td>{$row["password"]}</td>
                                <td>{$row["first_name"]}</td>
                                <td>{$row["last_name"]}</td>                        
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>