<?php
    require_once 'start.php';
    require_once 'connect.php';

    $connection = connect();
    $query = $connection->prepare('SELECT * FROM languages WHERE short = :short LIMIT 1');
    $query->bindParam('short', $_GET['lang']);
    $languages = $query->execute();

    var_dump($languages);
    // Prelevo il primo risultato
    $lang = $query->fetch();

    if (!count($lang)) {
        throw new Excetion('Selected language doesn not exist');
    }

    $_SESSION['language'] = $lang;

    header('Location: /day1/src/blog_ex/dashboard');
    return;
