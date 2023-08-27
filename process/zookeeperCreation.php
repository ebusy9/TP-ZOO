<?php

use classes\Zookeeper;
use classes\ZookeeperManager;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';


if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=zookeeperCreation&info=notLoggedIn');
    exit();
}


$zookeeperManager = new ZookeeperManager($db);

$zookeeperAfterInsert = $zookeeperManager->dbInsertZookeeper(new Zookeeper(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['age']), htmlspecialchars($_POST['gender'])), $_SESSION['idUser']);

$_SESSION['zookeeperId'] = $zookeeperAfterInsert->getId();
$_SESSION['money'] = $zookeeperAfterInsert->getMoney();
header('Location: ../public/play.php?redirectFrom=zookeeperCreation&info=zookeeperDbInstertSuccess');