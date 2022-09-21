<?php

require("./header.php");

$manager = new CommentManager();
$comment = $manager->getById($_GET["id"]);
$postId = $comment->getPost_id();

if ($_POST) {
    $comment->hydrate([
        "content" => $_POST["content"],
        "post_id" => $_GET["id"],
    ]);
    $manager->update($comment);

    echo "<script>window.location.href='./readPost.php?id={$postId}'</script>";
}
?>

<div class="container-fluid m-auto mt-5">
    <div class="col-md-4">
        <h3 class="text-center">Modifier un commentaire</h3>
        <form method="post" class="form-control">
            <p class="card-subtitle mb-2 text-muted"><?= $comment->getUsername(); ?></p>
            <textarea class="form-control mt-3" id="content" name="content" placeholder="Votre commentaire"><?= $comment->getContent(); ?></textarea>
            <input class="btn btn-warning mt-3 mb-4" type="submit" id="submit" value="Poster">
        </form>
    </div>
</div>