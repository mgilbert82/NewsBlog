<?php

class Comment extends Entity
{
    //Attributs
    private int $post_id;
    private string $username;
    private string $content;

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        if (is_string($username) && strlen($username) < 20) {
            $this->username = htmlspecialchars($username);
        }
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        if (is_string($content) && strlen($content) > 3 && strlen($content) < 500) {
            $this->content = htmlspecialchars($content);
        }
        return $this;
    }
}
