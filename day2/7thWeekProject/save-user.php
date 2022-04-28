<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>User saved</title>
    <style type="text/css">
        #divPhoto{
            width: 1800px;
            height: 900px;
            background-image: url("main1_photo.jpeg");
            repeat: no-repeat;
            background-size: cover;
        }
    </style>
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

    <div id="divPhoto" class="text-white">
        <h1 class="text-white pt-5 ps-5"> Grab a cup of coffee and enjoy the blog</h1>
    </div>
    
</body>
</html>

<?php
    $db = "blog";
    $hostname = "localhost:3306";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO(
            "mysql:host=$hostname;dbname=$db",
            $username,
            $password
        );
    } catch(Exception $e) {
        echo "Errore!";
        var_dump($e);
    }

    try {
        $pdo->query("
            
            INSERT INTO users (
                email, 
                password, 
                first_name, 
                last_name) 
                VALUES
                ('{$_POST['email']}', 
                '{$_POST['password']}',
                '{$_POST['first_name']}',
                '{$_POST['last_name']}');
            
        ");
    } catch(Exception $e) {
        var_dump($e);
    }
    
   
    