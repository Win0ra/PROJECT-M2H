<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/styles-connexion.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content">

        <h1 class="h1-connex">Connectez-vous</h1>
        <h3>Pseudo</h3>
        <form action="" method="get">

            <input type="text" name="pseudo" id="pseudo">
            <h3>Mot de passe</h3>

            <input type="password" name="password" id="password">
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <p class="souvenir">Se souvenir de moi</p>
                <p class="mdp-oublie"><a href="">Mot de passe oublié ?</a></p>
            </div>

            <a href="./index.php"><button class="connexion"><i class="fa-solid fa-user"></i><p class="txt-connexion">Connexion</p></button></a>

            <div class="connex-rs">
                <a href="#"><button class="rs-button"><i class="fa-brands fa-google"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-facebook"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-apple"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-x-twitter"></i></button></a>
            </div>
            
            <div class="no-compte">
                <p class="souvenir">Vous n'avez pas encore de compte ? <a href="./inscription.php">Inscrivez-vous</a></p>
            </div>

        </form>

    </div>
</body>

</html>

<?php

include './footer.php';

?>