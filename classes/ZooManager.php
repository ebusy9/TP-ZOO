<?php

namespace classes;

class ZooManager
{
    const ZOO_START_SIZE = 6;
    const ZOO_START_DAY = 1;

    public function __construct(
        private \PDO $db,
    ) {
        $this->db = $db;
    }

    public function nextHour(?int $zooId = null)
    {
        try {
            $prepEntities = $this->db->prepare('SELECT * FROM entities WHERE zooId = :zooId ');
            $prepEntities->execute([
                'zooId' => $zooId,
            ]);
            $entities = $prepEntities->fetchAll();
        } catch (\PDOException $ex) {
            $_SESSION['ERROR_plusOneHour_entities'] = $ex;
        }


        try {
            $prepPaddocks = $this->db->prepare('SELECT * FROM paddocks WHERE zooId = :zooId ');
            $prepPaddocks->execute([
                'zooId' => $zooId,
            ]);
            $paddocks = $prepPaddocks->fetchAll();
        } catch (\PDOException $ex) {
            $_SESSION['ERROR_plusOneHour_paddocks'] = $ex;
        }
    }

    public function nextDay()
    {
    }

    public function dbInsertZoo(Zoo $zoo, int $zookeeperId): Zoo
    {
        $id = $this->getRandomIdForNewZoo();
        $zooName = htmlspecialchars($zoo->getZooName());
        $size = $this::ZOO_START_SIZE;
        $currentDay = $this::ZOO_START_DAY;


        try {
            $insertZoo = $this->db->prepare("INSERT INTO zoo (id, zooName, size, currentDay, zookeeperId) VALUES (:id, :zooName, :size, :currentDay, :zookeeperId)");
            $insertZoo->execute([
                ':id' => $id,
                ':zooName' => $zooName,
                ':size' => $size,
                ':currentDay' => $currentDay,
                ':zookeeperId' => $zookeeperId,
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zooManager_dbInsertZoo'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zooManager&info=dbInsertZooFailed');
        }

        $zoo->setId($id);
        $zoo->setSize($size);
        $zoo->setCurrentDay($currentDay);

        return $zoo;
    }


    public function dbUpdateZoo(Zoo $zoo): void
    {

        $id = $zoo->getId();
        $size = $zoo->getSize();
        $currentDay = $zoo->getCurrentDay();

        try {
            $updateZoo = $this->db->prepare('UPDATE zoo SET size = :size, currentDay = :currentDay WHERE id = :id');
            $updateZoo->execute([
                ':size' => $size,
                ':currentDay' => $currentDay,
                ':id' => $id
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zooManager_dbUpdateZooFailed'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zooManager&info=dbUpdateZooFailed');
        }
    }


    public function dbDeleteZoo(int $id): void
    {
        try {
            $deleteZoo = $this->db->prepare('DELETE FROM zoo WHERE id = :id');
            $deleteZoo->execute([
                ':id' => $id,
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zooManager_dbDeleteZoo'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zooManager&info=dbDeleteZookeeperFailed');
        }
    }


    private function getRandomIdForNewZoo(): int
    {
        try {
            $getAllIds = $this->db->prepare('SELECT * FROM zoo');
            $getAllIds->execute();
            $allIds = $getAllIds->fetchAll();
        } catch (\PDOException $ex) {
            $_SESSION['ex_zooManager_getAllIds'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zooManager&info=getAllIdsFailed');
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

    public function getZooFromDb(int $id): Zoo
    {
        try {
            $getZooFromDb = $this->db->prepare('SELECT * FROM zoo WHERE id = :id');
            $getZooFromDb->execute([
                ':id' => $id
            ]);
            $zooFromDb = $getZooFromDb->fetch();
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_getAllIds'] = $ex;
        }

        $zoo = new Zoo();
        $zoo->hydrate($zooFromDb);
        return $zoo;
    }


}
