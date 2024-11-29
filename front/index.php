<?php
include './navbar.php';
require_once dirname(__DIR__).'/back/src/recover/index.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil La Bouzinerie</title>
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
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchBar" placeholder="Rechercher un quiz..." oninput="searchQuiz()">
        </div>

        <div id="results">

        <script type="text/javascript">
            async function searchQuiz() {
                const query = document.getElementById('searchBar').value.trim();
                const resultsDiv = document.getElementById('results');

                if (query.length === 0) {
                    resultsDiv.innerHTML = ''; // Vider les résultats si barre de recherche vide
                    return;
                }

                try {
                    const response = await fetch(`../back/src/insert/search.php?q=${encodeURIComponent(query)}`);
                    const data = await response.json();
                    console.log(data);
                    if (data.length > 0) {
                    if (data.error) {
                        resultsDiv.innerHTML = `<p>${data.error}</p>`;
                        return;
                    }

                    // Affichage des résultats
                    resultsDiv.innerHTML = data
                        .map(item => `<p>${item.title}</p>`)
                        .join('');
                    }
                } catch (error) {
                    resultsDiv.innerHTML = `<p>Erreur lors de la recherche. Veuillez réessayer plus tard.</p>`;
                    console.error(error);
                }
            }
        </script>
    </div>
    <!-- SEARCHBAR FIN -->
    <h3>Les quizs du moment</h3>
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
    <h3 class="h2-podium">Classement des meilleurs bouzins du moment</h3>
    <div class="Blocks">
        <div class="Second">
            <i class="fa-sharp fa-solid fa-trophy" id="second"></i>
            <div class="SecondBlock">
                <p class="p-podium">[Nom du 2eme]</p>
            </div>
        </div>
        <div class="First">
            <i class="fa-sharp fa-solid fa-trophy" id="first"></i>
            <div class="FirstBlock">
                <p class="p-podium">[Nom du 1er]</p>
            </div>
        </div>
        <div class="Third">
            <i class="fa-sharp fa-solid fa-trophy" id="third"></i>
            <div class="ThirdBlock">
                <p class="p-podium">[Nom du 3eme]</p>
            </div>
        </div>
    </div>
    <!-- BLOCKS FIN -->

    <!-- RANKING DEBUT -->
    <a href="./ranking.php"><button class="ranking"><i class="fa-solid fa-ranking-star"></i>
            <p class="txt-ranking">Voir le Classement</p>
        </button></a>
    <!-- RANKING FIN -->

    <!-- QUIZ CREATION DEBUT -->
    <div class="Creation">
        <h3 class="bouz">Lance-toi, crées ton propre quiz !</h3>
        <p>Vous avez également la possibilité de créer votre quiz pour ensuite envoyer le lien à vos amis et tester leurs connaissances !
            Si toi aussi tu as l'âme d'un créateur, clique sur le bouton ci-dessous !
        </p>
        <a href="../back/src/create/"><button class="creation"><i class="fa-solid fa-pencil"></i>
                <p class="txt-creation">Créer un quiz</p>
            </button></a>
    </div>
    </div>
</body>

</html>



<?php

include './footer.php';

?>