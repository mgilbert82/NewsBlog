<?php

class CommentManager extends EntityManager
{


    public function create(Comment $comment)
    {
        $req = $this->pdo->prepare("INSERT INTO `comment` (post_id, username, content) VALUES (:post_id, :username, :content)");

        $req->bindValue(":post_id", $comment->getPost_id(), PDO::PARAM_INT);
        $req->bindValue(":username", $comment->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Comment $comment)
    {
        $req = $this->pdo->prepare("UPDATE `comment` SET content = :content WHERE id = :id");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":id", $comment->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `comment` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getById(int $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();

        return new comment($data);
    }

    public function getAllByPostId(int $postId)
    {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE post_id = :post_id ORDER BY id DESC");
        $req->bindParam(":post_id", $postId, PDO::PARAM_INT);

        $req->execute();
        $datas = $req->fetchAll();

        $comments = array();
        foreach ($datas as $data) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
}
