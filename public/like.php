<?php

session_start();

require_once __DIR__ . "/../app/Controllers/ImagesController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$image = new ImagesController();
$image->like($_REQUEST);

header('Location: index.php');