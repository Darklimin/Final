<?php

session_start();

require_once __DIR__ . "/../app/Controllers/ImagesController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$user = new ImagesController();
$user->showMy($_REQUEST['id']);