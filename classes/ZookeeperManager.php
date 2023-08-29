<?php

namespace classes;

class ZookeeperManager
{

    const START_MONEY = 1000;
    const PISCIVORE_FOOD_PRICE = 23;
    const FILTER_FEED_FOOD_PRICE = 20;
    const CARNIVORE_FOOD_PRICE = 25;
    const HERBIVORE_FOOD_PRICE = 18;
    const WATER_PRICE = 10;
    const FIRST_AID_KIT_PRICE = 75;



    public function __construct(private \PDO $db)
    {
        $this->db = $db;
    }

    public function dbInsertZookeeper(Zookeeper $zookeeper, int $userId): Zookeeper
    {
        $id = $this->getRandomIdForNewZookeeper();
        $name = htmlspecialchars($zookeeper->getName());
        $age = htmlspecialchars($zookeeper->getAge());
        $gender = htmlspecialchars($zookeeper->getGender());
        $money = $this::START_MONEY;

        try {
            $xyii = $this->db->prepare("INSERT INTO zookeepers (id, name, age, gender, money, user_id) VALUES (:id, :name, :age, :gender, :money, :user_id)");
            $xyii->execute([
                ':id' => $id,
                ':name' => $name,
                ':age' => $age,
                ':gender' => $gender,
                ':money' => $money,
                ':user_id' => $userId
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_intertIntoZookeepers'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zookeeperManager&info=dbInsertZookeeperFailed');
        }

        $zookeeper->setMoney($money);
        $zookeeper->setId($id);

        return $zookeeper;
    }


    public function dbUpdateZookeeper(Zookeeper $zookeeper): void
    {

        $id = $zookeeper->getId();
        $money = $zookeeper->getMoney();
        $piscivoreFood = $zookeeper->getPiscivoreFood();
        $filterFeedFood = $zookeeper->getFilterFeedFood();
        $carnivoreFood = $zookeeper->getCarnivoreFood();
        $herbivoreFood = $zookeeper->getHerbivoreFood();
        $water = $zookeeper->getWater();
        $firstAidKit = $zookeeper->getFirstAidKit();

        try {
            $updateZookeeper = $this->db->prepare('UPDATE zookeepers SET money = :money, piscivoreFood = :piscivoreFood, filterFeedFood = :filterFeedFood, carnivoreFood = :carnivoreFood, herbivoreFood = :herbivoreFood, water = :water, firstAidKit = :firstAidKit WHERE id = :id');
            $updateZookeeper->execute([
                ':money' => $money,
                ':piscivoreFood' => $piscivoreFood,
                ':filterFeedFood' => $filterFeedFood,
                ':carnivoreFood' => $carnivoreFood,
                ':herbivoreFood' => $herbivoreFood,
                ':water' => $water,
                ':firstAidKit' => $firstAidKit,
                ':id' => $id
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_intertIntoZookeepers'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zookeeperManager&info=dbUpdateZookeeperFailed');
        }
    }

    public function dbDeleteZookeeper(int $id): void
    {
        try {
            $updateZookeeper = $this->db->prepare('DELETE FROM zookeepers WHERE id = :id');
            $updateZookeeper->execute([
                ':id' => $id,
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_deleteZookeeper'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zookeeperManager&info=dbDeleteZookeeperFailed');
        }
    }


    private function getRandomIdForNewZookeeper(): int
    {
        try {
            $getAllIds = $this->db->prepare('SELECT * FROM zookeepers');
            $getAllIds->execute();
            $allIds = $getAllIds->fetchAll();
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_getAllIds'] = $ex;
        }

        $takenIdList = [];

        foreach ($allIds as $id) {
            array_push($takenIdList, $id['id']);
        }

        $id = rand(1, 99999);

        while (in_array($id, $takenIdList, true)) {
            $id = rand(1, 99999);
        }

        return $id;
    }

    public function getZookeeperFromDb(int $id): Zookeeper
    {
        try {
            $getZookeeperFromDb = $this->db->prepare('SELECT * FROM zookeepers WHERE id = :id');
            $getZookeeperFromDb->execute([
                ':id' => $id
            ]);
            $zookeeperFromDb = $getZookeeperFromDb->fetch();
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_getAllIds'] = $ex;
        }

        $zookeeper = new Zookeeper();
        $zookeeper->hydrate($zookeeperFromDb);
        return $zookeeper;
    }

    public function buyPiscivoreFoodAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $piscivoreFood = $zookeeper->getPiscivoreFood();
        if ($balance >= $this::PISCIVORE_FOOD_PRICE) {
            $zookeeper->setMoney($balance - $this::PISCIVORE_FOOD_PRICE);
            $zookeeper->setPiscivoreFood($piscivoreFood + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function buyFilterFeedFoodAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $filterFeedFood = $zookeeper->getFilterFeedFood();
        if ($balance >= $this::FILTER_FEED_FOOD_PRICE) {
            $zookeeper->setMoney($balance - $this::FILTER_FEED_FOOD_PRICE);
            $zookeeper->setFilterFeedFood($filterFeedFood + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function buyCarnivoreFoodAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $carnivoreFood = $zookeeper->getCarnivoreFood();
        if ($balance >= $this::CARNIVORE_FOOD_PRICE) {
            $zookeeper->setMoney($balance - $this::CARNIVORE_FOOD_PRICE);
            $zookeeper->setCarnivoreFood($carnivoreFood + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function buyHerbivoreFoodAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $herbivoreFood = $zookeeper->getHerbivoreFood();
        if ($balance >= $this::HERBIVORE_FOOD_PRICE) {
            $zookeeper->setMoney($balance - $this::HERBIVORE_FOOD_PRICE);
            $zookeeper->setHerbivoreFood($herbivoreFood + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function buyWaterAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $water = $zookeeper->getWater();
        if ($balance >= $this::WATER_PRICE) {
            $zookeeper->setMoney($balance - $this::WATER_PRICE);
            $zookeeper->setWater($water + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function buyFirstAidKitAndUpdateDb(Zookeeper $zookeeper): int
    {
        $balance = $zookeeper->getMoney();
        $firstAidKit = $zookeeper->getFirstAidKit();
        if ($balance >= $this::FIRST_AID_KIT_PRICE) {
            $zookeeper->setMoney($balance - $this::FIRST_AID_KIT_PRICE);
            $zookeeper->setFirstAidKit($firstAidKit + 1);
            $this->dbUpdateZookeeper($zookeeper);
        }
        $finalBalance = $zookeeper->getMoney();
        return $finalBalance;
    }

    public function getInventory(Zookeeper $zookeeper): array
    {
        $inventory = [];
        $carnivoreFood = $zookeeper->getCarnivoreFood();
        $filterFeedFood = $zookeeper->getFilterFeedFood();
        $herbivoreFood = $zookeeper->getHerbivoreFood();
        $piscivoreFood = $zookeeper->getPiscivoreFood();
        $water = $zookeeper->getWater();
        $firstAidKit = $zookeeper->getFirstAidKit();

        if($carnivoreFood>0){
            $inventory['Carnivore Food'] = $carnivoreFood;
        }

        if($filterFeedFood>0){
            $inventory['Filter Feed Food'] = $filterFeedFood;
        }

        if($herbivoreFood>0){
            $inventory['Herbivore Food'] = $herbivoreFood;
        }

        if($piscivoreFood>0){
            $inventory['Piscivore Food'] = $piscivoreFood;
        }

        if($water>0){
            $inventory['Water'] = $water;
        }

        if($firstAidKit>0){
            $inventory['First Aid Kit'] = $firstAidKit;
        }

        return $inventory;
    }
}
