<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css" media="all" />
        <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="margin">
<!-- PRESENTATION DEBUT -->
        <div class="Presentation">
            <h1>La Bouzinerie</h1>
            <h2>La Bouzinerie, qu'est-ce que c'est ?</h2>
            <p>Tout simplement l'histoire de 3 jeunes développeurs en herbe adorant les quizz animés (voire même
                mouvementés) et qui se sont décidés à créer un site ludique et amusant.<br />
                L'idée du nom nous vient de "bouzin" signifiant "vacarme", ce qui nous semble essentiel lorsqu'on
                participe à des quizz entre ami.e.s !<br />
                Ici vous pourrez tester vos connaissances, en apprendre de nouvelles et même créer vos propres quizz !<br />
                Nous espérons que vous vous amuserez autant que nous ici, seul.e ou en équipe !<br />
                Lequel d'entre-vous va devenir le meilleur Bouzin ? &#x1F600</p>
        </div>
<!-- PRESENTATION FIN -->

<!-- SEARCHBAR DEBUT -->
        <div id="SearchBar">
            <input type="text" id="searchBar" placeholder="Rechercher un quiz...">
        </div>
<!-- SEARCHBAR FIN -->

<!-- CONTENT DEBUT -->
        <div class="content">
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">League Of Legends</h5>
                    <a href="#" class="btn btn-primary">Jouer</a>
                </div>
            </div>
            <div class="card">
                <div class="cards">
                    <h5 class="card-title">World Of Warcraft</h5>
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
<!-- CONTENT FIN -->

<!-- BLOCKS DEBUT -->
    <h3>Classement des meilleurs bouzins du moment</h3>
        <div class="Blocks">
            <div class="Second">
                <i class="fa-sharp fa-solid fa-trophy" id="second"></i>
                <div class="SecondBlock">2de place</div>
            </div>
            <div class="First">
                <i class="fa-sharp fa-solid fa-trophy" id="first"></i>
            <div class="FirstBlock">1ère place</div>
            </div>
            <div class="Third">
                <i class="fa-sharp fa-solid fa-trophy" id="third"></i>
                <div class="ThirdBlock">3ème place</div>
            </div>
        </div>
<!-- BLOCKS FIN -->
    </div>
</body>
</html>

<?php

include './footer.php';

?>