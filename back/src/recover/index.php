<?php
use LaBouzinerie\Classes\Choice;
use LaBouzinerie\Classes\Question;
use LaBouzinerie\Classes\Quizz;
use LaBouzinerie\Classes\Topic;
use LaBouzinerie\Classes\UserGuest;
use LaBouzinerie\Classes\UserIdentified;

require_once dirname(__DIR__).'/../bootstrap.php';
// USER IDENTIFIED
$userIdentifiedRepository = $entityManager->getRepository(UserIdentified::class);
$allUserIdentified = $userIdentifiedRepository->findAll();
 
// TOPIC
$topicRepository = $entityManager->getRepository(Topic::class);
$allTopic = $topicRepository->findAll();

// QUIZZ
$quizzRepository = $entityManager->getRepository(Quizz::class);
$allQuizz = $quizzRepository->findAll();

// FAIRE UNE FONCTION QUI PERMET DE DONNER UN TABLEAU DE CRITERE POUR LE findBy()
// function feedFindBy (array $criteria) {
//     $quizzByTopic = $entityManager->getRepository(Quizz::class)->findBy($criteria);
// }

// QUESTION
$questionRepository = $entityManager->getRepository(Question::class);
$allQuestion = $questionRepository->findAll();

// CHOICE
$choiceRepository = $entityManager->getRepository(Choice::class);
$allChoice = $choiceRepository->findAll();












