<?php

class Post extends Entity
{
    //Attributs
    private string $title;
    private string $content;
    private string $image_url;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        if (is_string($title) && strlen($title) > 5 && strlen($title) < 80) {
            $this->title = htmlspecialchars($title);
        }
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        if (is_string($content) && strlen($content) > 5) {
            $this->content = htmlspecialchars($content);
        }
        return $this;
    }

    public function getImage_url()
    {
        return $this->image_url;
    }

    public function setImage_url($image_url)
    {
        $this->image_url = $image_url;

        return $this;
    }
}
