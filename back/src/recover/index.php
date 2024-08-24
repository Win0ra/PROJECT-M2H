<?php
use LaBouzinerie\Classes\Quizz;
use LaBouzinerie\Classes\Topic;

require_once dirname(__DIR__).'/../bootstrap.php';

// TOPIC
$topicRepository = $entityManager->getRepository(Topic::class);
$allTopic = $topicRepository->findAll();

// QUIZZ
$quizzRepository =$entityManager->getRepository(Quizz::class);
$allQuizz = $quizzRepository->findAll();










