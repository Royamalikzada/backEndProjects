<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/day1/src/blog_ex/start.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/day1/src/blog_ex/connect.php';

    $connection = connect();
    $languages = $connection->query('SELECT * FROM languages');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/day1/src/blog_ex/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/day1/src/blog_ex/dashboard/posts/create-form.php">Add Post</a>
                    </li>
                    <?php foreach($languages as $language): ?>
                        <li>
                            <a class="nav-link" href="/day1/src/blog_ex/set-language.php?lang=<?= strtolower($language['short']); ?>"><?= $language['name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">