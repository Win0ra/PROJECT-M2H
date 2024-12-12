<?php
// NAVBAR START
include './navbar.php';
// NAVBAR END


// $POST & $FILE START 
    session_start();

    use LaBouzinerie\Classes\UserIdentified;

    require_once dirname(__DIR__)."/back/bootstrap.php";
    require_once dirname(__DIR__) . "/back/src/recover/index.php";

    if (!empty($_POST)){
        $isPasswordConfirmed = false;
        $isEmailUnique = true;
        $isSucces = false;

        // VERIFICATION DE LA CONFIRMATION DU MOT DE PASSE
        if (!empty($_POST['password']) && $_POST['password'] === $_POST['confirmation']) {
            $isPasswordConfirmed = true;
        }else{
            ?>
            <div class="alert alert-danger d-flex align-items-center bandeau" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    La confirmation du mot de passe a échoué.
                </div>
            </div>
            <?php
        }

        // VERIFICATION D'UN EMAIL UNIQUE
        if(!empty($allUserIdentified) && $isPasswordConfirmed) {
            foreach($allUserIdentified as $user) {
                if ($user->getEmail() === $_POST['email']) {
                    $isEmailUnique = false;
                }
            }
            if (!$isEmailUnique) {
                ?>
                <div class="alert alert-warning d-flex align-items-center bandeau" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        Cet e-mail à déjà été enregistré.
                    </div>
                </div> 
                <?php
            }
        }

        // CREATION D'UN NOUVEL UTILISATEUR
        if ($isPasswordConfirmed && $isEmailUnique) {
            $elo = 0;
            $birthday = new DateTime($_POST['birthday']);
            $securePassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user = new UserIdentified (
                $_POST['pseudo'],
                $elo,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['sexe'], 
                $birthday,
                $_POST['email'],
                $securePassword,
            );
            $entityManager->persist($user);

            // ENREGISTREMENT DANS LA BDD (FLUSH) 
            try {
                $entityManager->flush();
                $isSucces = true;
            } catch (\Throwable $th) {
                error_log($th->getMessage());
                throw $th;
            }

            // REDIRECTION SUR LA HOMEPAGE PERSONNALISÉ
            if ($isSucces){
                $_SESSION['isAuthentified'] = $isSucces;
                $_SESSION['firstname'] = $_POST['prenom'];
                $_SESSION['lastname'] = $_POST['nom'];
                
                header("location: ./index.php");
            } 
        }
    }
?>


<!----- FORMULAIRE START ----->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles-inscription.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/e98829b701.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <form action="" method="post">
        <div class="content">
            <h1 class="h1-register">Inscrivez-vous</h1>

            <!-- INFORMATIONS PERSOS -->

            <div class="infos-perso">
                <div class="left">


                    <h3>Prénom</h3>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

                    <h3>E-mail</h3>
                    <input type="email" name="email" id="email" placeholder="MonsieurBouzin@gmail.com" required>

                    <h3>Mot de passe</h3>
                    <input type="password" name="password" id="password" placeholder="****************" class="center-placeholder" required>

                    <h3>Genre</h3>
                    <div class="select-sex">
                        <i class="fa-solid fa-angle-down"></i>
                        <select name="sexe" id="sexe" required>
                            <option value="" disabled selected hidden>Votre genre ?</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="femme">Autre</option>
                        </select>
                    </div>

                </div>

                <div class="right">
                    <h3>Nom</h3>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>

                    <h3>Pseudo</h3 required>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Le-plus-grand-des-bouzins" required>

                    <h3>Confirmer le mot de passe</h3>
                    <input type="password" name="confirmation" id="password-confirm" placeholder="****************"  required 
                    class="center-placeholder" onpaste="return false;" oncopy="return false;" oncut="return false;" autocomplete="off">

                    <h3>Date de naissance</h3>
                    <input type="date" name="birthday" id="age" placeholder="JJ/MM/AAAA" required>
                </div>
            </div>

            <!-- CARTES CENTRES D'INTERETS -->

            <div class="interests">
                <h3>Centre d'intérêts</h3>
                <p class="p-interests"> Choisissez vos centres d'intérêts</p>
            </div>
            <div class="center interest">
                <div class="card-ci"><i class="fa-solid fa-basketball"></i>
                    <p class="txt-card">Sport</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-flask-vial"></i>
                    <p class="txt-card">Science</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-music"></i>
                    <p class="txt-card">Music</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-video"></i>
                    <p class="txt-card">Film</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-feather"></i>
                    <p class="txt-card">Histoire</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-earth-americas"></i>
                    <p class="txt-card">Géographie</p>
                </div>
                <div class="card-ci"><i class="fa-solid fa-gamepad"></i>
                    <p class="txt-card">Jeux Vidéos</p>
                </div>
            </div>

            <!-- FIN DU FORMULAIRE -->

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox" required>
                <p class="cgu">J'accepte les Conditions Générales d'Utilisation et la Politique de Confidentialité.
                    Je reconnais que mes données seront traitées conformément à cette politique.
                    Je comprends que je peux me désinscrire à tout moment.</p>
            </div>
            <button type="submit" class="register">
                <i class="fa-solid fa-pen-to-square" id="i-white"></i>
                <p class="txt-register">Inscription</p>
            </button>
        </div>
    </form>
    <script src="./js/script-register.js"></script>
</body>

</html>
<!----- FORMULAIRE END ----->


<!----- FOOTER START ----->
<?php include './footer.php'; ?>
<!----- FOOTER END ----->