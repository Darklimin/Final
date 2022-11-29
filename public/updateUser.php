<?php

session_start();

require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$user = new UsersController();
$user->update($_REQUEST);

header('Location: index.php');