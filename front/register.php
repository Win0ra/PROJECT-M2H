<?php
include './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/styles-register.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <form action="./my-account.php" method="get">
        <div class="content">
            <h1 class="h1-register">Inscrivez-vous</h1>

            <!-- INFORMATIONS PERSOS -->

            <div class="infos-perso">
                <div class="left">


                    <h3>Prénom</h3>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

                    <h3>E-mail</h3>
                    <input type="email" name="email" id="email" placeholder="MonsieurBouzin@gmail.com" required>

                    <h3>Mot de passe</h3>
                    <input type="password" name="password" id="password" placeholder="****************" class="center-placeholder" required>

                    <h3>Genre</h3>
                    <div class="select-sex">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="sexe" id="sexe" required>
                            <option value="" disabled selected hidden>Votre genre ?</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="femme">Autre</option>
                        </select>
                    </div>

                </div>

                <div class="right">
                    <h3>Nom</h3>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>

                    <h3>Pseudo</h3 required>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Le-plus-grand-des-bouzins" required>

                    <h3>Confirmer le mot de passe</h3>
                    <input type="password" name="password" id="password-confirm" placeholder="****************"  required 
                    class="center-placeholder" onpaste="return false;" oncopy="return false;" oncut="return false;" autocomplete="off">

                    <h3>Age (ans)</h3>
                    <input type="number" name="age" id="age" required placeholder="18" required>
                </div>
            </div>

            <!-- CARTES CENTRES D'INTERETS -->

            <div class="interests">
                <h3>Centre d'intérêts</h3>
                <p class="p-interests"> Choisissez vos centres d'intérêts</p>
            </div>
            <div class="center interest">
                <div class="card-ci"><i class="fa-solid fa-basketball"></i>
                    <p class="txt-card">Sport</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-flask-vial"></i>
                    <p class="txt-card">Science</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-music"></i>
                    <p class="txt-card">Music</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-video"></i>
                    <p class="txt-card">Film</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-feather"></i>
                    <p class="txt-card">Histoire</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-earth-americas"></i>
                    <p class="txt-card">Géographie</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-gamepad"></i>
                    <p class="txt-card">Jeux Vidéos</p>
                </div>
            </div>

            <!-- FIN DU FORMULAIRE -->

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" required>
                <p class="cgu">J'accepte les Conditions Générales d'Utilisation et la Politique de Confidentialité.
                    Je reconnais que mes données seront traitées conformément à cette politique.
                    Je comprends que je peux me désinscrire à tout moment.</p>
            </div>
            <button type="submit" class="register">
                <i class="fa-solid fa-pen-to-square" id="i-white"></i>
                <p class="txt-register">Inscription</p>
            </button>
        </div>
    </form>
    <script src="./js/script-register.js"></script>
</body>

</html>

<?php

include './footer.php';

?>