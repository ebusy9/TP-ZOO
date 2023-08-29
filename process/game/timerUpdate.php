<?php

use classes\ZooManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=nextHour&info=notLoggedIn');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$manager = new ZooManager($db, $_SESSION['zooId']);
$updatde = $manager->nextHour();


echo json_encode($updatde);
