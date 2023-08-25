<?php

use classes\TimeManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=nextDay&info=notLoggedIn');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$manager = new TimeManager($db, $_SESSION['zooId']);
$updatde = $manager->nextDay();





echo json_encode($updatde);
