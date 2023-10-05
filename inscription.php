<?php
session_start(); // Démarre la session

include "User.php"; // Inclure le fichier contenant la classe User
include "db_conn.php"; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $user = new User($conn);
    $result = $user->createUser($fname, $lname, $login, $pass);

    if (strpos($result, "error") !== false) {
        // Une erreur s'est produite lors de l'inscription, redirigez vers le formulaire d'inscription avec un message d'erreur
        header("Location: inscription.php?$result");
        exit;
    } elseif (strpos($result, "success") !== false) {
        // L'inscription a réussi, redirigez vers la page de connexion avec un message de succès
        header("Location: connection.php?$result");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connection.php">Connexion</a></li>
        </ul>
    </nav>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3" action="inscription.php" method="post">
            <h4 class="display-4  fs-1">Créer un compte</h4><br>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" name="fname" value="<?php echo (isset($_GET['fname'])) ? $_GET['fname'] : ""; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="lname" value="<?php echo (isset($_GET['lname'])) ? $_GET['lname'] : ""; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="login" value="<?php echo (isset($_GET['login'])) ? $_GET['login'] : ""; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="pass">
            </div>

            <button type="submit" class="btn btn-primary">S'inscrire</button>
            <a href="connection.php" class="link-secondary">Se connecter</a>
        </form>
    </div>
</body>

</html>
