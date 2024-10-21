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
    <div class="content">
    <?php 
    require_once dirname(__DIR__).'/recover/index.php';
    $quizzByTopic = $quizzRepository->findBy(['topic'=>$_GET['topic_id']]);
    foreach ($quizzByTopic as $obj) {
        // VOIR POUR RAJOUTER UN ATTRIBUT IMAGE A LA CLASSE QUIZZ
    ?>
        <div class="card" style="width: 18rem;">
            <img src="./../assets/img/Interrogation_point.jpg" class="card-img-top" alt="Quizz">
            <div class="card-body">
                <h5 class="card-title"><?php echo $obj->getTitle() ?></h5>
                <p class="card-text"><?php echo $obj->getDescription() ?></p>
                <a href="./question.php?quizz_id=<?php echo $obj->getId() ?>&page=1" class="btn btn-primary">Faire le quizz</a>
            </div>
        </div>
    <?php } ?>
    </div>
    
</body>
</html>