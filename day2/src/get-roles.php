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
    $queryRes = $pdo->query('SELECT * FROM roles;');
    

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
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($queryRes as $row) {
                    echo "
                        <tr>
                            <td>{$row["id"]}</td>
                            <td>{$row["name"]}</td>
                        </tr>˚
                        ";
                    }
                ?>
            </tbody>
        </tabl>
    </body>
    </html>