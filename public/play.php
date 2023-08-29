<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=play&info=notLoggedIn');
    exit();
}

if (isset($_POST['zookeeperId'])) {
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
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <button onclick="window.location.href='../process/logout.php';">Log Out</button>
    <button id="storeBtn">Store</button>
    <button id="inventoryBtn">Inventory</button>
    <button id="nextDayBtn" hidden>Next Day</button>
    <p id="balance"><?= $_SESSION['money'] ?></p>
    <div id="timer">00:00</div>
    <div id="inventory" hidden>
        <fieldset>
            <legend>Inventory</legend>
            <ul id="inventoryList"></ul>
        </fieldset>
    </div>
    <div id="store" hidden>
        <fieldset>
            <legend>Store</legend>
            <button id="consumableStoreBtn">Consumable</button>
            <button id="paddockStoreBtn">Paddocks</button>
            <div id="consumableStore">
            <p>Piscivore food <button id="buyPiscivoreF">23g</button></p>
            <p>Filter feed food <button id="buyFilterFeedF">20g</button></p>
            <p>Herbivore food <button id="buyHerbivoreF">18g</button></p>
            <p>Carnivore food <button id="buyCarnivoreF">27g</button></p>
            <p>Water <button id="buyWater">10g</button></p>
            <p>First Aid Kit <button id="buyFirstAidKit">75g</button></p>
            </div>
            <div id="paddockStore" hidden>
            <p>Aquatic Paddock <button id="buyAquaticPaddock">750g</button></p>
            <p>Semi-aquatic Paddock <button id="buySemiAquaticPaddock">750g</button></p>
            <p>Terrestrial Paddock <button id="buyTerrestrialPaddock">750g</button></p>
            <p>Volatile Paddock <button id="buyVolatilePaddock">750g</button></p>
            </div>
        </fieldset>
    </div>
    <div class="paddock">

    </div>
    <script src="../assets/js/play.js"></script>
</body>

</html>