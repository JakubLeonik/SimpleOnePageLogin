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
    unset($database);
} else {
    Err::throwError('Wrong request parameters', 'index.php');
}
?>