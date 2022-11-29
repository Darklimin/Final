<?php

session_start();

require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../helpers.php";

redirectIfNotAuthenticated('login.php');

$user = new UsersController();
$user->edit($_REQUEST['id']);