<?php
//start session and require needed files
session_start();
require_once('error.php');
require_once('database.php');
//check if user exist and password is correct
if(!empty($_POST['login']) && !empty($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    if(!ctype_alnum($login)) Err::throwError('Login has to be aplhanumeric!', 'index.php');
    $database = new Database;
    $user = $database->checkUser($login, $password);
    if($user == null) Err::throwError('Wrong login or password!', 'index.php');
    else{
        $_SESSION['logged'] = 'logged';
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_login'] = $user['login'];
        header('Location: home.php');
        exit();
    }
    unset($database);
} else {
    Err::throwError('Wrong request parameters', 'index.php');
}
?>