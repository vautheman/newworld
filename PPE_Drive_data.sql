-- Data de la base de données newworld
-- fait le jeudi 19 septembre 2019
-- par AUTHEMAN Victor

-- mysql

-- Suppression des données existantes

DELETE FROM administrateur;
DELETE FROM superAdministrateur;
DELETE FROM produits;
DELETE FROM rayons;
DELETE FROM producteurs;
DELETE FROM clients;

-- Ajout des données dans les tables
-- Table producteur
INSERT INTO producteurs VALUES
  (1, "DUPOND", "Charlie", "contact@gmail.com", "motdepasse", "", "0649259506", "Le chat qui fume", "Commerçant", "6 rue des remparts", "166862025423", "a94a8fe5ccb1", "1"),
  (2, "DOE", "John", "john.doe@gmail.com", "motdepasse", "", "0649259506", "Chez john doe", "Agriculteur", "lieu-dit l'olivette", "45324564135456", "daf5z6fd5z4dfz", "1"),
  (3, "AUTHEMAN", "Victor", "authirard.victor@gmail.com", "6b3c679aeefef0add0753fd84ee38354815523a0", "", "0649259506", "Chez john doe", "Agriculteur", "lieu-dit l'olivette", "45324564135456", "daf5z6fd5z4dfz", "1");

INSERT INTO clients VALUES
(1, "AUTHEMAN", "Victor", "authirard.victor@gmail.com", "6b3c679aeefef0add0753fd84ee38354815523a0", "", "0649259506", "454534", "1");

-- Table administrateur
INSERT INTO administrateur VALUES (1, "autheman", "vautheman", "a94a8fe5ccb19ba61c4c0873d391e987982fbbd3", "authirard.victor@gmail.com", "0649259506");

-- Table rayons
INSERT INTO rayons VALUES
  (1, 1, "Cigarette", "vente de cigarette et autres", "cigarette.jpg"),
  (2, 1, "Briquet", "", "briquet.jpg"),
  (3, 2, "Légume", "Les bons légumes du jardin", "legumes.jpg"),
  (4, 2, "Fruits", "Les bons fruits de saisons", "fruits.jpg");

-- Table produits
INSERT INTO produits VALUES
  (1, 1, "Malboro red", "", "malborored.jpg", 8.50, 28, 0),
  (2, 1, "Malboro gold", "", "malborogold.jpg", 8.50, 36, 1),
  (3, 1, "Camel", "", "camel.jpg", 7.50, 18, 1),
  (4, 2, "Zippo", "", "zippo.jpg", 12.50, 9, 0),
  (5, 2, "Cricket", "", "cricket.jpg", 1.50, 31, 1),
  (6, 3, "Tomates", "", "tomates.jpg", 3.50, 851, 0),
  (7, 3, "Carottes", "", "carottes.jpg", 2.80, 421, 1),
  (8, 4, "Pêches", "", "peches.jpg", 1.80, 152, 1),
  (9, 4, "Pommes", "", "pommes.jpg", 0.90, 1562, 1);
