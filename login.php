<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="body.css">
        <link rel="stylesheet" href="form.css">
        <style>
        html {
            margin:0;
            height:100%;
        }
            body{
                text-align:center;
                min-height:100%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav nav-pills nav-fill">
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/projekt.php">O projektu</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/flappybird.php">Hra</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/forum.php">Fórum</a>
                  </li>
                </ul>
                <ul class='nav nav-pills nav-fill ml-auto'>
                    <li class='nav-item' id='li'><a class='nav-link active text-danger font-weight-bold' href='login.php'>Log-in</a>
                    </li>
                    <li class='nav-item' id='li'><a class='nav-link text-danger font-weight-bold' href='registrace.php'>Sign up</a>
                    </li>
                    </ul>
            </div>
        </nav>
        <div class="box">
            <form method="post"><br>
                <label for="username"><b>Username:</b></label><br>
                <input type="text" id="username" name="username"><br><br>
                <label for="password"><b>Password:</b></label><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Log-in" id="button"><br><br>
            </form>
            <b><a href="http://dolak-denis.mzf.cz/php/FlappyBird/registrace.php">Create an account</a></b>
            <br>
        </div>
        <?php
        $con = mysqli_connect("localhost","dolakd04","TEST123TEST","ropdolak");
        if($con && $_POST)
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $_SESSION["valid"] = false;
            $sql = "SELECT*FROM uzivatele WHERE username = '$username'";
            $uzivatele = mysqli_query($con, $sql);
            foreach($uzivatele as $udaje)
            {
                if($udaje['username'] == $username)
                {
                    if(password_verify($password, $udaje['password']))
                    {
                        $_SESSION["valid"] = true;
                        $_SESSION["username"] = $udaje['username'];
                        $_SESSION["email"] = $udaje['email'];
                    }
                }
                else $_SESSION["valid"] = false;
            }
            if(!$_SESSION["valid"])echo("<b>Wrong password or username!</b>");
            else
            {
                echo("<b>Successfully logged in as ".$username."</b><br>");
                Header("Refresh:2; url=projekt.php");
            }
        }
        ?>
        <footer class="footer" style="position: fixed">
            <p>
                Dolák Denis<br>
                ITA4<br>
                dolakd.04@spst.eu
            </p>
        </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>