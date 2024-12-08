<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../css/topic.css" media="all"/>
</head>
<body>
    <h1>Catégorie</h1>
    <div class="content">
    <?php 
    require_once dirname(__DIR__).'/recover/index.php';
    foreach ($allTopic as $obj) {   
    ?>
        <a class="topic" href="./quizz.php?topic_id=<?php echo $obj->getId()?>" style="width: 18rem; background-color: <?php echo $obj->getColor() ?>">
            <div>
                <h5><?php echo $obj->getName() ?></h5>
                <p><?php echo $obj->getDescription() ?></p>
            </div>
        </a>
    <?php } ?>
    </div>
    
    
</body>
</html>