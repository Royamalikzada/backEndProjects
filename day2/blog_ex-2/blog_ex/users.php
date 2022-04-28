<?php
    require_once 'connect.php';

    $connection = connect();
    $users = $connection->query("
        SELECT * FROM users
        JOIN roles ON users.role_id = roles.id;
    ");

    require_once 'header.php';
?>
<h1>Users</h1>

<!-- isset verifica l'esistenza di un elemento -->
<?php if( isset($_GET['success']) ): ?>
    <div>
        <?php if($_GET['success'] === 'true'): ?>
            Utente creato con successo!
        <?php else: ?>
            Errore nella creazione dell'utente!
        <?php endif; ?>
    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>first name</th>
            <th>last name</th>
            <th>role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['name'] ?></td>
                <td>
                    <a href="delete-user.php?id=<?= $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once 'footer.php'; ?>
