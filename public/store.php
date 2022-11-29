<?php

session_start();

require_once __DIR__ . "/../app/Controllers/ImagesController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$request = $_REQUEST;
$request['files'] = $_FILES;

$image = new ImagesController();
$image->store($request);

header('Location: index.php');