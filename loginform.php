<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="formlog.css">
</head>
<body>
        <div class="login">
            <div class="form">
                <header>Login Page</header>
                <form action="login-check.php" method="post">
                    <input type="text" name="usertype" placeholder="Usertype">
                    <input type="password" name="password" placeholder="Password">
                    <p>
                        <?php
                        error_reporting(0);
                        session_start();
                        if (isset($_SESSION['loginMessage'])) {
                            echo $_SESSION['loginMessage'];
                            unset($_SESSION['loginMessage']);
                        }
                        ?>
                    </p>
                    <input type="submit" class="button" value="Login">
                </form>
            </div>
        </div>
</body>
</html>
