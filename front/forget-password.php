<?php

include './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="./css/styles-forget-password.css" type="text/css" media="all">
</head>

<body>
    <div class="content">
            <h1>Mot de passe oublié</h1>
        <div class="forget-password">
            <h3>Saisissez votre adresse mail</h3>
            <form method="post" action="generate-token-password.php">
                    <input type="text" name="email" id="email" required placeholder="MonsieurBouzin@gmail.com">
                    <button class="generated" type="submit">
                        <p class="txt-generated">Continuer</p>
                    </button>
            </form>
        </div>
    </div>
    <?php

    include './footer.php';

    ?>
</body>

</html>