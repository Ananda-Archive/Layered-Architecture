<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\controller\UserLogin.php';

if($_GET) {
    $login = new UserLogin();

    $login->get($_GET["id"]);
}