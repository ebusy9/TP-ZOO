<?php

use classes\PaddockManager;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

$paddockManager = new PaddockManager($db);

$test = $paddockManager->getAllPaddocksFromDb(63377);

// echo '<pre>';
// print_r($test);
// echo '</pre>';

// echo '<pre>';
// echo count($test);
// echo '</pre>';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

echo json_encode($test);
