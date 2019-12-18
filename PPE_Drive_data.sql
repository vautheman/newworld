-- Data de la base de données newworld
-- fait le jeudi 19 septembre 2019
-- par AUTHEMAN Victor

-- mysql

-- Suppression des données existantes

DELETE FROM role;
DELETE FROM administrateur;
DELETE FROM producteurs;
DELETE FROM clients;
DELETE FROM produits;
DELETE FROM rayons;
DELETE FROM typeProduit;
DELETE FROM utilisateur;

-- Ajout des données dans les tables
-- Table producteur

INSERT INTO role VALUES
(1, "administrateur"),
(2, "producteur");

INSERT INTO utilisateur VALUES
(1, 'AUTHEMAN', 'Victor', 'authirard.victor@gmail.com', NULL, '0649259506', 'ij4udh1A*', 1, now(), '5654623215213', '1');


INSERT INTO producteurs VALUES
  (1, "Le chat qui fume", "Commerçant", "6 rue des remparts", "France", "05000", "Gap", "166862025423", 1),
  (2, "Chez john doe", "Agriculteur", "lieu-dit l'olivette", "France", "05000", "Gap", "45324564135456", 1);

INSERT INTO clients VALUES
  (1, 1);

-- Table administrateur
INSERT INTO administrateur VALUES
  (1, 1);

INSERT INTO typeProduit VALUES
  (1, "Paquet de 5", "", 1),
  (2, "Paquet de 20", "", 1),
  (3, "Briquet à gaz", "", 2),
  (4, "Briquet électrique", "", 2),
  (5, "Carottes", "", 3),
  (6, "peches", "", 4),
  (7, "Pommes", "", 4),
  (8, "Tomate", "", 3);

-- Table rayons
INSERT INTO rayons VALUES
  (1, "Cigarette", "vente de cigarette et autres", "cigarette.jpg", 0),
  (2, "Briquet", "", "briquet.jpg", 0),
  (3, "Légume", "Les bons légumes du jardin", "legumes.jpg", 0),
  (4, "Fruits", "Les bons fruits de saisons", "fruits.jpg", 0);

-- Table produits
INSERT INTO produits VALUES
  (1, "Malboro red", "", "malborored.jpg", 8.50, 28, 0, 1, 1),
  (2, "Malboro gold", "", "malborogold.jpg", 8.50, 36, 1, 1, 2),
  (3, "Camel", "", "camel.jpg", 7.50, 18, 1, 1, 2),
  (4, "Zippo", "", "zippo.jpg", 12.50, 9, 0, 1, 3),
  (5, "Cricket", "", "cricket.jpg", 1.50, 31, 1, 1, 3),
  (6, "Tomates Cerise", "", "tomates.jpg", 3.50, 851, 0, 1, 8),
  (7, "Carottes Orange", "", "carottes.jpg", 2.80, 421, 1, 1, 5),
  (8, "Pêches Juteuse", "", "peches.jpg", 1.80, 152, 1, 1, 6),
  (9, "Pommes Rouge", "", "pommes.jpg", 0.90, 1562, 1, 1, 7);
