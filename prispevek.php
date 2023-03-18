<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>Forum</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="body.css">
        <style>
            .komentar{
                margin-left:25%;
                margin-right:25%;
            }
            #prispevek{
                width:100%;
                height:300px;
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
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="projekt.php">O projektu</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="flappybird.php">Hra</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="#">Forum</a>
                  </li>
                </ul>
                <?php
                if(!$_SESSION["valid"])
                {
                    echo("<ul class='nav nav-pills nav-fill ml-auto'>");
                    echo("<li class='nav-item' id='li'><a class='nav-link text-danger font-weight-bold' href='login.php'>Log-in</a>
                    </li>");
                    echo("<li class='nav-item' id='li'><a class='nav-link text-danger font-weight-bold' href='registrace.php'>Sign up</a>
                    </li>");
                    echo("</ul>");
                }
                else
                {
                    echo("<ul class='nav nav-pills nav-fill ml-auto'>");
                    //echo("<div class='dropdown'>");
                    //echo("<span class='pozdrav'>Hi, ".$_SESSION['username']."</span>");
                    //echo("<div class='dropdown-content'>");
                    echo("<li class='nav-item' id='li'><a class='nav-link text-danger font-weight-bold' href='logout.php'>Logout</a>");
                    echo("</li>");
                    echo("</ul>");
                    //echo("</div>");
                    //echo("</div>");
                }
                ?>
            </div>
        </nav>
        <div class="komentar">
            <h2 style="margin-top:10px">Vytvoření příspěvku</h2>
            <form action="vkladani.php" method="post">
                <textarea id="prispevek" type ="text" name="prispevek" required></textarea><br>
                <?php
                if($_SESSION["valid"])
                echo("<input type='submit' value='Odeslat příspěvek' id='button'>");
                else 
                {
                    echo("<input type='submit' value='Odeslat příspěvek' id='button' disabled='disabled' style='cursor:not-allowed'>");
                    echo("<p>Pro založení příspěvku si musíš vytvořit účet.");
                }
                ?>
            </form>
        </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <footer class="footer" style="position:fixed">
        <p>
            Dolák Denis<br>
            ITA4<br>
            dolakd.04@spst.eu
        </p>
    </footer>    
</body>
</html>