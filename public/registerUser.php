<?php

session_start();

require_once __DIR__ . "/../app/Controllers/UsersController.php";
require_once __DIR__ . "/../helpers.php";
require_once __DIR__ . '/../app/auth/Authenticate.php';

$request = $_REQUEST;
$request['files'] = $_FILES;

$user = new UsersController();
$user->store($request);

$auth = new Authenticate();
if($_POST){
    $auth->login($_POST);
}else{
    view(__DIR__ . '/../../Views/users/register_form.php');
}

header('Location: index.php');