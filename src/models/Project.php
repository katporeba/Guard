<?php

class Project {
    private $title;
    private $description;
    private $image;

    public function __construct($title, $description, $image) {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }




}