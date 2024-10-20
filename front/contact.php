<?php

include './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil La Bouzinerie</title>
    <link rel="stylesheet" type="text/css" href="./css/styles-contact.css" media="all" />
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="margin">
<h1>Nous contacter</h1>
<div class="Form" id="Form">
        <form name="Contact" method="post" action="mailto:mail@mail.com" enctype="text/plain">

    <div class="FirstName">
        <h2>Prénom</h2><br>
        <input type="text" name="FirstName" id="Prenom" placeholder="Jean-Bouzin-Le-Meilleur" class="champ personne" required>
    </div>

    <div class="LastName">
        <h2>Nom</h2><br>
        <input type="text" name="LastName" id="Nom" placeholder="Jean-Bouzin-Le-Meilleur" class="champ personne" required>
    </div>
    
    <div class="Email">
        <h2>Email</h2><br>
        <input type="text" name="Email" id="Email" placeholder="Jean-Bouzin-Le-Meilleur@gmail.com" class="champ code" required>
    </div>

    <div class="Object">
        <h2>Objet</h2><br>
        <input type="text" name="Object" id="Objet" placeholder="Jean-Bouzin-Le-Meilleur" class="champ code" required>
    </div>

    <div class="LongText">
        <h2>Message</h2><br>
        <textarea name="message" class="LongText" placeholder="Bonjour..."></textarea>
    </div>
    <label>
        <input type="checkbox" id="checkbox" name="Confidentiality" value="oui" required>Je ne suis pas un robot
    </label>
    <a href="#"><button class="Send"><i class="fa-solid fa-paper-plane"></i>
                <p class="txt-send">Envoyer</p>
            </button></a>
</div>
</div>
</body>

</html>

<?php

include './footer.php';

?>