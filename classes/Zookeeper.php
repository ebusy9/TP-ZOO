<?php

class Zookeeper
{
    private string $name;
    private int $age;
    private string $gender;
    private int $cash;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }


    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }


    public function getCash(): int
    {
        return $this->cash;
    }

    public function setCash($cash): void
    {
        $this->cash = $cash;
    }
}
