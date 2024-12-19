<?php
$host = 'localhost';
$dbname = 'la_bouzinerie';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Adresse e-mail invalide.');
    }
    function generateToken($length = 64) {
        return bin2hex(random_bytes($length / 2));
    }

    $token = generateToken();
    $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    $stmt = $pdo->prepare("INSERT INTO password_reset_token (email, token, expiration) VALUES (:email, :token, :expiration)");
    $stmt->execute([
        'email' => $email,
        'token' => $token,
        'expiration' => $expiration
    ]);
    $resetLink = "/PROJECT-M2H/front/password-reset.php?token=$token";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lien du token</title>
    <link rel="stylesheet" href="./css/styles-generate-token-password.css" type="text/css" media="all">
</head>
<body>
    <div class="content">
        <div class="reset-message">
            <p class="reset-link">Lien de réinitialisation : <a href='<?php echo $resetLink; ?>' class="reset-link">Cliquez ici</a></p>
        </div>
    </div>
</body>
</html>