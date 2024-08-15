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
    <div class="statement">
        <h1>Quel est le nom de la première zone de départ des Elfes de la Nuit ?</h1>
    </div>

    <div class="content">
        <img id="img" src="./../assets/img/Teldrassil.jpg" alt="Elfe de la nuit - World of Warcraft">
        <div class="answers">
            <div class="answer one">
                <p class="letter">A</p>
                <p class="item">Teldrassil</p>
            </div>

            <div class="answer two">
                <p class="letter">B</p>
                <p class="item">Darnassus</p>
            </div>

            <div class="answer tree">
                <p class="letter">C</p>
                <p class="item">Azuremyst Isle</p>
            </div>

            <div class="answer four">
                <p class="letter">D</p>
                <p class="item">Dun Morogh</p>
            </div>
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
        <p>Question : 2/10</p>
        <p>0:30</p>
        <p>Réponses : 0/4</p>
    </div>

</body>
</html>