<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" type="text/css" href="./../css/question.css" media="all" />
    <script type="text/javascript" src="./../assets/jquery/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#img').click(function() {
                $('.lightbox').toggle();
            });
            $('#fermer').click(function() {
                $('.lightbox').toggle();
            });
        });
    document.addEventListener('DOMContentLoaded', function () {
        const answers = document.querySelectorAll('.answers .answer');
        answers.forEach(answer => {
        answer.style.display = 'flex'; // Force l'affichage au cas où
        answer.style.visibility = 'visible';
    });
});

    </script>
</head>

<body>
<?php
require_once dirname(__DIR__) . '/recover/index.php';

// Validate and sanitize input
$quizz_id = isset($_GET['quizz_id']) ? intval($_GET['quizz_id']) : null;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Valide l'existence du quizz via son ID 
if ($quizz_id === null) {
    die("Invalid quiz ID");
}

// Chercher le quizz et les questions
$quizz = $quizzRepository->find($quizz_id);
if (!$quizz) {
    die("Quiz not found");
}

$questionByQuizz = $questionRepository->findBy(['quizz' => $quizz]);

// Vérifie que les questions existent 
if (empty($questionByQuizz)) {
    die("No questions found for this quiz");
}

// Valide le numéro de page
$totalQuestions = count($questionByQuizz);
if ($page < 1 || $page > $totalQuestions) {
    die("Invalid page number");
}

// Affiche la question actuelle et le choix de réponses
$currentQuestion = $questionByQuizz[$page - 1];
$choiceByQuestion = $choiceRepository->findBy(['question' => $currentQuestion]);

// Rendre les réponses aléatoires
shuffle($choiceByQuestion);

// Détermine la page suivante si elle existe
$nextPage = ($page < $totalQuestions) ? $page + 1 : null;

// Optional: Get quiz image if available
$quizImage = method_exists($quizz, 'getImage') ? $quizz->getImage() : "./../assets/img/Teldrassil.jpg";
?>

        <div class="statement">
            <h1><?php echo htmlspecialchars($currentQuestion->getStatement()); ?></h1>
        </div>
        <div class="content">
            <img id="img" src="<?php echo htmlspecialchars($quizImage); ?>" alt="Quiz Image">
            <div class="answers">
    <?php
        $letters = ['A', 'B', 'C', 'D']; // Adaptez si nécessaire
        foreach ($choiceByQuestion as $index => $choice) {
        $nextPageParam = $nextPage ? "?quizz_id={$quizz_id}&page={$nextPage}" : "#";
    ?>
        <a class="answer <?php echo strtolower($letters[$index]); ?>" 
            href="<?php echo htmlspecialchars($nextPageParam); ?>" 
            data-correct="<?php echo $choice->getName() === $currentQuestion->getAnswer() ? 'true' : 'false'; ?>">
            <p class="letter"><?php echo $letters[$index]; ?></p>
            <p class="item"><?php echo htmlspecialchars($choice->getName()); ?></p>
        </a>
    <?php } ?>
</div>

        </div>

        <!-- LightBox -->
        <div class="lightbox">
            <div class="main">
                <div id="fermer">X</div>
                <img id="zoom" src="<?php echo htmlspecialchars($quizImage); ?>" />
            </div>
        </div>

        <div class="footer">
            <p>Question: <?php echo "{$page}/{$totalQuestions}"; ?></p>
            <p id="timer">0:30</p>
            <p id="score">Answers: 0/<?php echo $totalQuestions; ?></p>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let timer = 30; // seconds
                let timerElement = document.getElementById('timer');
                let scoreElement = document.getElementById('score');
                let correctAnswers = 0;

                // Timer countdown
                let countdown = setInterval(function() {
                    timer--;
                    timerElement.textContent = `0:${timer < 10 ? '0' : ''}${timer}`;

                    if (timer <= 0) {
                        clearInterval(countdown);

                // Redirige vers la page suivante
                        window.location.href = '<?php echo $nextPageParam; ?>'; 
                    }
                }, 1000);

                // Answer click handling
                document.querySelectorAll('.answer').forEach(answer => {
                    answer.addEventListener('click', function(e) {
                        if (this.getAttribute('data-correct') === 'true') {
                            correctAnswers++;
                            scoreElement.textContent = `Answers: ${correctAnswers}/${<?php echo $totalQuestions; ?>}`;
                        }
                    });
                });

                // Lightbox 
                document.getElementById('img').addEventListener('click', function() {
                    document.querySelector('.lightbox').style.display = 'flex';
                });

                document.getElementById('fermer').addEventListener('click', function() {
                    document.querySelector('.lightbox').style.display = 'none';
                });
            });
        </script>
    </body>

    </html>
