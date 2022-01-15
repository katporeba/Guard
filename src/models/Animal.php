<?php

class Animal {
    private $name;
    private $age;
    private $gender;
    private $size;
    private $health;
    private $color;
    private $weight;
    private $animalType;

    public function __construct($name, $age, $gender, $size, $health, $color, $weight, $animalType) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->size = $size;
        $this->health = $health;
        $this->color = $color;
        $this->weight = $weight;
        $this->animalType = $animalType;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size): void
    {
        $this->size = $size;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health): void
    {
        $this->health = $health;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function getAnimalType()
    {
        return $this->animalType;
    }


}