<?php

session_start();

require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../helpers.php";

$user = new UsersController();
$user->register();
