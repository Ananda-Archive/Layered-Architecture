<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\controller\UserLogin.php';

if($_POST) {
    $login = new UserLogin();

    $login->login($_POST['username'],$_POST['password']);
}