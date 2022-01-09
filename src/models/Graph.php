<?php

class Graph {
    private $requiresAttention;
    private $acceptsChildren;
    private $acceptsAnimals;
    private $energyLevel;
    private $openess;

    public function __construct($requiresAttention, $acceptsChildren, $acceptsAnimals, $energyLevel, $openess)
    {
        $this->requiresAttention = $requiresAttention;
        $this->acceptsChildren = $acceptsChildren;
        $this->acceptsAnimals = $acceptsAnimals;
        $this->energyLevel = $energyLevel;
        $this->openess = $openess;
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

    public function getOpeness()
    {
        return $this->openess;
    }




}