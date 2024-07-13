<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="margin">
        <div class="Presentation">
            <h1 class="h1-bouz">La Bouzinerie</h1>
            <h2>La Bouzinerie, qu'est-ce que c'est ?</h2>
            <p>Tout simplement l'histoire de 3 jeunes développeurs en herbe adorant les quizz animés (voire même
                mouvementés) et qui se sont décidés à créer un site ludique et amusant.<br />
                L'idée du nom nous vient de "bouzin" signifiant "vacarme", ce qui nous semble essentiel lorsqu'on
                participe à des quizz entre ami.e.s!<br />
                Ici vous pourrez tester vos connaissances, en apprendre de nouvelles et même créer vos propres quizz
                !<br />
                Nous espérons que vous vous amuserez autant que nous ici, seul.e ou en équipe !<br />
                Lequel d'entre-vous va devenir le meilleur Bouzin ? &#x1F600</p>
        </div>
        <div id="SearchBar">

            <input type="text" id="searchBar" placeholder="Rechercher un quiz...">
        </div>

        <div class="content">
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 1</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 2</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 3</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 4</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 5</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 6</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 7</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 8</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">Quizz 9</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
        </div>
        <h3>Classement des meilleurs bouzins du moment</h3>
        <div class="Ranking">
            <div class="First">
            <i class="fa-sharp fa-solid fa-trophy"><div class="FirstBlock"></div></i>
            </div>
            <div class="Second">
            <i class="fa-sharp fa-solid fa-trophy"><div class="SecondBlock"></div></i>
            </div>
            <div class="Third">
            <i class="fa-sharp fa-solid fa-trophy"><div class="ThirdBlock"></div></i>
            </div>

        </div>
    </div>
</body>
</html>

<?php

include './footer.php';

?>