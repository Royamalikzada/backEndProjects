<?php
    require_once '../header.php';
    require_once '../../connect.php';

    $connection = connect();
    $languages = $connection->query('SELECT * FROM languages');
?>

    <h1>Create Post</h1>
    <form action="create.php" method="POST">
        <?php foreach($languages as $language): ?>
            <?php $titleName = "title-{$language['short']}"; ?>
            <div class="form-group">
                <label for="<?= $titleName ?>">Titolo in <?= $language['name']; ?></label>
                <input type="text" class="form-control" name="<?= $titleName ?>" id="<?= $titleName ?>">
            </div>
            <?php $contentName = "content-{$language['short']}"; ?>
            <div class="form-group">
                <label for="<?= $contentName ?>">Contenuto in <?= $language['name']; ?></label>
                <textarea class="form-control" name="<?= $contentName ?>" id="<?= $contentName ?>"></textarea>
            </div>
            <hr>
        <?php endforeach; ?>
        <div>
            <button class="btn btn-primary">Create Post</button>
        </div>
    </form>

<?php require_once '../footer.php'; ?>
