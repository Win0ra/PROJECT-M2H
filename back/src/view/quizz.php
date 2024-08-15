<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../css/quizz.css" media="all"/>
</head>
<body>
    <h1>Choisis ton quizz</h1>
    <div class=content>
    <?php for ($i=0; $i<12; $i++) { ?>
        <div class="card" style="width: 18rem;">
            <img src="./../assets/img/Interrogation_point.jpg" class="card-img-top" alt="Quizz">
            <div class="card-body">
                <h5 class="card-title">League of Legend</h5>
                <p class="card-text">League of Legends est un jeu de stratégie en équipe où deux équipes de cinq champions puissants s'affrontent pour détruire la base de l'autre.</p>
                <a href="./question.php" class="btn btn-primary">Faire le quizz</a>
            </div>
        </div>
    <?php } ?>
    </div>
    
</body>
</html>