<?php

abstract class Entity {
    private int $id;
    private string $name;
    private int $healthPoints;
    private string $gender;
    private int $age;
    private int $size;
    private int $weight;
    private string $type;
    private string $subtype;
    private bool $illness;
    private int $hunger;
    private int $poop;
    private int $thirst;
    private int $pee;
    private int $paddock;
    private int $maturityAge;
    private int $maximalAge;
    private array $compatibleWith;
    private string $diet;
    private bool $asleep;

     
    public function getId(): int
    {
        return $this->id;
    }

     
    public function setId($id): void
    {
        $this->id = $id;

    }

     
    public function getName(): string
    {
        return $this->name;
    }

     
    public function setName($name): void
    {
        $this->name = $name;

    }

     
    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

     
    public function setHealthPoints($healthPoints): void
    {
        $this->healthPoints = $healthPoints;

    }

     
    public function getGender(): string
    {
        return $this->gender;
    }

     
    public function setGender($gender): void
    {
        $this->gender = $gender;

    }

     
    public function getAge(): int
    {
        return $this->age;
    }

     
    public function setAge($age): void
    {
        $this->age = $age;

    }

     
    public function getSize(): int
    {
        return $this->size;
    }

     
    public function setSize($size): void
    {
        $this->size = $size;

    }

     
    public function getWeight(): int
    {
        return $this->weight;
    }

     
    public function setWeight($weight): void
    {
        $this->weight = $weight;

    }

     
    public function getType(): string
    {
        return $this->type;
    }

     
    public function setType($type): void
    {
        $this->type = $type;

    }

     
    public function getSubtype(): string
    {
        return $this->subtype;
    }

     
    public function setSubtype($subtype): void
    {
        $this->subtype = $subtype;

    }

     
    public function getIllness(): bool
    {
        return $this->illness;
    }

     
    public function setIllness($illness): void
    {
        $this->illness = $illness;

    }

     
    public function getHunger(): int
    {
        return $this->hunger;
    }

     
    public function setHunger($hunger): void
    {
        $this->hunger = $hunger;

    }

     
    public function getPoop(): int
    {
        return $this->poop;
    }

     
    public function setPoop($poop): void
    {
        $this->poop = $poop;

    }

     
    public function getThirst(): int
    {
        return $this->thirst;
    }

     
    public function setThirst($thirst): void
    {
        $this->thirst = $thirst;

    }

     
    public function getPee(): int
    {
        return $this->pee;
    }

     
    public function setPee($pee): void
    {
        $this->pee = $pee;

    }

     
    public function getPaddock(): int
    {
        return $this->paddock;
    }

     
    public function setPaddock($paddock): void
    {
        $this->paddock = $paddock;

    }

     
    public function getMaturityAge(): int
    {
        return $this->maturityAge;
    }

     
    public function setMaturityAge($maturityAge): void
    {
        $this->maturityAge = $maturityAge;

    }

     
    public function getMaximalAge(): int
    {
        return $this->maximalAge;
    }

     
    public function setMaximalAge($maximalAge): void
    {
        $this->maximalAge = $maximalAge;

    }

     
    public function getCompatibleWith(): array
    {
        return $this->compatibleWith;
    }

     
    public function setCompatibleWith($compatibleWith): void
    {
        $this->compatibleWith = $compatibleWith;

    }

     
    public function getDiet(): string
    {
        return $this->diet;
    }

     
    public function setDiet($diet): void
    {
        $this->diet = $diet;

    }

     
    public function getAsleep(): bool
    {
        return $this->asleep;
    }

     
    public function setAsleep($asleep): void
    {
        $this->asleep = $asleep;

    }
}