<?php

require_once 'main.php';
require 'connect.php';

$connection = connect();
$user = $connection->query('SELECT * FROM users;');

?>

<div class="container">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>email</th>
                    <th>first name</th>
                    <th>last name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($user as $row) {
                        echo "
                            <tr>
                                <td>{$row["id"]}</td>
                                <td>{$row["email"]}</td>
                                <td>{$row["first_name"]}</td>
                                <td>{$row["last_name"]}</td>                        
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>