<?php
//start session and require needed files
session_start();
require_once('error.php');
require_once('database.php');
if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if(!ctype_alnum($login)) Err::throwError('Login has to be aplhanumeric!', 'registration.php');
    $database = new Database;
    if($database->addUser($login, $password)){
        header('Location: succes.php');
        exit;
    } else Err::throwError('Failed to add user', 'registration.php');
    unset($database);
} else {
    Err::throwError('Wrong request parameters', 'registration.php');
}
?>