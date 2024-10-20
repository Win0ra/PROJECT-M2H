QUESTION EN ORDRE OU EN DESORDRE : <br><br>
<?php
$tableau_de_test = ["un","deux","trois","quatre","cinq","six","sept","huit","neuf","dix"];
$ordering_question = false;
// __________________________
if ($ordering_question == true) {
    foreach ($tableau_de_test as $question) {
        echo "Question n° ".$question."<br>";
    }
}else{
    $copie = $tableau_de_test;
    shuffle($copie);
    foreach ($copie as $question) {
        echo "Question n° ".$question."<br>";
    }
}



