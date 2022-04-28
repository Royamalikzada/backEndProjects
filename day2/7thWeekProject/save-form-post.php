<?php
    require 'connect.php';
    
    $pdo = connect();    
    $queryResPosts = $pdo->query('SELECT * FROM posts;');
    $queryResUserName = $pdo->query('SELECT * FROM users;');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Post</title>
</head>
<body class="bg-light">
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
        <form action="save-post.php" method="POST">
        <h1 class="text-primary mt-5 mb-5">Publish your post</h1>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3 row">
                <label class="form-label">User</label>
                <select name="user_id" class="form-select w-25 ms-2">
                    <?php
                        foreach($queryResUserName as $row) {
                            echo "<option> {$row["first_name"]} {$row["last_name"]}</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>