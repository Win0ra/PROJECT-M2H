<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./../css/insert/topic.css" media="all"/>
</head>
<body>
    <h1>Nouvelle catégorie de Quizz</h1>
    <h4>
        Pour ajouter une nouvelle catégorie à la base de donnée, 
        veuillez charger un fichier Json qui respecte le schéma suivant :
    </h4>
    <hr/>
    <p>
        {<br/>
            "<span>name</span>" : "...",<br/>
            "<span>description</span>" : "...",<br/>
            "<span>color</span>" : "..."<br/>
        }
    <hr/>
    </p>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="new_topic" class="input" required/>
            <input type="submit" value="Valider" class="submit"/>
        </form>
    </div>
</body>
</html>

<?php
var_dump($_SERVER);
var_dump($_FILES)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (!empty($_FILES['new_topic'])) {
//         echo 'Pas vide';
//         var_dump($_POST);
//         var_dump($_FILES['new_topic']);
//     } else {
//         echo 'Fichier non téléchargé';
//     }
// } else {
//     echo 'Vide';
//     var_dump($_POST);
// }
?>



