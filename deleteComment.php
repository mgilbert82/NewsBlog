<?php
require("./header.php");

$manager = new CommentManager();
$comment = $manager->getById($_GET["id"]);
$postId = $comment->getPost_id();
$manager->delete($_GET["id"]);
?>
<script>
    window.location.href = './readPost.php?id=<?= $postId ?>'
</script>