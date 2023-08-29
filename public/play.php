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
    $_SESSION['zooId'] = $_POST['zooId'];
    $_SESSION['currentDay'] = $_POST['currentDay'];
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
    <div id="currentDay">Day <?= $_SESSION['currentDay'] ?></div>
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
            <button id="animalStoreBtn">Animals</button>
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
            <div id="animalStore" hidden>
            <label for="paddockSelect">Choose a paddock:</label>
                <select id="paddockSelect"></select>
                <div id="buyAquatic">
                <p>Elasmosaurus <button id="buyElasmosaurus">23g</button></p>
                <p>Ichthyosaurus <button id="buyIchthyosaurus">23g</button></p>
                <p>Kronosaurus <button id="buyKronosaurus">23g</button></p>
                <p>Liopleurodon <button id="buyLiopleurodon">23g</button></p>
                <p>Mosasaurus <button id="buyMosasaurus">23g</button></p>
                <p>Plesiosaurus <button id="buyPlesiosaurus">23g</button></p>
                </div>
                <div id="buySemiAquatic">
                <p>Baryonyx <button id="buyBaryonyx">23g</button></p>
                <p>Irritator <button id="buyIrritator">23g</button></p>
                <p>Sarcosuchus <button id="buySarcosuchus">23g</button></p>
                <p>Spinosaurus <button id="buySpinosaurus">23g</button></p>
                <p>Suchomimus <button id="buySuchomimus">23g</button></p>
                <p>Suchosaurus <button id="buySuchosaurus">23g</button></p>
                </div>
                <div id="buyTerrestrial">
                <p>Allosaurus <button id="buyAllosaurus">23g</button></p>
                <p>Brachiosaurus <button id="buyBrachiosaurus">23g</button></p>
                <p>Stegosaurus <button id="buyStegosaurus">23g</button></p>
                <p>Triceratops <button id="buyTriceratops">23g</button></p>
                <p>Tyrannosaurus Rex <button id="buyTyrannosaurusRex">23g</button></p>
                <p>Velociraptor <button id="buyVelociraptor">23g</button></p>
                </div>
                <div id="buyVolatile">
                <p>Archaeopteryx <button id="buyArchaeopteryx">23g</button></p>
                <p>Dimorphodon <button id="buyDimorphodon">23g</button></p>
                <p>Pteranodon <button id="buyPteranodon">23g</button></p>
                <p>Pterodaustro <button id="buyPterodaustro">23g</button></p>
                <p>Quetzalcoatlus <button id="buyQuetzalcoatlus">23g</button></p>
                <p>Rhamphorhynchus <button id="buyRhamphorhynchus">23g</button></p>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="zoo">
        <div class="paddock">

        </div>
    </div>
    <script src="../assets/js/play.js"></script>
</body>

</html>