<?php
session_start();
if(isset($_SESSION['logged'])){
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple One Page Login</title>
</head>
<body>
    <div id="container">
        <header>Simple One Page Login</header>
        <main>
            <form action="login.php" method="POST">
                <input type="text" name="login" pattern="[a-zA-Z0-9]+" required />
                <input type="password" name="password" required />
                <input type="submit" value="Log in"/>
            </form>
            <?php
                if(isset($_SESSION['error'])){
                    echo '<div class="error">'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                }
            ?>
        </main>
    </div>
</body>
</html>