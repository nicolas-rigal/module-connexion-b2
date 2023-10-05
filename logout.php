<?php
session_start(); // Démarre la session
session_destroy(); // Détruit toutes les données de session

// Redirigez l'utilisateur vers la page d'accueil ou une autre page après la déconnexion
header("Location: index.php");
exit;
?>
