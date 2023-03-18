<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>FlappyBird</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="game.css">
        <script src="script.js" defer></script>
    <style>
        .box{
            position:fixed;
            top:0;
            right:0;
            margin-top:50px;
            margin-right:20px;
            background:rgba(0,0,0,0.5);
            height:20%;
            width: 10%;
            overflow:auto;
            user-select: none;
        }
        .scoreboard{
            color:white;
            font-weight:bold;
        }
    </style>
    </head>
    <body style="overflow: hidden">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav nav-pills nav-fill">
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/projekt.php">O projektu</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link active text-danger font-weight-bold" href="#">Hra</a>
                  </li>
                  <li class="nav-item" id="li"><a class="nav-link text-danger font-weight-bold" href="http://dolak-denis.mzf.cz/php/FlappyBird/forum.php">Fórum</a>
                  </li>
                </ul>
            </div>
        </nav>
        <div class="zprava">
            Levým tlačítkem na myši spustíš hru a také skáčeš.
        </div>
        <div class="skore">
            <span class="vypis"></span>
            <span class="hodnota"></span>
        </div>
        <div class="box">
            <div class="scoreboard">
            <p style="text-align:center; margin-bottom:3px;">Top 10</p>
            <table>
                <tr><td>1.</td></tr>
            </table>
            </div>
        </div>
        <div class="background">
        <img src="bird.png" alt="bird-img" class="bird" id="bird-1">
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>