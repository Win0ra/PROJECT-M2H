<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles-navbar.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="Navbar">
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="./connexion.php">Connexion</a></li>
            <li><a href="./inscription.php">Inscription</a></li>
            <li><a href="./avant-de-jouer.php">Jouer</a></li>
            <li>
                <a href="./ranking.php" class="a-classement" id="classement">Classement</a>
                <i class="fa-solid fa-chevron-right arrow-dropdown"></i>
            </li>
            <a href="./ranking-choice.php" class="dropdown">Classement par thèmes</a>
            <li><a href="./mon-compte.php">Mon Compte</a></li>
        </ul>
        <div class="logo"><a href="./index.php"><i class="fa-brands fa-html5"> LOGO</i></a></div>
    </div>

    <script src="./js/script-navbar.js"></script>
</body>

</html>