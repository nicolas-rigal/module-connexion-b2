<?php
session_start(); // Démarre la session

if ($_SESSION['user_role'] !== 'admin') {
    // L'utilisateur n'a pas le rôle "admin", redirigez-le vers une page d'erreur ou une autre page appropriée
    header("Location: error.php"); // Remplacez "error.php" par la page de votre choix
    exit;
}

// Inclure le fichier de connexion à la base de données
include "db_conn.php";

// Effectuer une requête SQL pour récupérer toutes les informations des utilisateurs
$sql = "SELECT * FROM user";
$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Je suis la page d'administration</h1>
    
    <!-- Ajoutez ce bouton de déconnexion à l'endroit approprié de votre page -->
    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger">Déconnexion</button>
    </form>
    
    <!-- Affichez ici les informations des utilisateurs -->
    <h2>Liste des utilisateurs</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>rôle</th>

            <!-- Ajoutez d'autres colonnes pour afficher d'autres informations si nécessaire -->
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";

            // Ajoutez d'autres cellules pour afficher d'autres informations si nécessaire
            echo "</tr>";
        }
        ?>
    </table>
    
    <!-- Ajoutez ici le contenu spécifique à la page d'administration -->
</body>

</html>