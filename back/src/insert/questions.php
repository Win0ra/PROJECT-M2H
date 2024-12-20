<?php

use Doctrine\Common\Collections\ArrayCollection;
use LaBouzinerie\Classes\Choice;
use LaBouzinerie\Classes\Question;

require_once dirname(__DIR__).'/recover/index.php';
require_once dirname(__DIR__).'/assets/translate/tables-function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../css/insert/question.css" media="all"/>
</head>
<body>
    <h1>Nouvelles questions</h1>
    <h5>
        Pour ajouter des nouvelles questions à la base de donnée,
        veuillez charger un fichier Json qui respecte le schéma suivant :
    </h5>
    <hr/>
    <!-- La balise <pre> permet d'afficher des données structurées comme un schéma JSON -->
    <pre class="scheme">
    [
        {
            "statement" : "...",
            "answer" : "...",
            "choices" : [
                {"name" : "..."},
                {"name" : "..."},
                {"name" : "..."},
                {"name" : "..."}
            ]
        }
    ] 
    </pre>
    <hr/>
    <div style="margin-bottom: 2rem;">
        <form action="" method="post" enctype="multipart/form-data">
            <label style="width: 35vw; margin-bottom: 1rem;"><b>Sélectionnez le quiz auquel ajouter des questions :</b><br/>
                <select name="quiz" style="width: 100%;" required>
                    <!-- <option value="null">⌀</option> -->
                    <?php
                    foreach ($allQuizz as $obj) {
                    ?>
                        <option value="<?php echo $obj->getId() ?>"><?php echo $obj->getTitle() ?></option>
                    <?php 
                    } 
                    ?>
                </select>
            </label>
            <label><b>Charger les questions :</b><br/>
                <input type="file" name="new_questions" required/>
            </label>
            <input type="submit" value="Valider" class="submit"/>
        </form>
    </div>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['new_questions']['name'])) {
        $decoded_files = json_decode(file_get_contents($_FILES['new_questions']['tmp_name']));
        $quiz = $quizzRepository->findOneBy(['id' => $_POST['quiz']]);
        $added_questions_table = [];
        // Enregistrement de chaque question du fichier JSON
        foreach ($decoded_files as $question) {
            $new_question = new Question($question->statement, $question->answer, $quiz);
            $entityManager->persist($new_question);
            array_push($added_questions_table, $question->statement);
            // Enregistrement des choix liés à la question actuelle de la boucle
            foreach ($question->choices as $choice) {
                $new_choice = new Choice($choice->name, $new_question);
                $entityManager->persist($new_choice);
            }
        }
        // FLUSH POUR UPDATE LA BDD
        $entityManager->flush();

        // ALERTE BOOTSTRAP CONFIRMATION D'ENVOI
        if (!empty($added_questions_table)) {
            // Alerte au singulier
            if (count($added_questions_table) == 1) {
                ?>
                <div class="alert alert-success" role="alert">
                    <p>La question a été ajouté à la base de données avec succès.</p> 
                    <span class="badge text-bg-success">1 ajout</span>
                    <hr/>
                    <ul>
                        <li><?php $added_questions_table[0] ?></li>
                    </ul> 
                </div>
            <?php
            // Alerte au pluriel
            } else {
                ?>
                <div class="alert alert-success" role="alert">
                    <p>Les questions ont été ajoutées à la base de données avec succès.</p> 
                    <span class="badge text-bg-success"><?php echo count($added_questions_table) ?> ajouts</span>
                    <hr />
                    <ul style="display: flex; flex-direction: column; gap: 0.8rem">
                        <?php foreach ($added_questions_table as $question) {?>
                            <li><?php echo $question ?></li>
                        <?php } ?>
                    </ul> 
                </div>
            <?php
            }
        }
    }
} 
?>

</body>
</html>




