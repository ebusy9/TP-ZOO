<?php

class Paddock
{
    private int $id;
    private int $size;
    private int $spot;
    private string $type;
    private int $cleanliness;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getSize(): string
    {
        return $this->size;
    }


    public function setSize($size): void
    {
        $this->size = $size;
    }


    public function getSpot(): string
    {
        return $this->spot;
    }


    public function setSpot($spot): void
    {
        $this->spot = $spot;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function setType($type): void
    {
        $this->type = $type;
    }


    public function getCleanliness(): int
    {
        return $this->cleanliness;
    }


    public function setCleanliness($cleanliness): void
    {
        $this->cleanliness = $cleanliness;
    }
}
