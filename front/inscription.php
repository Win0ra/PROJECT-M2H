<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/styles-inscription.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="get">
        <div class="content">
            <h1 class="h1-inscri">Inscrivez-vous</h1>

            <!-- INFORMATIONS PERSOS -->

            <div class="infos-perso">
                <div class="gauche">


                    <h3>Prénom</h3>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

                    <h3>E-mail</h3>
                    <input type="email" name="email" id="email" placeholder="MonsieurBouzin@gmail.com" required>

                    <h3>Mot de passe</h3>
                    <input type="password" name="password" id="password" placeholder="****************" class="center-placeholder" required>

                    <h3>Sexe</h3>
                    <div class="select-sexe">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="sexe" id="sexe" required>
                            <option value="" disabled selected hidden>Votre sexe ?</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>

                </div>

                <div class="droite">
                    <h3>Nom</h3>
                    <input type="text" name="nom" id="nom" placeholder="Nom">

                    <h3>Pseudo</h3 required>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Le-plus-grand-des-bouzins">

                    <h3>Confirmer le mot de passe</h3 required>
                    <input type="password" name="password" id="password" placeholder="****************" class="center-placeholder">

                    <h3>Age (ans)</h3>
                    <input type="number" name="age" id="age" required placeholder="18">
                </div>
            </div>

            <!-- CARTES CENTRES D'INTERETS -->

            <h3>Centre d'intérêts</h3>
            <div class="centres interets">
                <div class="card-ci"><i class="fa-solid fa-basketball"></i>
                    <p class="txt-carte">Sport</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-flask-vial"></i>
                    <p class="txt-carte">Science</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-music"></i>
                    <p class="txt-carte">Music</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-video"></i>
                    <p class="txt-carte">Film</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-feather"></i>
                    <p class="txt-carte">Histoire</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-earth-americas"></i>
                    <p class="txt-carte">Géographie</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-gamepad"></i>
                    <p class="txt-carte">Jeux Vidéos</p>
                </div>
            </div>

            <!-- FIN DU FORMULAIRE -->

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" required>
                <p class="cgu">J'accepte les Conditions Générales d'Utilisation et la Politique de Confidentialité.
                    Je reconnais que mes données seront traitées conformément à cette politique.
                    Je comprends que je peux me désinscrire à tout moment.</p>
            </div>
            <a href="./index.php"> <button class="inscription"> <i class="fa-solid fa-pen-to-square" id=" i-white"></i>
                    <p class="txt-inscription">Inscription</p>
                </button></a>
        </div>
    </form>
</body>

</html>

<?php

include './footer.php';

?>