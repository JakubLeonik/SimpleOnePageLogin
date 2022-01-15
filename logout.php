<?php
//destro session and redict user to login page
    session_start();
    session_destroy();
    header('Location: index.php');
    exit();
?>