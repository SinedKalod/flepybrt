<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>Forum</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="body.css">
        <style>
            .prispevky{
                margin-top:20px;
                margin-left:25%;
                margin-right:25%;
            }
            .obsah{
                margin-top:55px;
                margin-bottom:20px;
                border: 3px solid white;
                padding:10px;
                background-color:rgba(0, 0, 0, 0.8);
                font-weight:bold;
            }
            .uzivatel{
                width:100%;
                padding-bottom:5px;
                border-bottom:3px solid white;
                display:inline-flex;
            }
            .jmeno{
                font-size:1.8em;
                width:50%;
                float:left;
            }
            .datum{
                width:50%;
                float:right;
            }
            .comment_button{
                float:right;
                text-decoration:none;
                color:white;
                padding:10px 25px;
                background-color:rgba(34, 29, 40, 0.8);
                border-radius:9px 9px 9px 9px;
            }
            .comment_button:hover{
                text-decoration:none;
                color:white;
                background-color:black;
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
                  <li class="nav-item" id="li"><a class="nav-link active text-danger font-weight-bold" href="#">Forum</a>
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
                    echo("<div class='dropdown'>");
                    echo("<div class='dropdown-content'>");
                    echo("<li class='nav-item' id='li'><a class='nav-link text-danger font-weight-bold' href='logout.php'>Logout</a>");
                    echo("</li>");
                    echo("</ul>");
                    echo("</div>");
                    echo("</div>");
                    echo("<span class='pozdrav'>Hi, ".$_SESSION['username']."</span>");
                }
                ?>
            </div>
        </nav>
        <div class="prispevky">
            <h1 style="text-align:center;">Příspěvky</h1>
            <a class="comment_button" href="prispevek.php">Vytvořit příspěvek</a>
            <?php
                $con = mysqli_connect("localhost","dolakd04","TEST123TEST","ropdolak");
                $sql = "SELECT * FROM forum ORDER BY date DESC";
                $data = mysqli_query($con, $sql);
                //Výpis příspěvků
                if(mysqli_num_rows($data) > 0)
                {
                    while($row = mysqli_fetch_assoc($data))
                    {
                        echo("<div class='obsah'>");
                        echo("<div class='uzivatel'>");
                        echo("<div class='jmeno'>".$row['username']."</div>");
                        echo("<div class='datum'><p style='float:right'>".$row['date']."</p></div></div>");
                        echo("<p>".$row['prispevek']."</p>");
                        echo("</div>");
                    }
                }
                else echo("Zatím nejsou zde nejsou žádné příspěvky!");
            ?>
        </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <footer class="footer">
            <p>
                Dolák Denis<br>
                ITA4<br>
                dolakd.04@spst.eu
            </p>
        </footer>
    </body>
</html>