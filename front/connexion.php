<?php
session_start();

$host = 'localhost';
$dbname = 'la_bouzinerie';
$user = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=la_bouzinerie", $user, $password);
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
                header('Location: my-account.php');
                exit();
            } else {
                $error_message = 'Adresse e-mail ou mot de passe incorrect.';
            }
        } else {
            $error_message = 'Aucun utilisateur trouvé avec cet e-mail.';
        }
    }
} catch (PDOException $e) {
    $error_message = 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>

<?php
include './navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles-connexion.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        function handleCredentialResponse(response) {
            const token = response.credential;
            fetch('/api/auth/google', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        token
                    }),
                })
                .then(response => response.json())
                .then(data => console.log('Réponse du serveur :', data))
                .catch(error => console.error('Erreur :', error));
        }
    </script>
</head>

<body>
    <div class="content">
        <h1 class="h1-connex">Connectez-vous</h1>
        <?php
        if (isset($error_message)) {
            echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
        }
        ?>
        <h3>Email</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="email" id="email" required>
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
        </form>

        <div class="connex-rs">
            <!-- Bouton Google Sign-In -->
            <div id="g_id_onload"
                data-client_id="1034339065791-3thgahi0eg6f1bbvgets1ljnvvldmkn4.apps.googleusercontent.com"
                data-callback="handleCredentialResponse">
            </div>
            <div class="g_id_signin"
                data-type="standard"
                data-shape="rectangular"
                data-theme="outline"
                data-text="sign_in_with"
                data-size="large"
                data-logo_alignment="middle">
            </div>
            <!-- Other buttons -->
            <!-- <a href="#" class="rs-button"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="rs-button"><i class="fa-brands fa-x-twitter"></i></a> -->
            <div class="no-compte">
                <p class="memorize">Vous n'avez pas encore de compte ? <a href="./register.php">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>
    </form>
    </div>
</body>

</html>

<?php

include './footer.php';

?>