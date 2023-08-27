<?php

namespace classes;

class Zookeeper
{
    private int $id;
    private int $money;
    private int $piscivoreFood = 0;
    private int $filterFeedFood = 0;
    private int $carnivoreFood = 0;
    private int $herbivoreFood = 0;
    private int $water = 0;
    private int $firstAidKit = 0;


    public function __construct(private ?string $name = null, private ?int $age = null, private ?string $gender = null)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
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

    public function getMoney(): int
    {
        return $this->money;
    }

    public function setMoney($money): void
    {
        $this->money = $money;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPiscivoreFood(): int
    {
        return $this->piscivoreFood;
    }

    public function setPiscivoreFood($piscivoreFood): void
    {
        $this->piscivoreFood = $piscivoreFood;
    }

    public function getFilterFeedFood(): int
    {
        return $this->filterFeedFood;
    }

    public function setFilterFeedFood($filterFeedFood): void
    {
        $this->filterFeedFood = $filterFeedFood;
    }

    public function getCarnivoreFood(): int
    {
        return $this->carnivoreFood;
    }

    public function setCarnivoreFood($carnivoreFood): void
    {
        $this->carnivoreFood = $carnivoreFood;
    }

    public function getHerbivoreFood(): int
    {
        return $this->herbivoreFood;
    }

    public function setHerbivoreFood($herbivoreFood): void
    {
        $this->herbivoreFood = $herbivoreFood;
    }

    public function getFirstAidKit(): int
    {
        return $this->firstAidKit;
    }

    public function setFirstAidKit($firstAidKit): void
    {
        $this->firstAidKit = $firstAidKit;
    }

    public function getWater(): int
    {
        return $this->water;
    }

    public function setWater($water): void
    {
        $this->water = $water;
    }
}
