<?php

use classes\PaddockManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=userAction&info=notLoggedIn');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$paddockManager = new PaddockManager($db);
$paddocks = $paddockManager->getAllPaddocksFromDb($_SESSION['zooId']);

$paddocksHtml = '';
foreach ($paddocks as $key => $value) {
    $paddocksHtml = $paddocksHtml . ' ' . "<div class='paddock'>
    <p>id: {$value['id']}<p>
    <p>size: {$value['size']}<p>
    <p>spot: {$value['spot']}<p>
    <p>type: {$value['type']}<p>
    <p>dirtiness: {$value['dirtiness']}<p>
    <div>";
}

echo json_encode($paddocksHtml);