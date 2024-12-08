<?php
if (!empty($_SESSION)) {
    session_start();
}

include './navbar.php';

if ($_SESSION['isAuthentified']) {
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
        <!-- <div id="SearchBar"><i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchBar" placeholder="Rechercher un quiz...">
        </div> -->
        
        <div id="SearchBar"><i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchBar" placeholder="Rechercher un quiz...">
            <script>
            $(document).ready(function () {
            $("#search-bar").on("input", function () {
                const query = $(this).val();
                if (query.length > 2) { 
                    $.ajax({
                        url: "index.php", 
                        method: "GET",  
                        data: { q: query }, 
                        dataType: "json", 
                        success: function (data) {
                            let html = "";
                            if (data.length > 0) {
                                data.forEach(item => {
                                    html += `<div class="result-item">${item.name}</div>`;
                                });
                            } else {
                                html = "<div>Aucun résultat trouvé.</div>";
                            }
                            $("#results").html(html); 
                        },
                        error: function () {
                            $("#results").html("<div>Une erreur est survenue. Veuillez réessayer.</div>");
                        }
                    });
                } else {
                    $("#results").empty(); 
                }
            });
        });
    </script>
    <?php


if (isset($_GET['q'])) {
    $query = htmlspecialchars($_GET['q']); // Échapper les caractères spéciaux pour éviter les failles XSS

    // Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=la_bouzinerie', 'username', 'password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erreur de connexion à la base de données']);
        exit;
    }

    // Requête SQL
    $stmt = $pdo->prepare("SELECT name FROM items WHERE name LIKE :query LIMIT 10");
    $stmt->execute(['query' => '%' . $query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} else {
    echo json_encode([]);
}
?>
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