<?php

require("./header.php");
$manager = new PostManager();
$post = $manager->getById($_GET["id"]);

if ($_POST) {
    $post->hydrate($_POST);
    $manager->update($post);

    echo "<script>window.location.href = '../index.php'</script>";
}
?>

<div class="container mt-2">
    <h3 class="mt-3">Modifier l'article <?= $post->getTitle(); ?></h3>
    <form method="post">
        <label for="title" id="title" class="form-label mt-5">Titre</label>
        <input type="text" name="title" class="form-control" value="<?= $post->getTitle(); ?>">

        <label for="content" id="content" class="form-label mt-3">Description</label>
        <textarea name="content" class="form-control" rows="10"><?= $post->getContent(); ?></textarea>

        <label for="image_url" id="image_url" class="form-label mt-3">Url de l'image</label>
        <input type="image_url" name="image_url" class="form-control" value="<?= $post->getImage_url(); ?>">
        <input type="submit" value="Modifier" class="btn btn-warning mt-5">
    </form>
</div>