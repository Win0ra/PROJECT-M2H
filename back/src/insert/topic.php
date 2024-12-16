<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../css/insert/topic.css" media="all"/>
</head>
<body>
    <h1>Nouveau thème</h1>
    <h5>
        Pour ajouter un thème à la base de donnée,
        veuillez charger un fichier Json qui respecte le schéma suivant :
    </h5>
    <hr/>
    <!-- La balise <pre> permet d'afficher des données structurées comme un schéma JSON -->
    <pre class="scheme">
    {
        "name" : "...",
        "description" : "...",
        "color" : "...",
    }
    </pre>
    <hr/>
    <div style="margin-bottom: 2rem;">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="new_topic" required/>
            <input type="submit" value="Valider" class="submit"/>
        </form>
    </div>

<?php
use LaBouzinerie\Classes\Topic;
require_once dirname(__DIR__).'/recover/index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['new_topic']['name'])) {
        $decoded_files = json_decode(file_get_contents($_FILES['new_topic']['tmp_name']));
        $correct_topic_table = [];
        $duplicate_name_table = [];
        $duplicate_color_table = [];
        foreach ($decoded_files as $obj_file) {
            $is_new_name = true;
            $is_new_color = true;
            foreach ($allTopic as $obj_bdd) {
                if ($obj_file->name === $obj_bdd->getName()) { 
                    $is_new_name = false;
                    array_push($duplicate_name_table, $obj_file);
                } else if ($obj_file->color === $obj_bdd->getColor()) {
                    $is_new_color = false;
                    array_push($duplicate_color_table, $obj_file);
                }
            }
            // PERSIST SI LE THEME A UN NOM ET UNE COULEUR UNIQUE
            if ($is_new_name === true && $is_new_color === true) {
                array_push($correct_topic_table, $obj_file);
                $topic = new Topic($obj_file->name, $obj_file->description, $obj_file->color);
                $entityManager->persist($topic);
            };
        }
        // FLUSH POUR UPDATE LA BDD
        $entityManager->flush();

        // ALERTE BOOTSTRAP CONFIRMATION D'ENVOI
        if (!empty($correct_topic_table)) {
            // Alerte au singulier
            if (count($correct_topic_table) == 1) {
                ?>
                <div class="alert alert-success" role="alert">
                    Le thème <span>
                    <?php
                    foreach ($correct_topic_table as $obj) {
                        echo strtolower($obj->name).' ';
                    }
                    ?>
                    </span> a été ajouté à la base de données avec succès. 
                </div>
            <?php
            // Alerte au pluriel
            } else {
                ?>
                <div class="alert alert-success" role="alert">
                    Les thèmes | <span>
                    <?php
                    foreach ($correct_topic_table as $obj) {
                        echo strtolower($obj->name).' | ';
                    }
                    ?>
                    </span> ont été ajoutés à la base de données avec succès. 
                </div>
            <?php
            }
        }
        // ALERTE BOOTSTRAP EN CAS DE NOMS EN DOUBLE 
        if (!empty($duplicate_name_table)) {
            ?>
            <div class="alert alert-danger" role="alert">
            Un thème portant le même nom existe déjà.
            </div>

            <!-- Détail des doublons  -->
            <div class="list_of_duplicates">
                <?php
                if (!empty($duplicate_name_table)) {
                    ?>
                    <h6><span>Liste des noms en double</span> :</h6>
                    <ul>
                    <?php
                    foreach ($duplicate_name_table as $obj) { 
                    ?>
                    <li> 
                    <?php
                        echo $obj->name; 
                        ?>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <?php
        };
        // ALERTE BOOTSTRAP EN CAS DE COULEUR EN DOUBLE
        if (!empty($duplicate_color_table)) {
            ?>
            <div class="alert alert-danger" role="alert">
            Un thème avec la même couleur existe déjà.
            </div>

            <!-- Détail des doublons  -->
            <div class="list_of_duplicates">
                <?php
                if (!empty($duplicate_color_table)) {
                    ?>
                    <h6><span>Liste des couleurs en double</span> :</h6>
                    <ul>
                    <?php
                    foreach ($duplicate_color_table as $obj) { 
                    ?>
                    <li> 
                    <?php
                        echo $obj->color; 
                        ?>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <?php
        };
    }
} 
?>

</body>
</html>



