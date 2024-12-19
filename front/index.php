<?php
if (!empty($_SESSION)) {
    session_start();
}

include './navbar.php'; // Inclusion du menu de navigation

require_once dirname(__DIR__).'/back/src/recover/index.php'; // Inclusion de vos fonctions backend

// Vérification de la session utilisateur
if (isset($_SESSION['isAuthentified']) && $_SESSION['isAuthentified']) {
    ?>
    <div class="alert alert-success d-flex align-items-center bandeau" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Votre inscription s'est déroulée avec succès.
        </div>
    </div>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil La Bouzinerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/styles.css" media="all" />
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="margin">
        <!-- PRESENTATION -->
        <div class="Presentation">
            <h1>La Bouzinerie</h1>
            <h2>La Bouzinerie, qu'est-ce que c'est ?</h2>
            <p>Tout simplement l'histoire de 3 jeunes développeurs en herbe adorant les quiz animés (voire même
                mouvementés) et qui se sont décidés à créer un site ludique et amusant.<br />
                L'idée du nom nous vient de "bouzin" signifiant "vacarme", ce qui nous semble essentiel lorsqu'on
                participe à des quizz entre ami.e.s !<br />
                Ici vous pourrez tester vos connaissances, en apprendre de nouvelles et même créer vos propres quiz !<br />
                Nous espérons que vous vous amuserez autant que nous ici, seul.e ou en équipe !<br />
                Lequel d'entre-vous va devenir le meilleur Bouzin ? &#x1F600</p>
        </div>

        <!-- SEARCHBAR -->
        <div id="SearchBar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchBar" placeholder="Rechercher un quiz..." oninput="searchQuiz()">
        </div>
        <div id="results"></div>

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
                    if (data.length > 0) {
                        resultsDiv.innerHTML = data.map(item => `<p>${item.title}</p>`).join('');
                    } else {
                        resultsDiv.innerHTML = '<p> Aucun résultat trouvé. </p>';
                    }
                } catch (error) {
                    resultsDiv.innerHTML = '<p> Erreur lors de la recherche. Veuillez réessayer plus tard. </p>';
                    console.error(error);
                }
            }
        </script>

        <!-- QUIZ CARDS -->
        <h3>Nos quiz</h3>
        <div class="content">
            <?php
            // Affichage dynamique des cartes de quiz
            $quizzes = [
                'League of Legends', 'World of Warcraft', 'Dofus', 'Quizz 4', 'Quizz 5', 'Quizz 6', 'Quizz 7', 'Quizz 8', 'Quizz 9'
            ];

            foreach ($quizzes as $quiz) {
                echo '
                <div class="card">
                    <div class="cards">
                        <h5 class="card-title">'.htmlspecialchars($quiz).'</h5>
                        <a href="#" class="btn btn-primary">Jouer</a>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- PODIUM -->
        <h3 class="h2-podium">Classement des meilleurs bouzins du moment</h3>
        <div class="Blocks">
            <div class="Second">
                <i class="fa-sharp fa-solid fa-trophy" id="second"></i>
                <div class="SecondBlock">
                    <p class="p-podium">Raoul</p>
                </div>
            </div>
            <div class="First">
                <i class="fa-sharp fa-solid fa-trophy" id="first"></i>
                <div class="FirstBlock">
                    <p class="p-podium">M2H</p>
                </div>
            </div>
            <div class="Third">
                <i class="fa-sharp fa-solid fa-trophy" id="third"></i>
                <div class="ThirdBlock">
                    <p class="p-podium">Scrumy</p>
                </div>
            </div>
        </div>
        <!-- FIN PODIUM -->

        <!-- RANKING DEBUT -->
                <a href="./ranking.php"><button class="ranking"><i class="fa-solid fa-ranking-star"></i>
                <p class="txt-ranking">Voir le Classement</p>
            </button></a>
        <!-- RANKING FIN -->

        <!-- CREATION -->
        <div class="Creation">
            <h3 class="bouz">Lance-toi, crée ton propre quiz !</h3>
            <p>Vous pouvez créer votre quiz pour ensuite envoyer le lien à vos amis et tester leurs connaissances !</p>
            <a href="../back/src/create/"><button class="creation"><i class="fa-solid fa-pencil"></i>
                <p class="txt-creation">Créer un quiz</p>
            </button></a>
        </div>
    </div>
</body>

</html>

<?php
include './footer.php'; // Footer
?>
