<?php
session_start(); // Démarre la session

include "User.php"; // Inclure le fichier contenant la classe User

if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Placez ici votre code de traitement de la connexion

$login = $_POST['login'];
$pass = $_POST['pass'];

// Utilisez la méthode connectUser pour gérer la connexion
$user = new User($conn); // $conn devrait être défini dans db_conn.php
if ($user->connectUser($login, $pass)) {
    // Connexion réussie, redirigez l'utilisateur en fonction du rôle
    // Le code de redirection basé sur le rôle est déjà inclus dans votre méthode connectUser
    exit; // Il est important de sortir du script après la redirection
} else {
    // Échec de la connexion
    $error = "Nom d'utilisateur ou mot de passe incorrect";
}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<title>Connexion</title>
<!-- Vos balises meta et autres balises head ici -->
</head>

<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form class="shadow p-3" action="" method="post">
                <h4 class="display-4 fs-1">Connexion</h4><br>
                <?php
                if (isset($error)) {
                    // Affichez le message d'erreur ici
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }
                ?>

                <div class="mb-3">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="login">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="pass">
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="inscription.php" class="link-secondary">S'inscrire</a>
            </form>
        </div>
    </div>
</div>

</body>

</html>