
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `id_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `id_filiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `capacite` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `id_professeur` int(11) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  `jour` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche') NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departement` (`id_departement`);


ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_filiere` (`id_filiere`);


ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_professeur` (`id_professeur`),
  ADD KEY `id_salle` (`id_salle`);


ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `filiere`
  ADD CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`) ON DELETE SET NULL;


ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id`) ON DELETE SET NULL;


ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`id_professeur`) REFERENCES `professeur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seance_ibfk_3` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id`) ON DELETE SET NULL;
COMMIT;

