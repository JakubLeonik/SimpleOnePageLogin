<?php
//check if user is logged - if yes, redict user to home
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="container" class="col-12 vh-100">
        <header class="col-12 text-center text-white p-5">Simple One Page Login</header>
        <main class="mx-auto text-dark d-flex py-5 justify-content-center text-center col-10">
            <form action="login.php" method="POST" class="col-sm-8 col-md-6 col-lg-4 text-center">
                <input type="text" name="login" placeholder="Login" pattern="[a-zA-Z0-9]+" class="w-100" required /> <br /><br />
                <input type="password" name="password" placeholder="Password" class="w-100" required /> <br /><br />
                <input type="submit" value="Log in" class="w-75"/> <br /><br />
                <?php
                    //show login errors
                    if(isset($_SESSION['error'])){
                        echo '<div class="error">'.$_SESSION['error'].'</div><br />';
                        unset($_SESSION['error']);
                    }
                ?>
                <a class="text-dark" href="registration.php">Registration</a>
            </form>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>