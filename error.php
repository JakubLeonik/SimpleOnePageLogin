<?php
class Err{
    //function to throw errors
    public static function throwError($errorMessage, $throwAddress){
        session_start();
        $_SESSION['error'] = $errorMessage;
        header("Location: $throwAddress");
        exit;
    }
}
?>