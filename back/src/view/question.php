<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" type="text/css" href="./../css/question.css" media="all"/>
    <script type="text/javascript" src="./../assets/jquery/jquery-3.7.1.min.js"></script> 
    <script type="text/javascript">
		$(document).ready(function(){
			$('#img').click(function(){
				$('.lightbox').toggle();
			});
			$('#fermer').click(function(){
				$('.lightbox').toggle();
			});
		});	
	</script> 
</head>
<body>
    <?php
    require_once dirname(__DIR__).'/recover/index.php';
    $questionByQuizz = $questionRepository->findBy(['quizz'=>$_GET['quizz_id']]); // Récupération des questions liée au quizz dont l'id est celui envoyé en GET via la variable 'quizz_id'
    $choiceByQuestion = $choiceRepository->findBy(['question'=>$questionByQuizz[$_GET['page']-1]->getId()]);// Récupération de tous les choix correspondant à l'id de la question du tableau $questionByQuizz à l'index indiqué par la variable $GET['page'] 
    // VOIR POUR RAJOUTER UN ATTRIBUT IMAGE A LA CLASSE QUIZZ
    ?>
    <div class="statement">
        <h1><?php echo $questionByQuizz[$_GET['page']-1]->getStatement() ?></h1>
    </div>

    <div class="content">
        <img id="img" src="./../assets/img/Teldrassil.jpg" alt="Elfe de la nuit - World of Warcraft">
        <div class="answers">
            <a class="answer one" href="?quizz_id=<?php echo $_GET['quizz_id'] ?>&page=<?php echo $_GET['page']+1 ?>">
                <p class="letter">A</p>
                <p class="item"><?php echo $choiceByQuestion[0]->getName() ?></p>
            </a>

            <a class="answer two" href="?quizz_id=<?php echo $_GET['quizz_id'] ?>&page=<?php echo $_GET['page']+1 ?>">
                <p class="letter">B</p>
                <p class="item"><?php echo $choiceByQuestion[1]->getName() ?></p>
            </a>

            <a class="answer tree" href="?quizz_id=<?php echo $_GET['quizz_id'] ?>&page=<?php echo $_GET['page']+1 ?>">
                <p class="letter">C</p>
                <p class="item"><?php echo $choiceByQuestion[2]->getName() ?></p>
            </a>

            <a class="answer four" href="?quizz_id=<?php echo $_GET['quizz_id'] ?>&page=<?php echo $_GET['page']+1 ?>">
                <p class="letter">D</p>
                <p class="item"><?php echo $choiceByQuestion[3]->getName() ?></p>
            </a>
        </div>
    </div>

     <!-- LightBox debut -->
	<div class="lightbox">
		<div class="main">
			<div id="fermer">X</div>
			<img id="zoom" src="./../assets/img/Teldrassil.jpg"/>
		</div>
	</div>
	<!-- LightBox fin -->   

    <div class="footer">
        <p>Question : <?php echo $_GET['page'] ?>/10</p>
        <p>0:30</p>
        <p>Réponses : 0/4</p>
    </div>

</body>
</html>