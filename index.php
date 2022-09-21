<?php

require("./header.php");

$manager = new PostManager();
$posts = $manager->getAll();

?>
<div class="container-fluid d-flex pt-5">
    <?php foreach ($posts as $post) : ?>

        <div class="card m-auto" style="width: 18rem;">
            <img src="<?= $post->getImage_url(); ?>" class="card-img-top" alt=".<?= $post->getTitle(); ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $post->getTitle(); ?></h5>
                <p class="card-text"><?= substr($post->getContent(), 0, 80); ?>...</p>
                <a href="./readPost.php?id=<?= $post->getId(); ?>" class="card-link"><i class="fa-solid fa-eye"></i> Lire +</a>
                <div class="container d-flex justify-content-between mt-3">
                    <a href="./updatePost.php?id=<?= $post->getId(); ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="./deletePost.php?id=<?= $post->getId(); ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</div>
</body>

</html>