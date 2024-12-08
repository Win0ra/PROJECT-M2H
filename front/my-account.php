<?php
session_start();

include './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="./css/styles-my-account.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="content">
        <h1>Mon compte</h1>
        <h2>Bienvenue dans votre interface <?php echo($_SESSION['firstname']) ?></h2>
        <div class="my-informations">
            <div class="title-and-button">
                <h3>Mes informations</h3>
                <a href="#"><button class="btn-infos"><i class="fa-solid fa-pen"></i></i>
                        <p class="txt-infos">Modifier mes informations</p>
                    </button></a>
            </div>
            <div class="photo-infos">
                <div class="picture-profil"><i class="fa-solid fa-image" type="file"><input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"></i></div>
                <div class="infos-perso">
                    <div class="info">
                        <p class="title-info"><span class="underline">Prénom :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">Nom :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">Pseudo :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">E-mail :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">Mot de passe :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">Genre :</span> [données du form]</p>
                    </div>
                    <div class="info">
                        <p class="title-info"><span class="underline">Age :</span> [données du form]</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-rankings">
            <div class="title-and-button">
                <h3>Mes classements</h3>
                <a href="#"><button class="btn-infos btn-ranking"><i class="fa-solid fa-ranking-star"></i>
                        <p class="txt-infos">Voir mon classement général</p>
                    </button></a>
            </div>
            <div class="list-rankings">
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-basketball"></i>
                        <p class="title-card">Sport</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-flask-vial"></i>
                        <p class="title-card">Science</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-music"></i>
                        <p class="title-card">Music</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-video"></i>
                        <p class="title-card">Film</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-feather"></i>
                        <p class="title-card">Histoire</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-earth-americas"></i>
                        <p class="title-card">Géographie</p>
                    </div>
                </a>
                <a href="./theme-ranking.php">
                    <div class="card-quiz"><i class="fa-solid fa-gamepad"></i>
                        <p class="title-card">Jeux Vidéos</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="security">
            <div class="title-and-button">
                <h3>Sécurité</h3>
            </div>
            <div class="list-btn-security">
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
            </div>
        </div>
        <div class="Notifications">
            <div class="title-and-button">
                <h3>Notifications</h3>
            </div>
            <div class="list-btn-security">
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
                <div class="btn-and-txt">
                    <div class="btn-security">
                        <div class="yellow-circle"></div>
                    </div>
                    <p class="param">Parametre</p>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script-my-account.js"></script>
</body>


</html>

<?php

include './footer.php';

?>