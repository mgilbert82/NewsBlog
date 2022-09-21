<?php

require("../header.php");

$manager = new PostManager();
$post = $manager->getById($_GET["id"]);

?>
<div class="container-fluid m-auto mt-5">
    <h1 class=" card-title text-center"><i class="fa-solid fa-bookmark"></i> <?= $post->getTitle(); ?></h1>

    <div class="card m-auto mt-5 w-75"">
    <img src=" <?= $post->getImage_url(); ?>" class="card-img-top" alt=".<?= $post->getTitle(); ?>">
        <div class="card-body">
            <p class="card-text"><?= $post->getContent(); ?></p>
            <a href="../index.php" class="card-link"><i class="fa-solid fa-eye-slash"></i> Lire -</a>
            <div class="container d-flex justify-content-between mt-3">
                <a href="./updatePost.php?id=<?= $post->getId(); ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="./deletePost.php?id=<?= $post->getId(); ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>
</body>

</html>