<?php

session_start();

require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../app/Controllers/OwnersController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$user = new UsersController();
$user->index();

$owner = new OwnersController();


