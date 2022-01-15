<?php
//start session and require needed files
session_start();
require_once('error.php');
require_once('database.php');
if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
    //check login and password + sanityze
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if(!ctype_alnum($login)) Err::throwError('Login has to be aplhanumeric!', 'registration.php');
    if(strlen($login)<4 || strlen($login)>20) Err::throwError('Login must be between 4 and 20 characters', 'registration.php');
    if(strlen($password)<8) Err::throwError('Password must have more than 8 characters', 'registration.php');
    if(!($password === $confirmPassword)) Err::throwError('Password and confirm password have to be the same', 'registration.php');
    $database = new Database;
    if($database->isUserExist($login)) Err::throwError('This login already exists, choose another', 'registration.php');
    $password = password_hash($password, PASSWORD_DEFAULT);
    //insert user
    if($database->addUser($login, $password)){
        $_SESSION['success'] = true;
        header('Location: success.php');
        exit;
    } else Err::throwError('Failed to add user', 'registration.php');
    unset($database);
} else {
    Err::throwError('Wrong request parameters', 'registration.php');
}
?>