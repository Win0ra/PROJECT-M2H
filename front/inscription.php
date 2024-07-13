<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles-inscription.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="">
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
                    <input type="password" name="password" id="password" placeholder="****************"
                        class="center-placeholder" required>

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
                    <input type="password" name="password" id="password" placeholder="****************"
                        class="center-placeholder">

                    <h3>Age (ans)</h3>
                    <input type="text" name="age" id="age" required>
                </div>
            </div>

            <!-- CARTES CENTRES D'INTERETS -->

            <h3>Centre d'inttérêts</h3>
            <div class="centres interets">
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
                <div class="card-ci"><i class="fa-solid fa-basketball"></i><p class="txt-carte">Sport</p></div>
            </div>

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" required>
                <p class="cgu">J'accepte les Conditions Générales d'Utilisation et la Politique de Confidentialité.
                    Je reconnais que mes données seront traitées conformément à cette politique.
                    Je comprends que je peux me désinscrire à tout moment.</p>
            </div>
            <button class="inscription">Inscription</button>
        </div>
    </form>
</body>

</html>

<?php

include './footer.php';

?>