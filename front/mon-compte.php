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
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                    <div class="info">
                        <p class="titre-info"><span class="souligne">Nom :</span> [recup ici infos form]</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mes-classement">
            <div class="titre-et-button">
                <h3>Mes classement</h3>
                <a href="#"><button class="btn-infos btn-classement"><i class="fa-solid fa-ranking-star"></i>
                        <p class="txt-infos">Voir mon classement général</p>
                    </button></a>
            </div>
            <div class="list-classements">
                <div class="carte-quiz"><i class="fa-solid fa-basketball"></i>
                    <p class="titre-carte">Sport</p>
                </div>
            </div>
        </div>
        <div class="Sécurité"></div>
        <div class="Notifications"></div>
    </div>
    </div>
    <script src="./js/script-mon-compte.js"></script>
</body>


</html>

<?php

include './footer.php';

?>