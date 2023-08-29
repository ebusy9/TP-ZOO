<?php

use classes\ZookeeperManager;
use classes\ZooManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=userAction&info=notLoggedIn');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$zookeeperManager = new ZookeeperManager($db);
$zooManager = new ZooManager($db);
$zookeeper = $zookeeperManager->getZookeeperFromDb($_SESSION['zookeeperId']);


if (isset($data['get_inventory'])) {
    $inventory = $zookeeperManager->getInventory($zookeeper);
    echo json_encode($inventory);
}


if (isset($data['item_bought'])) {
    $balance = $zookeeper->getMoney();
    switch ($data['item_bought']) {
        case 'PiscivoreFood':
            $balance = $zookeeperManager->buyPiscivoreFoodAndUpdateDb($zookeeper);
            break;
        case 'FilterFeedFood':
            $balance = $zookeeperManager->buyFilterFeedFoodAndUpdateDb($zookeeper);
            break;
        case 'HerbivoreFood':
            $balance = $zookeeperManager->buyHerbivoreFoodAndUpdateDb($zookeeper);
            break;
        case 'CarnivoreFood':
            $balance = $zookeeperManager->buyCarnivoreFoodAndUpdateDb($zookeeper);
            break;
        case 'Water':
            $balance = $zookeeperManager->buyWaterAndUpdateDb($zookeeper);
            break;
        case 'FirstAidKit':
            $balance = $zookeeperManager->buyFirstAidKitAndUpdateDb($zookeeper);
            break;

        default:
            $balance = $zookeeper->getMoney();
            break;
    }
    echo json_encode($balance);
}


if(isset($data['paddock_bought'])){
    switch ($data['paddock_bought']) {
        case 'AquaticPaddock':
            $balance = $zookeeperManager->buyPiscivoreFoodAndUpdateDb($zookeeper);
            break;
        case 'SemiAquaticPaddock':
            $balance = $zookeeperManager->buyFilterFeedFoodAndUpdateDb($zookeeper);
            break;
        case 'TerrestrialPaddock':
            $balance = $zookeeperManager->buyHerbivoreFoodAndUpdateDb($zookeeper);
            break;
        case 'VolatilePaddock':
            $balance = $zookeeperManager->buyCarnivoreFoodAndUpdateDb($zookeeper);
            break;
        default:
            $balance = $zookeeper->getMoney();
            break;
    }
    echo json_encode($balance);
}