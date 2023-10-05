-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 oct. 2023 à 08:47
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexionb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('simple','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `firstname`, `lastname`, `password`, `role`) VALUES
(1, 'toto', 'toto', 'toto', 'toto', 'admin'),
(2, 'Nicolas', 'Nicolas', 'Nicolas', '$2y$10$PtJ7seG8Uduar4owaPv3AuBp.PiFK9rGN5rclCKBzZf/yK2LUWYCO', 'simple'),
(3, 'tata', 'tata', 'tata', '$2y$10$9cojM/nuF8MlTPMESZ7kZeNCGwx5NGQWDZ5AVipxXoffFnI9ItgwS', 'simple'),
(4, 'titi', 'titi', 'titi', '$2y$10$pFN.it.7wXuXLn5oarvbOOZY5PCVe9637USkv.KeCLzAg/9QDFvZ2', 'simple'),
(5, 'tara', 'tara', 'tara', '$2y$10$OtXylFlIN1eYURWhsciDleyKFRkAIEtZXGwRDUDsl3F56gJkHpe0S', 'simple'),
(6, 'mimi', 'mimi', 'mimi', '$2y$10$c9ILCMU8nKe00wgLyCHyZOonY0osMVLOasr.0wRX9nEKtImHoJFmK', 'admin'),
(7, 'admiN1337$', 'admiN1337$', 'admiN1337$', '$2y$10$.CHebag4KfTtcl24Tow2iuUJvmFRawD./qHi4lN5PTLhXM6WIxLui', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
