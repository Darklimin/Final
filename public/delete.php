<?php

session_start();

require_once __DIR__ . "/../app/Controllers/ImagesController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$image = new ImagesController();
$image->delete($_REQUEST['id']);

header('Location: index.php');