<?php
session_start(); // Démarre la session

if (!$_SESSION['user_role'] == 'simple') {
    // L'utilisateur n'a pas le rôle "admin", redirigez-le vers une page d'erreur ou une autre page appropriée
    header("Location: error.php"); // Remplacez "error.php" par la page de votre choix
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Je suis la page profil</h1>

    <!-- Ajoutez ce bouton de déconnexion à l'endroit approprié de votre page -->
    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger">Déconnexion</button>
    </form>


    <!-- Ajoutez ici le contenu spécifique à la page profil -->
</body>

</html>