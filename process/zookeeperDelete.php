<?php

use classes\ZookeeperManager;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';


if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=zookeeperDelete&info=notLoggedIn');
    exit();
}


$zookeeperManager = new ZookeeperManager($db);

$zookeeperAfterInsert = $zookeeperManager->dbDeleteZookeeper($_POST['deleteZookeeperId']);

header('Location: ../public/home.php?redirectFrom=zookeeperDelete&info=zookeeperDeleteSuccess');