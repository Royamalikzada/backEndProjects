<?php

require_once '../start.php';
require_once '../connect.php';
require_once '../authorize.php';

require_once 'header.php';

$connection = connect();
$posts = $connection->query("
    SELECT
        posts.id,
        posts.user_id,
        post_contents.title,
        post_contents.content,
        users.first_name
    FROM posts
        JOIN post_contents ON posts.id = post_contents.post_id
        JOIN users ON posts.user_id = users.id
    WHERE post_contents.language_id = {$_SESSION['language']['id']}
    ORDER BY posts.id DESC;
");
?>
<?php foreach($posts as $post): ?>
    <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <p class="card-text"><?= $post['content'] ?></p>
            <a href="#" class="btn btn-primary"><?= $post['first_name'] ?></a>
        </div>
    </div>
<?php endforeach; ?>