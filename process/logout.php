<?php

session_start();
setcookie('stayLoggedIn', false, -1, '/');
setcookie('id', false, -1, '/');
setcookie('username', false, -1, '/');
session_destroy();

header ("Location: ../index.php");
exit();