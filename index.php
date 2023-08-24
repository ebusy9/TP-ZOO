<?php
session_start();
if (isset($_SESSION['idUser'])) {
    header('Location: public/home.php?info=userLoggedIn');
    exit();
} else if (isset($_COOKIE['stayLoggedIn'])) {
    $_SESSION['idUser'] = (int)$_COOKIE['id'];
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: public/home.php?info=userAutoLoggedIn');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
</head>

<body>
    <h1>Prehistoric Zoo</h1>


    <form action="process/login.php" method="POST">
        <fieldset>
            <legend>Log in</legend>
            <div>
                <label for="login">Login :</label>
                <input type="text" name="login" required <?php if (isset($_COOKIE['login'])) {
                                                                                    echo "value=\"{$_COOKIE['login']}\"";
                                                                                } ?>>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="checkbox" name="rememberMe" checked>Remember me</input>
                <input type="checkbox" name="stayLoggedIn">Stay logged in</input>
            </div>
        </fieldset>
        <button type="submit">LogIn!</button>
    </form>

    <br>

    <form action="process/signup.php" method="POST">
        <fieldset>
            <legend>Sign up</legend>
            <div>
                <label for="createUsername">Username :</label>
                <input type="text" name="createUsername" required>
                <ul class="requirementsList" id="usernameRequirements" hidden>
                    <li id="usernameRequirementLenght">Longeur: 2 à 12 caractères</li>
                    <li id="usernameRequirementChars">Caractères autorisés: [A-Z], [a-z], [0-9]</li>
                </ul>
            </div>
            <div>
                <label for="createLogin">Login :</label>
                <input type="text" name="createLogin" required>
                <ul class="requirementsList" id="loginRequirements" hidden>
                    <li id="loginRequirementLenght">Longeur: 6 à 12 caractères</li>
                    <li id="loginRequirementChars">Caractères autorisés: [A-Z], [a-z], [0-9]</li>
                </ul>
            </div>
            <div>
                <label for="createPassword">Password :</label>
                <input type="password" name="createPassword" required>
                <ul class="requirementsList" id="pwdRequirements" hidden>
                    <li id="pwdRequirementLenght">Longeur: 6 à 12 caractères</li>
                    <li id="pwdRequirementLetter">Au moins une lettre</li>
                    <li id="pwdRequirementNumber">Au moins un chiffre</li>
                    <li id="pwdRequirementSpecialChar">Au moins un caractère parmis la liste !@#$%</li>
                </ul>
            </div>
            <div>
                <label for="confirmPassword">Confirm password :</label>
                <input type="password" name="confirmPassword" required>
            </div>
        </fieldset>
        <button type="submit">SignUp!</button>
    </form>
    <script src="assets/js/index.js"></script>
</body>

</html>