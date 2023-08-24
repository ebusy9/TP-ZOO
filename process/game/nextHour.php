<?php

session_start();

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=nextDay&info=notLoggedIn');
    exit();
}

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

$data = json_decode(file_get_contents('php://input'), true);

$manager = new timeManager($db, $_SESSION['zooId']);
$updatde = $manager->nextHour();


echo json_encode($updatde);
