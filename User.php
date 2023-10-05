<?php 

include "db_conn.php"; // Inclure le fichier de connexion à la base de données

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createUser($fname, $lname, $login, $pass) {
        if (empty($fname) || empty($lname) || empty($login) || empty($pass)) {
            $em = "All fields are required";
            return "error=$em&fname=$fname&lname=$lname&login=$login";
        } else {
            // Hashing the password
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (firstname, lastname, login, password) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$fname, $lname, $login, $pass]);

            return "success=Your account has been created successfully";
        }
    }

    public function connectUser($login, $pass) {
        try {
            $sql = "SELECT * FROM user WHERE login = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($pass, $user['password'])) {
                // Connexion réussie
                // Vous pouvez vérifier le rôle ici
                if ($user['role'] == 'simple') {
                    // Redirigez les utilisateurs simples vers leur page de profil
                    $_SESSION['user_role'] = 'simple'; // Stockez le rôle dans la session
                    header("Location: profil.php");
                    exit;
                } elseif ($user['role'] == 'admin') {
                    // Redirigez les administrateurs vers la page d'administration
                    $_SESSION['user_role'] = 'admin'; // Stockez le rôle dans la session
                    header("Location: admin.php");
                    exit;
                }
            } else {
                // Échec de la connexion
                echo "Login failed"; // Ajoutez un message de débogage si nécessaire
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getUserInfo($user_id) {
        try {
            $sql = "SELECT * FROM user WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            return false;
        }
    }
    
    
    public function updateUser($user_id, $fname, $lname, $login, $pass) {
        try {
            // Hasher le mot de passe si un nouveau mot de passe est fourni
            if (!empty($pass)) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET firstname = ?, lastname = ?, login = ?, password = ? WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$fname, $lname, $login, $pass, $user_id]);
            } else {
                $sql = "UPDATE user SET firstname = ?, lastname = ?, login = ? WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$fname, $lname, $login, $user_id]);
            }

            return true; // Mise à jour réussie
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            return false; // Échec de la mise à jour
        }
    }


    
}

?>