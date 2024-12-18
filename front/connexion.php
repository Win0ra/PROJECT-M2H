<?php
include './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/styles-connexion.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content">
        <h1 class="h1-connex">Connectez-vous</h1>
        <h3>Email</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="email" id="email" required placeholder="MonsieurBouzin@gmail.com">
            <h3>Mot de passe</h3>
            <input type="password" name="password" id="password" required placeholder="****************">
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <p class="memorize">Se souvenir de moi</p>
                <p class="password-lost"><a href="./forget-password.php">Mot de passe oublié ?</a></p>
            </div>
            <button class="connexion" type="submit">
                <i class="fa-solid fa-user"></i>
                <p class="txt-connexion">Connexion</p>
            </button>
            <div class="connex-sm">
                <a href="#"><button class="sm-button"><i class="fa-brands fa-google"></i></button></a>
                <a href="#"></a><button class="sm-button"><i class="fa-brands fa-facebook"></i></button></a>
                <a href="#"></a><button class="sm-button"><i class="fa-brands fa-apple"></i></button></a>
                <a href="#"></a><button class="sm-button"><i class="fa-brands fa-x-twitter"></i></button></a>
            </div>
            <div class="no-compte">
                <p class="memorize">Vous n'avez pas encore de compte ? <a href="./register.php">Inscrivez-vous</a></p>
            </div>
        </form>

        <?php
        $host = 'localhost';
        $dbname = 'la_bouzinerie';
        $user = 'root';
        $password = '';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (isset($_POST['email'], $_POST['password'])) {
                $email = $_POST['email'];
                $stmt = $pdo->prepare('SELECT * FROM useridentified WHERE email = :email');
                $stmt->bindValue(':email', $email);
                $stmt->execute();
                $useridentified = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($useridentified) {
                    if (password_verify($_POST['password'], $useridentified['password'])) {
                        $_SESSION['user_id'] = $useridentified['id'];
                        $_SESSION['user_last_name'] = $useridentified['last_name'];
                        $_SESSION['user_first_name'] = $useridentified['first_name'];
                        header('Location: register.php');
                        exit();
                    } else {
                        echo 'Adresse e-mail ou mot de passe incorrect.';
                    }
                } else {
                    echo 'Aucun utilisateur trouvé avec cet e-mail.';
                }
            }
        } catch (PDOException $e) {
            echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
        }
        ?>

    </div>
</body>

</html>

<?php

include './footer.php';

?>