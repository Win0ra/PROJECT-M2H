<?php

$host = 'localhost';
$dbname = 'la_bouzinerie';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('Erreur de connexion à la base de données : ' . htmlspecialchars($e->getMessage()));
}

date_default_timezone_set('Europe/Paris');

$token = '';
$passwordError = '';
$errorMessage = '';
$resetSuccess = false;

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $token = $_GET['token'] ?? null;

        if (!$token) {
            throw new Exception('Token manquant.');
        }

        $stmt = $pdo->prepare("SELECT token, expiration, created_at FROM password_reset_token WHERE token = :token");
        $stmt->execute(['token' => $token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $expirationTime = $result['expiration'];
            $createdTime = $result['created_at'];
            $currentTime = date('Y-m-d H:i:s');

            if (strtotime($expirationTime) <= strtotime($createdTime)) {
                $newExpiration = date('Y-m-d H:i:s', strtotime($createdTime . ' + 20 minutes'));
                $stmt = $pdo->prepare("UPDATE password_reset_token SET expiration = :expiration WHERE token = :token");
                $stmt->execute([
                    'expiration' => $newExpiration,
                    'token' => $token
                ]);
            }

            $stmt = $pdo->prepare("SELECT email FROM password_reset_token WHERE token = :token AND expiration > NOW()");
            $stmt->execute(['token' => $token]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                throw new Exception('Token invalide ou expiré.');
            }
        } else {
            throw new Exception('Token invalide ou expiré.');
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['token'] ?? null;
        $newPassword = $_POST['password'] ?? null;

        if (!$token || !$newPassword) {
            throw new Exception('Données manquantes.');
        }

        if (!preg_match('/[A-Z]/', $newPassword) || !preg_match('/\d/', $newPassword) || strlen($newPassword) < 8) {
            $passwordError = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, et un chiffre/caractère spécial.';
        } else {
            $stmt = $pdo->prepare("SELECT email FROM password_reset_token WHERE token = :token AND expiration > NOW()");
            $stmt->execute(['token' => $token]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                throw new Exception('Token invalide ou expiré.');
            }

            $email = $result['email'];
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE useridentified SET password = :password WHERE email = :email");
            $stmt->execute([
                'password' => $hashedPassword,
                'email' => $email
            ]);

            $stmt = $pdo->prepare("DELETE FROM password_reset_token WHERE token = :token");
            $stmt->execute(['token' => $token]);

            $resetSuccess = true;
        }
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="./css/styles-password-reset.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if ($resetSuccess): ?>
            const form = document.querySelector('.form-reset form');
            if (form) form.style.display = 'none';

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.innerText = 'Mot de passe réinitialisé avec succès.';
            document.querySelector('.form-reset').prepend(alertDiv);

            const linkDiv = document.createElement('div');
            linkDiv.className = 'return-link';
            linkDiv.innerHTML = '<a href="connexion.php" class="a-retour">Retour à connexion</a>';
            document.querySelector('.form-reset').appendChild(linkDiv);
            <?php endif; ?>
        });
    </script>
</head>

<body>
    <div class="content">
        <div class="form-reset">
            <?php if (!empty($errorMessage)): ?>
                <div class="text-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
            <?php elseif (!$resetSuccess): ?>
                <form method="POST" action="">
                    <input type="hidden" name="token" class="input-token" value="<?php echo htmlspecialchars($token); ?>">
                    <p class="label">Nouveau mot de passe :</p>
                    <input type="password" id="password" name="password" required>
                    <?php if (!empty($passwordError)): ?>
                        <div class="text-danger"><?php echo htmlspecialchars($passwordError); ?></div>
                    <?php endif; ?>
                    <button type="submit" class="reset-password">Réinitialiser le mot de passe</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
