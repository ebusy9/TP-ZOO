<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=play&info=notLoggedIn');
    exit();
}

if(isset($_POST['zookeeperId'])){
$_SESSION['zookeeperId'] = $_POST['zookeeperId'];
$_SESSION['money'] = $_POST['money'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play</title>
</head>
<body>
    <button onclick="window.location.href='../process/logout.php';">Log Out</button>
    <button id="storeBtn">Store</button>
    <p id="balance"><?=$_SESSION['money']?></p>
    <div id="store" hidden>
    <fieldset>
            <legend>Store</legend>
        <p>Piscivore food <button id="buyPiscivoreF">23g Buy</button></p>
        <p>Filter feed food <button id="buyFilterFeedF">20g Buy</button></p>
        <p>Herbivore food <button id="buyHerbivoreF">18g Buy</button></p>
        <p>Carnivore food <button id="buyCarnivoreF">27g Buy</button></p>
        <p>Water <button id="buyWater">10g Buy</button></p>
        <p>First Aid Kit <button id="buyFirstAidKit">75g Buy</button></p>
    </fieldset>
    </div>
    <script src="../assets/js/play.js"></script>
</body>
</html>
