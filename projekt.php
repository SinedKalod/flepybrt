<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>Popis projektu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="body.css">
        <style>
            .obsah{
                margin-left:25%;
                margin-right:25%;
                padding:10px;
                font-size:20px;
                height:85.8vh;
            }
            .text{
                border:10px solid black;
                padding:10px;
            }
            .dropdown {
              position: relative;
              display: inline-block;
            }
            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f9f9f9;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              padding: 12px 16px;
              z-index: 1;
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
                  <li class="nav-item" id="li"><a class="nav-link active text-danger font-weight-bold" href="#">O projektu</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="flappybird.php">Hra</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="forum.php">Forum</a>
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
        <div class="obsah">
            <h1>Flappy Bird</h1>
            <p class="text">Hra Flappy Bird vytvořena za účelem maturitní práce oboru Informační technologie.
            Princip hry je překonat překážky za ptáčka a nasbírat co největší skóre.
            Top 10 hráčů, kteří mají největší skóre, mají tu čest být zapsáni do tabulky, aby ostatní hráči měli přehled, jaké skóre musí překonat, aby se dostali do tabulky.</p>
        </div>
        <footer class="footer">
            <p>
                Dolák Denis<br>
                ITA4<br>
                dolakd.04@spst.eu
            </p>
        </footer>
    </body>
</html>