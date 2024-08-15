<?php

require_once dirname(__DIR__).'/../bootstrap.php';

use LaBouzinerie\Classes\Topic;

// TOPIC
$topicRepository = $entityManager->getRepository(Topic::class);
$allTopic = $topicRepository->findAll();










