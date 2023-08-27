<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!isset($_SESSION['idUser'])) {
    header('Location: ../../index.php?redirectFrom=home&info=notLoggedIn');
    exit();
}

try {
    $getCharList = $db->prepare('SELECT * FROM zookeepers WHERE user_id = :user_id');
    $getCharList->execute([
        ':user_id' => $_SESSION['idUser'],
    ]);
    $charList = $getCharList->fetchAll();
} catch (\PDOException $ex) {
    $_SESSION['ex_home_getCharList'] = $ex;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Char</title>
</head>

<body>
    <button onclick="window.location.href='../process/logout.php';">Log Out</button>
    <fieldset>
        <legend>Char creation</legend>
        <form action="../process/zookeeperCreation.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="nonbinary" selected>Non-binary</option>
            </select>
            <br>
            <label for="gender">Age:</label>
            <input type="number" name="age" min="1" max="99" required>
            <br>
            <input type="submit" value="submit">
        </form>
    </fieldset>
    <fieldset>
        <legend>Char selection</legend>
        <?php
        foreach ($charList as $key => $value) {
            echo <<<HTML
            <div>
                <form action="play.php" method="POST">
                <h4>{$value['name']}</h4>
                <p>{$value['gender']}</p>
                <p>Age: {$value['age']}</p>
                <p>Money: {$value['money']}$</p>
                <input type="number" name="zookeeperId" value="{$value['id']}" hidden required>
                <input type="number" name="money" value="{$value['money']}" hidden required>
                <input type="submit" value="SELECT">
        </form>
        <form action="../process/zookeeperDelete.php" method="POST">
        <input type="number" name="deleteZookeeperId" value="{$value['id']}" hidden required>
                <input type="submit" value="DELETE">
        </form>
        </div>
        HTML;
        };
        ?>
    </fieldset>
</body>

</html>