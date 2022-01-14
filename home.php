<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home of Simple One Page Login</title>
</head>
<body>
    <div id="container">
        <header>Home of Simple One Page Login</header>
        <main>
            <?php
                echo 'Hello '.$_SESSION['user_login'].'! [<a href="logout.php"> Logout </a>] <br />';
                echo 'Now, you have access to you secret and private things!';

            ?>
        </main>
    </div>
</body>
</html>