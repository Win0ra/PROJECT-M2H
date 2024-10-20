<?php
// Tables associatives anglais-français pour les THEMES 
$topic_translation = [
    "Gaming" => "Jeux vidéo",
    "Geography" => "Géographie",
    "History" => "Histoire",
    "Movie" => "Film",
    "Music" => "Musique",
    "Science" => "Science",
    "Sport" => "Sport",
];
$quizz_translation = [
    "Easy" => "Facile",
    "Medium" => "Intermédiaire",
    "Difficult" => "Difficile",
    "Hardcore" => "Expert"
];

// Fonction de traduction
function translate(array $tab, String $word) : String {
    $result = $tab[$word];
    return $result;
}