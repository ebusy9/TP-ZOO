<?php

abstract class Entity
{
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

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->gender = $this->chooseGender();
    }

    private function chooseGender(): string
    {
        if (rand(1, 2) === 1) {
            return 'female';
        } else {
            return 'male';
        }
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }


    public function setHealthPoints(int $healthPoints): void
    {
        $this->healthPoints = $healthPoints;
    }


    public function getGender(): string
    {
        return $this->gender;
    }


    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }


    public function getAge(): int
    {
        return $this->age;
    }


    public function setAge(int $age): void
    {
        $this->age = $age;
    }


    public function getSize(): int
    {
        return $this->size;
    }


    public function setSize(int $size): void
    {
        $this->size = $size;
    }


    public function getWeight(): int
    {
        return $this->weight;
    }


    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function setType(string $type): void
    {
        $this->type = $type;
    }


    public function getSubtype(): string
    {
        return $this->subtype;
    }


    public function setSubtype(string $subtype): void
    {
        $this->subtype = $subtype;
    }


    public function getIllness(): bool
    {
        return $this->illness;
    }


    public function setIllness(bool $illness): void
    {
        $this->illness = $illness;
    }


    public function getHunger(): int
    {
        return $this->hunger;
    }


    public function setHunger(int $hunger): void
    {
        $this->hunger = $hunger;
    }


    public function getPoop(): int
    {
        return $this->poop;
    }


    public function setPoop(int $poop): void
    {
        $this->poop = $poop;
    }


    public function getThirst(): int
    {
        return $this->thirst;
    }


    public function setThirst(int $thirst): void
    {
        $this->thirst = $thirst;
    }


    public function getPee(): int
    {
        return $this->pee;
    }


    public function setPee(int $pee): void
    {
        $this->pee = $pee;
    }


    public function getPaddock(): int
    {
        return $this->paddock;
    }


    public function setPaddock(int $paddock): void
    {
        $this->paddock = $paddock;
    }


    public function getMaturityAge(): int
    {
        return $this->maturityAge;
    }


    public function setMaturityAge(int $maturityAge): void
    {
        $this->maturityAge = $maturityAge;
    }


    public function getMaximalAge(): int
    {
        return $this->maximalAge;
    }


    public function setMaximalAge(int $maximalAge): void
    {
        $this->maximalAge = $maximalAge;
    }


    public function getCompatibleWith(): array
    {
        return $this->compatibleWith;
    }


    public function setCompatibleWith(array $compatibleWith): void
    {
        $this->compatibleWith = $compatibleWith;
    }


    public function getDiet(): string
    {
        return $this->diet;
    }


    public function setDiet(string $diet): void
    {
        $this->diet = $diet;
    }


    public function getAsleep(): bool
    {
        return $this->asleep;
    }


    public function setAsleep(bool $asleep): void
    {
        $this->asleep = $asleep;
    }
}
