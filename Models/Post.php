<?php

class Post
{
    //Attributs
    private int $id;
    private string $title;
    private string $content;
    private string $image_url;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
