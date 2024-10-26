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
            <input type="text" name="email" id="email" required>
            <h3>Mot de passe</h3>
            <input type="password" name="password" id="password" required>
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <p class="souvenir">Se souvenir de moi</p>
                <p class="mdp-oublie"><a href="">Mot de passe oublié ?</a></p>
            </div>
            <button class="connexion" type="submit">
                <i class="fa-solid fa-user"></i>
                <p class="txt-connexion">Connexion</p>
            </button>
            <div class="connex-rs">
                <a href="#"><button class="rs-button"><i class="fa-brands fa-google"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-facebook"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-apple"></i></button></a>
                <a href="#"></a><button class="rs-button"><i class="fa-brands fa-x-twitter"></i></button></a>
            </div>
            <div class="no-compte">
                <p class="souvenir">Vous n'avez pas encore de compte ? <a href="./inscription.php">Inscrivez-vous</a></p>
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
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $stmt = $pdo->prepare('SELECT * FROM useridentified WHERE email = :email');
                $stmt->bindValue(':email', $email);
                $stmt->execute();
                $useridentified = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($useridentified && $_POST['password'] === $useridentified['password']) {
                    $_SESSION['user_id'] = $useridentified['id'];
                    $_SESSION['user_last_name'] = $useridentified['last_name'];
                    $_SESSION['user_first_name'] = $useridentified['first_name'];
                    header('Location: inscription.php');
                    exit();
                } else {
                    echo 'Adresse e-mail ou mot de passe incorrect.';
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