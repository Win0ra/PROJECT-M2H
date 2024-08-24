
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../css/insert/quizz.css" media="all"/>
</head>
<body>
    <h1>Nouveau Quizz</h1>
    
    <div>
        <form action="" method="post">
            <label><span>Titre :</span>
                <input type="text" name="title" placeholder="Mon super quizz" htmlspecialchars required/>
            </label>
            <label><span>Description :</span>
                <input type="textarea" name="description" placeholder="Blabli Blablou" htmlspecialchars required/>
            </label>
            <label><span>Niveau de difficulté :</span>
                <select name="level" required>
                    <option value="null">⌀</option>
                    <option value="Easy">Facile</option>
                    <option value="Medium">Intermédiaire</option>
                    <option value="Difficult">Difficile</option>
                    <option value="Hardcore">Expert</option>
                </select>
            </label>
            <label><span>Thème :</span>
                <select name="topic" required>
                    <option value="null">⌀</option>
                    <?php
                    use LaBouzinerie\Classes\Quizz;
                    require_once dirname(__DIR__).'/recover/index.php';
                    require_once dirname(__DIR__).'/assets/translate/tables-function.php';

                    foreach ($allTopic as $obj) {
                    ?>
                        <option value="<?php echo $obj->getId() ?>"><?php echo translate($topic_translation, $obj->getName()) ?></option>
                    <?php 
                    } 
                    ?>
                </select>
            </label>
            <label>
                <input type="hidden" name="is_completed" value="0"/>
            </label>
            <label>
                <input type="submit" value="Valider" class="submit"/>
            </label>
        </form>
    </div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['title']) 
        && !empty($_POST['description'] 
        && $_POST['level'] !== 'null' 
        && $_POST['topic'] !== 'null' 
        && $_POST['is_completed'] == 0)
    ) {
        $is_new_quizz = true;
        foreach ($allQuizz as $obj) {
            // QUIZZ INVALIDE SI UNE ASSOCIATION TITRE - NIVEAU EXISTE DÉJÀ 
            if ($_POST['title'] === $obj->getTitle() && $_POST['level'] === $obj->getLevel()) {
                $is_new_quizz = false;
            }
        }
        // PERSIST ET FLUSH SI QUIZZ VALIDE
        if ($is_new_quizz === true) {
            // Récupération du thème en fonction de son id
            $selected_topic = $topicRepository->find($_POST['topic']);
            $quizz = New Quizz($_POST['title'], $_POST['description'], $_POST['level'], $_POST['is_completed'], $selected_topic);
            // $entityManager->persist($quizz);
            // $entityManager->flush();
            if (isset($quizz)) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo 'Le quizz <strong>'.$_POST['title'].'</strong> a été ajouté à la base de données avec succès.' 
                    ?>
                    </div>
                <?php
            }
        } 
        
        // ALERTE BOOTSTRAP SI QUIZZ INVALIDE
        if ($is_new_quizz === false) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Un quizz <strong>'.$_POST['title'].'</strong> de niveau <strong>'.translate($quizz_translation, $_POST['level']).'</strong> existe déjà.';?>
            </div>
            <?php
        }
    // ALERTE BOOTSTRAP EN CAS DE CHAMP VIDE
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Un champ n'a pas été renseigné, ou a été mal renseigné.<br/>Veuillez ne pas laisser de champs vide (⌀).
        </div>
        <?php
    }
}
?>

