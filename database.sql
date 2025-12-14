CREATE DATABASE gestion_emploi;
USE gestion_emploi;
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nom VARCHAR(100),
 email VARCHAR(100),
 mot_de_passe VARCHAR(255),
 role ENUM('admin','professeur')
);

INSERT INTO users VALUES
(NULL,'Admin','admin@test.com',SHA2('1234',256),'admin'),
(NULL,'Prof','prof@test.com',SHA2('1234',256),'professeur');