<?php

class Graph {
    private $requiresAttention;
    private $acceptsChildren;
    private $acceptsAnimals;
    private $energyLevel;

    public function __construct($requiresAttention, $acceptsChildren, $acceptsAnimals, $energyLevel)
    {
        $this->requiresAttention = $requiresAttention;
        $this->acceptsChildren = $acceptsChildren;
        $this->acceptsAnimals = $acceptsAnimals;
        $this->energyLevel = $energyLevel;
    }

    public function getRequiresAttention()
    {
        return $this->requiresAttention;
    }

    public function getAcceptsChildren()
    {
        return $this->acceptsChildren;
    }

    public function getAcceptsAnimals()
    {
        return $this->acceptsAnimals;
    }

    public function getEnergyLevel()
    {
        return $this->energyLevel;
    }

}