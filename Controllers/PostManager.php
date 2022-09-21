<?php

class PostManager extends EntityManager
{

    public function create(Post $post)
    {
        $req = $this->pdo->prepare("INSERT INTO `post`(title, content, image_url) VALUES (:title, :content, :image_url)");

        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":image_url", $post->getImage_url(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Post $post)
    {
        $req = $this->pdo->prepare("UPDATE `post` SET title = :title, content = :content, image_url= :image_url WHERE id = :id");

        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":image_url", $post->getImage_url(), PDO::PARAM_STR);
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `post` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getById(int $id): Post
    {
        $req = $this->pdo->prepare("SELECT * FROM `post` WHERE id = :id");

        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $post = new Post($data);

        return $post;
    }

    public function getAll()
    {
        $req = $this->pdo->query("SELECT * FROM `post` ORDER BY id DESC");
        $posts = array();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }
}
