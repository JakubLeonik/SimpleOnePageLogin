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
                <input type="text" pattern="[A-Za-z0-9]" required />
                <input type="password" pattern="[A-Za-z0-9]" required />
                <input type="submit" value="Log in"/>
            </form>
        </main>
    </div>
</body>
</html>