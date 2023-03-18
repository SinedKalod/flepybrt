<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>Registrace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="body.css">
        <link rel="stylesheet" href="form.css">
        <style>
            body{
                text-align:center;
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
                <ul class="nav nav-pills nav-fill ml-auto">
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/login.php">Log-in</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link active text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/registrace.php">Sign up</a>
                  </li>
                </ul>
            </div>
        </nav>
        <div class="box">
            <form method="post">
                <label for="username"><b>Username:</b></label><br>
                <input type="text" id="username" name="username" placeholder="Username" required autofocus><br>
                <label for="email"><b>Email:</b></label><br>
                <input type="email" id="email" name="email" placeholder="E-mail"required><br>
                <label for="password"><b>Password:</b></label><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br>
                <label for="passwordznovu"><b>Confirm password:</b></label><br>
                <input type="password" id="passwordznovu" name="passwordznovu" placeholder="Confirm password" required><br><br>
                <input type="submit" value="Log-in" id="button"> 
            </form>
        </div>
    <?php
    $con = mysqli_connect("localhost","dolakd04","TEST123TEST","ropdolak");
    if($con && $_POST)
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordagain = $_POST['passwordznovu'];
        $sql = "SELECT * FROM uzivatele
        WHERE username='$username'
        OR email='$email'";
        $uzivatele = mysqli_query($con, $sql);
        if(mysqli_num_rows($uzivatele) > 0)
        {
            echo("Username or email is already in use");
        }
        else
        {
            if($password == $passwordagain)
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO uzivatele (username, email, password) VALUES
                ('$username', '$email', '$password')";
                mysqli_query($con, $sql);
                echo("Successfully registered!");
                echo("<br>Redirecting to login...");
                header("Refresh:2; url=http://dolak-denis.mzf.cz/php/FlappyBird/login.php");
            }
            else
            {
                echo("Passwords don't match!");
            }
        }
    }
    ?>
    <footer class="footer" style="position:fixed">
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