<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="./css/styles-mon-compte.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="content">
        <h1>Mon compte</h1>
        <h2>Bienvenue dans votre interface [Nom Utilisateur]</h2>
        <div class="mes-informations">
            <div class="titre-et-button">
                <h3>Mes informations</h3>
                <a href="#"><button class="btn-infos"><i class="fa-solid fa-pen"></i></i>
                        <p class="txt-infos">Modifier mes informations</p>
                    </button></a>
            </div>
            <div class="photo-infos">
                <div class="photo-profil"><i class="fa-solid fa-image" type="file"><input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"></i></div>
                <div class="infos-persos">
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Prénom :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Pseudo :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">E-mail :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Mot de passe :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Sexe :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Age :</span> [données du form]</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mes-classement">
            <div class="titre-et-button">
                <h3>Mes classements</h3>
                <a href="#"><button class="btn-infos btn-classement"><i class="fa-solid fa-ranking-star"></i>
                        <p class="txt-infos">Voir mon classement général</p>
                    </button></a>
            </div>
            <div class="list-classements">
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-basketball"></i>
                        <p class="titre-carte">Sport</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-flask-vial"></i>
                        <p class="titre-carte">Science</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-music"></i>
                        <p class="titre-carte">Music</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-video"></i>
                        <p class="titre-carte">Film</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-feather"></i>
                        <p class="titre-carte">Histoire</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-earth-americas"></i>
                        <p class="titre-carte">Géographie</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="carte-quiz"><i class="fa-solid fa-gamepad"></i>
                        <p class="titre-carte">Jeux Vidéos</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="securite">
            <div class="titre-et-button">
                <h3>Sécurité</h3>
            </div>
            <div class="list-btn-securite">
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
            </div>
        </div>
        <div class="Notifications">
            <div class="titre-et-button">
                <h3>Notifications</h3>
            </div>
            <div class="list-btn-securite">
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-et-txt">
                    <div class="btn-securite">
                        <div class="cercle-jaune"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script-mon-compte.js"></script>
</body>


</html>

<?php

include './footer.php';

?>