<?php

require("../header.php");
$manager = new PostManager();

if ($_POST) {
    $post = new Post($_POST);
    $manager->create($post);

    echo "<script>window.location.href = '../index.php'</script>";
}
?>

<div class="container mt-2">
    <h3 class="mt-3">Publier l'article</h3>
    <form method="post">
        <label for="title" id="title" class="form-label mt-5">Titre</label>
        <input type="text" name="title" class="form-control" placeholder="Ecrire le titre">

        <label for="content" id="content" class="form-label mt-3">Description</label>
        <textarea name="content" class="form-control"></textarea>

        <label for="image_url" id="image_url" class="form-label mt-3">Url de l'image</label>
        <input type="image_url" name="image_url" class="form-control" placeholder="Saisir l'url de l'image">
        <input type="submit" value="Publier" class="btn btn-primary mt-5">
    </form>
</div>