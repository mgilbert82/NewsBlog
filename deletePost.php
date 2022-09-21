<?php
require("./header.php");

$manager = new PostManager();
$manager->delete($_GET["id"]);
?>

<script>
    window.location.href = "./index.php"
</script>