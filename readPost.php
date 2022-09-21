<?php

require("./header.php");

$postManager = new PostManager();
$post = $postManager->getById($_GET["id"]);

$commentManager = new CommentManager();
$comments = $commentManager->getAllByPostId($_GET["id"]);


if ($_POST) {
    $comment =  new Comment([
        "post_id" => $_GET["id"],
        "username" => $_POST["username"],
        "content" => $_POST["content"],
    ]);

    $commentManager->create($comment);
    echo "<script>window.location.href='./readPost.php?id={$_GET['id']}'</script>";
}

?>
<div class="container-fluid m-auto mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class=" card-title text-center"><i class="fa-solid fa-bookmark"></i> <?= $post->getTitle(); ?></h1>

            <div class="card mt-5"">
            <img src=" <?= $post->getImage_url(); ?>" class="card-img-top" alt=".<?= $post->getTitle(); ?>">
                <div class="card-body">
                    <p class="card-text"><?= $post->getContent(); ?></p>
                    <a href="./index.php" class="card-link"><i class="fa-solid fa-eye-slash"></i> Lire -</a>
                    <div class="container d-flex justify-content-between mt-3">
                        <a href="./updatePost.php?id=<?= $post->getId(); ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="./deletePost.php?id=<?= $post->getId(); ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 bg-light">
            <h3 class="text-center">Laisser un commentaire</h3>
            <form method="post" class="form-control">
                <textarea class="form-control mt-3" id="content" name="content" placeholder="Votre commentaire"></textarea>
                <input class="form-control mt-3" type="text" id="username" name="username" placeholder="Votre pseudo">
                <input class="btn btn-primary mt-4" type="submit" id="submit" value="Poster">
            </form>

            <hr>
            <?php foreach ($comments as $comment) : ?>
                <div class="card mt-3">
                    <div class=" card-body">
                        <p class="card-subtitle mb-2 text-muted"><?= $comment->getUsername(); ?></p>
                        <p class="card-text"><?= $comment->getContent(); ?></p>
                        <a href="./updateComment.php?id=<?= $comment->getId(); ?>" class=" btn btn-warning""><i class=" fa-solid fa-pen-to-square"></i></a>
                        <a href="./deleteComment.php?id=<?= $comment->getId(); ?>" class=" btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>

</html>