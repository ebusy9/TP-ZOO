<?php

class timeManager
{
    public function __construct(
        private \PDO $db,
        private int $zooId
    ) {
        $this->db = $db;
        $this->zooId = $zooId;
    }

    public function nextHour()
    {
        try {
            $prepEntities = $this->db->prepare('SELECT * FROM entities WHERE zoo_id = :zoo_id ');
            $prepEntities->execute([
                'zoo_id' => $this->zooId,
            ]);
            $entities = $prepEntities->fetchAll();
        } catch (\Throwable $th) {
            $_SESSION['ERROR_plusOneHour_entities'] = $th;
        }

        try {
            $prepPaddocks = $this->db->prepare('SELECT * FROM paddocks WHERE zoo_id = :zoo_id ');
            $prepPaddocks->execute([
                'zoo_id' => $this->zooId,
            ]);
            $paddocks = $prepPaddocks->fetchAll();
        } catch (\Throwable $th) {
            $_SESSION['ERROR_plusOneHour_paddocks'] = $th;
        }
    }

    public function nextDay()
    {
        
    }
}
