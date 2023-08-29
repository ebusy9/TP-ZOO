<?php

namespace classes;

class Paddock
{
    private int $id;
    private int $size;
    private int $spot;
    private string $type;
    private int $dirtiness;


    public function __construct(string $type = null) {
        $this->type = $type;
    }

    
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


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


    public function getDirtiness(): int
    {
        return $this->dirtiness;
    }


    public function setDirtiness($dirtiness): void
    {
        $this->dirtiness = $dirtiness;
    }
}
