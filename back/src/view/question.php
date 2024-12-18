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

// Validation et assainissement des données
$quizz_id = isset($_GET['quizz_id']) ? intval($_GET['quizz_id']) : null;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$reset = isset($_GET['reset']) ? $_GET['reset'] : 'false';

// Valide l'existence du quizz via son ID
if ($quizz_id === null) {
    die("Quiz ID invalide");
}

// Chercher le quiz et les questions
$quizz = $quizzRepository->find($quizz_id);
if (!$quizz) {
    die("Quiz non trouvé");
}

$questionByQuizz = $questionRepository->findBy(['quizz' => $quizz]);

// Vérifie que les questions existent
if (empty($questionByQuizz)) {
    die("Pas de questions trouvées pour ce quiz");
}

// Valide le numéro de page
$totalQuestions = count($questionByQuizz);
if ($page < 1 || $page > $totalQuestions) {
    die("Numéro de page invalide");
}

// Affiche la question actuelle et le choix de réponses
$currentQuestion = $questionByQuizz[$page - 1];
$choiceByQuestion = $choiceRepository->findBy(['question' => $currentQuestion]);

// Rendre les réponses aléatoires
shuffle($choiceByQuestion);

// Détermine la page suivante si elle existe
$nextPage = ($page < $totalQuestions) ? $page + 1 : null;
$nextPageParam = $nextPage ? "?quizz_id={$quizz_id}&page={$nextPage}" : "#";

// Optionnel : récupérer l'image du quiz
$quizImage = method_exists($quizz, 'getImage') ? $quizz->getImage() : "./../assets/img/Teldrassil.jpg";
?>

        <div class="statement">
            <h1><?php echo htmlspecialchars($currentQuestion->getStatement()); ?></h1>
        </div>
        <div class="content">
            <img id="img" src="<?php echo htmlspecialchars($quizImage); ?>" alt="Quiz Image">
            <div class="answers">
    <?php
        $letters = ['A', 'B', 'C', 'D']; // Adapter si on rajoute des réponses supplémentaires
        foreach ($choiceByQuestion as $index => $choice) {
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

        <!-- Formulaire pour relancer le quiz -->
        <form action="" method="get">
            <input type="hidden" name="quizz_id" value="<?php echo $quizz_id; ?>">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="reset" value="true">
            <button type="submit">Relancer le quiz</button>
        </form>
    

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let timer = 30; // secondes
                let timerElement = document.getElementById('timer');
                let scoreElement = document.getElementById('score');
                let correctAnswers = parseInt(localStorage.getItem('correctAnswers_<?php echo $quizz_id; ?>')) || 0;
                let nextPageParam = '<?php echo $nextPageParam; ?>';
                let reset = '<?php echo $reset; ?>';
                let totalQuestions = <?php echo $totalQuestions; ?>;     
                let currentQuestionNumber = 1; // Traque le numéro de la question actuelle
                

        // Réinitialiser le compteur si le quiz est relancé
                if (reset === 'true') {
                    localStorage.setItem('correctAnswers_<?php echo $quizz_id; ?>', 0);
                    correctAnswers = 0;
                }

        // Mettre à jour le score affiché
                scoreElement.textContent = `Answers: ${correctAnswers}/<?php echo $totalQuestions; ?>`;

        // Compte à rebours du timer de 30sec
                let countdown = setInterval(function() {
                    timer--;
                    timerElement.textContent = `0:${timer < 10 ? '0' : ''}${timer}`;

                    if (timer <= 0) {
                        clearInterval(countdown);

        // Redirige vers la page suivante
                        window.location.href = nextPageParam;
                    }
                }, 1000);

        // Réponse traitement des clics
                document.querySelectorAll('.answer').forEach(answer => {
                    answer.addEventListener('click', function(e) {
                        e.preventDefault(); // Empêche la redirection immédiate
                        if (this.getAttribute('data-correct') === 'true') {
                            correctAnswers++;
                            localStorage.setItem('correctAnswers_<?php echo $quizz_id; ?>', correctAnswers);
                            scoreElement.textContent = `Answers: ${correctAnswers}/<?php echo $totalQuestions; ?>`;
                        }
        // Bloque l'incrémentation des réponses une fois le quiz terminé
                currentQuestionNumber++;
                if (currentQuestionNumber > totalQuestions) {           
                    document.querySelectorAll('.answer').forEach(btn => {                     
                    btn.style.pointerEvents = 'none';                 
                    btn.classList.add('disabled');             
            });        
    }
    // Redirige vers la page suivante après un court délai
                        setTimeout(function() {
                            window.location.href = nextPageParam;
                        }, 500);
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
