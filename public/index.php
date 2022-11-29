<?php

session_start();

require_once __DIR__ . "/../app/Controllers/ImagesController.php";
require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../helpers.php";
require_once __DIR__ . "/../Message.php";

if (!($_SESSION['is_authenticated'] ?? '')) {
    header('Location: login.php');
}

$image = new ImagesController();
$image->index();

$message = new Message();
$message->errors();



