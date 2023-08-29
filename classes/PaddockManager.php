<?php

namespace classes;

class PaddockManager
{
    const PADDOCK_START_SIZE = 6;
    const PADDOCK_START_DIRTINESS = 0;
    const AQUATIC_PADDOCK_PRICE = 750;
    const SEMIAQUATIC_PADDOCK_PRICE = 750;
    const TERRESTRIAL_PADDOCK_PRICE = 750;
    const VOLATILE_PADDOCK_PRICE = 750;


    public function __construct(
        private \PDO $db,
    ) {
        $this->db = $db;
    }


    public function dbInsertPaddock(Paddock $paddock, int $zooId): Paddock
    {
        $paddockList = $this->getAllPaddocksFromDb($zooId);
        $spot = 0;
        foreach ($paddockList as $key => $value) {
            if (isset($value['spot'])) {
                $spot = max($value['spot'], $spot);
            }
        }

        $id = $this->getRandomIdForNewPaddock();
        $size = $this::PADDOCK_START_SIZE;
        $spot = $spot + 1;
        $type = htmlspecialchars($paddock->getType());
        $dirtiness = $this::PADDOCK_START_DIRTINESS;

        try {
            $insertPaddok = $this->db->prepare("INSERT INTO paddocks (id, size, spot, type, dirtiness, zooId) VALUES (:id, :size, :spot, :type, :dirtiness, :zooId)");
            $insertPaddok->execute([
                ':id' => $id,
                ':size' => $size,
                ':spot' => $spot,
                ':type' => $type,
                ':dirtiness' => $dirtiness,
                ':zooId' => $zooId
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_zookeeperManager_intertIntoZookeepers'] = $ex;
            header('Location: ../public/home.php?redirectFrom=zookeeperManager&info=dbInsertZookeeperFailed');
        }

        $paddock->setId($id);
        $paddock->setSize($size);
        $paddock->setSpot($spot);
        $paddock->setDirtiness($dirtiness);

        return $paddock;
    }


    public function dbUpdatePaddock(Paddock $paddock): void
    {

        $id = $paddock->getId();
        $size = $paddock->getSize();
        $spot = $paddock->getSpot();
        $type = $paddock->getType();
        $dirtiness = $paddock->getDirtiness();

        try {
            $updatePaddock = $this->db->prepare('UPDATE paddocks SET size = :size, spot = :spot, type = :type, dirtiness = :dirtiness WHERE id = :id');
            $updatePaddock->execute([
                ':size' => $size,
                ':spot' => $spot,
                ':type' => $type,
                ':dirtiness' => $dirtiness,
                ':id' => $id
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_PaddockManager_updatePaddocks'] = $ex;
            header('Location: ../public/home.php?redirectFrom=PaddockManager&info=dbUpdatePaddockFailed');
        }
    }

    public function dbDeletePaddock(int $id): void
    {
        try {
            $deletePaddock = $this->db->prepare('DELETE FROM paddocks WHERE id = :id');
            $deletePaddock->execute([
                ':id' => $id,
            ]);
        } catch (\PDOException $ex) {
            $_SESSION['ex_PaddockManager_deletePaddock'] = $ex;
            header('Location: ../public/home.php?redirectFrom=PaddockManager&info=dbDeletePaddockFailed');
        }
    }


    public function getPaddockFromDb(int $id): Paddock
    {
        try {
            $getPaddockFromDb = $this->db->prepare('SELECT * FROM paddocks WHERE id = :id');
            $getPaddockFromDb->execute([
                ':id' => $id
            ]);
            $paddockFromDb = $getPaddockFromDb->fetch();
        } catch (\PDOException $ex) {
            $_SESSION['ex_paddockManager_getAllIds'] = $ex;
        }

        $paddock = new Paddock();
        $paddock->hydrate($paddockFromDb);
        return $paddock;
    }


    public function getAllPaddocksFromDb(int $zooId): array
    {
        try {
            $getPaddockFromDb = $this->db->prepare('SELECT * FROM paddocks WHERE zooId = :zooId');
            $getPaddockFromDb->execute([
                ':zooId' => $zooId
            ]);
            $paddockFromDb = $getPaddockFromDb->fetchAll();
        } catch (\PDOException $ex) {
            $_SESSION['ex_paddockManager_getAllIds'] = $ex;
        }
        return $paddockFromDb;
    }


    private function getRandomIdForNewPaddock(): int
    {
        try {
            $getAllIds = $this->db->prepare('SELECT * FROM paddocks');
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

    public function buyPaddockAndUpdateDb(Zookeeper $zookeeper, Zoo $zoo, Paddock $paddock, ZookeeperManager $zookeeperManager) : int
    {
        $balance = $zookeeper->getMoney();
        $type = $paddock->getType();
        $zooId = $zoo->getId();
        $zooSize = $zoo->getSize();
        $allPaddocks = $this->getAllPaddocksFromDb($zooId);

        if($zooSize<=count($allPaddocks))
        {
            return $balance;
        }

        switch ($type) {
            case 'aquatic':
                if ($balance >= $this::AQUATIC_PADDOCK_PRICE) {
                    $zookeeper->setMoney($balance - $this::AQUATIC_PADDOCK_PRICE);
                    $paddock = $this->dbInsertPaddock($paddock, $zooId);
                    $balance = $zookeeper->getMoney();
                    $zookeeperManager->dbUpdateZookeeper($zookeeper);
                    return $balance;
                } else {
                    return $balance;
                }
                break;
            case 'semiaquatic':
                if ($balance >= $this::SEMIAQUATIC_PADDOCK_PRICE) {
                    $zookeeper->setMoney($balance - $this::SEMIAQUATIC_PADDOCK_PRICE);
                    $paddock = $this->dbInsertPaddock($paddock, $zooId);
                    $balance = $zookeeper->getMoney();
                    $zookeeperManager->dbUpdateZookeeper($zookeeper);
                    return $balance;
                } else {
                    return $balance;
                }
                break;
            case 'terrestrial':
                if ($balance >= $this::TERRESTRIAL_PADDOCK_PRICE) {
                    $zookeeper->setMoney($balance - $this::TERRESTRIAL_PADDOCK_PRICE);
                    $paddock = $this->dbInsertPaddock($paddock, $zooId);
                    $balance = $zookeeper->getMoney();
                    $zookeeperManager->dbUpdateZookeeper($zookeeper);
                    return $balance;
                } else {
                    return $balance;
                }
                break;
            case 'volatile':
                if ($balance >= $this::VOLATILE_PADDOCK_PRICE) {
                    $zookeeper->setMoney($balance - $this::VOLATILE_PADDOCK_PRICE);
                    $paddock = $this->dbInsertPaddock($paddock, $zooId);
                    $balance = $zookeeper->getMoney();
                    $zookeeperManager->dbUpdateZookeeper($zookeeper);
                    return $balance;
                } else {
                    return $balance;
                }
                break;
            default:
                return $balance;
                break;
        }
    }
}
