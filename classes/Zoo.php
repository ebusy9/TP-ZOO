<?php

namespace classes;

class Zoo
{
    private int $id;
    private int $size;
    private int $currentDay;
    private array $paddocks = [];


    public function __construct(private ?string $zooName = null)
    {
        $this->zooName = $zooName;
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


    public function getZooName(): string
    {
        return $this->zooName;
    }


    public function setZooName($zooName): void
    {
        $this->zooName = $zooName;
    }


    public function getSize(): int
    {
        return $this->size;
    }


    public function setSize($size): void
    {
        $this->size = $size;
    }


    public function getCurrentDay(): int
    {
        return $this->currentDay;
    }


    public function setCurrentDay($currentDay): void
    {
        $this->currentDay = $currentDay;
    }


    public function getPaddocks(): array
    {
        return $this->paddocks;
    }


    public function setPaddocks($paddocks): void
    {
        $this->paddocks = $paddocks;
    }
}
