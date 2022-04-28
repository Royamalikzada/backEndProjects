<?php
    require_once 'connect.php';

    $connection = connect();
    $roles = $connection->query("SELECT * FROM roles");

    require_once 'header.php';
?>
<form action="create-user.php" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="first-name">First Name</label>
        <input type="text" name="firstName" id="first-name">
    </div>
    <div>
        <label for="last-name">Last Name</label>
        <input type="text" name="lastName" id="last-name">
    </div>
    <select name="roleId">
        <?php foreach($roles as $role) : ?>
            <option value="<?= $role['id']; ?>"><?= $role['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <button name="submit">Sign up</button>
    </div>
</form>
<?php require_once 'footer.php'; ?>