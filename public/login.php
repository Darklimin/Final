<?php

session_start();

require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/auth/Authenticate.php';

$auth = new Authenticate();

if(($_SESSION['is_authenticated'] ?? '')){
    if(($_GET['logout'] ?? '')){
        $auth->logout();
    }

    redirect('index.php');
}

if($_POST){
    $auth->login($_POST);
}else{
    view(__DIR__ . '/../Views/app/auth/login_form.php');
}

