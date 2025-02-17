


CREATE TABLE animal_images (
  id_animal int(11) NOT NULL,
  id_images int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE animaux (
  id int(11) NOT NULL,
  prenom varchar(250) NOT NULL,
  race varchar(250) NOT NULL,
  habitat int(11) DEFAULT NULL,
  images int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO animaux (id, prenom, race, habitat, images) VALUES
(1, 'Giny', 'Girafe Masai', 1, 22),
(2, 'zaza', 'zebre ', 1, 32),
(3, 'eli', 'Elephant Loxodonta africana', 1, 20),
(4, 'leo', "lion de l\'Atlas", 1, 25),
(5, 'Adi', 'Aigle', 1, 14),
(6, 'Bagy', 'Guepard', 1, 24),
(7, 'Penny', 'Panthere', 2, 27),
(8, 'Doudou', 'ours ', 2, 26),
(9, 'Paco', 'Perroquet ', 2, 15),
(10, 'Gary', 'Gorilles ', 2, 23),
(11, 'Sily', 'Serpent ', 2, 17),
(12, 'Papito', 'Parresseux', 2, 28),
(13, 'Camille', 'caïman noir ', 3, 19),
(14, 'Brutus', 'buffle', 3, 18),
(15, 'Rachelle', 'Ragondin ', 3, 29),
(16, 'Flamy', 'Flament rose ', 3, 21),
(17, 'Samy', 'Salamandre ', 3, 31),
(18, 'Rene', 'Rainette ', 3, 30);

CREATE TABLE avis_veto (
  id int(11) NOT NULL,
  veto_id int(11) NOT NULL,
  animal_id int(11) NOT NULL,
  commentaire text NOT NULL,
  date_creation datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE contenu (
  id int(11) NOT NULL,
  titre varchar(250) NOT NULL,
  descriptions text DEFAULT NULL,
  images int(11) DEFAULT NULL,
  liens varchar(250) DEFAULT NULL,
  categorie varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO contenu (id, titre, descriptions, images, liens, categorie) VALUES
(1, 'Le Zoo', 'Découvrez un monde fascinant où la nature prend vie ! Niché au cœur de Plouah, notre zoo est un véritable sanctuaire pour plus de 300 animaux représentant 150 espèces venant des quatre coins du globe. Du majestueux lion d&amp;#039;Afrique à l&amp;#039;élégant panda géant, chaque visite vous transporte dans un voyage unique à travers les différents écosystèmes de notre planète.', 2, '#ttu', 'accueil'),
(2, 'Les services', 'Au Zoo Arcadia, nous mettons à votre disposition plusieurs services pour rendre votre visite inoubliable, tout en respectant notre engagement écologique. Restauration éco-responsable : Faites une pause gourmande dans notre espace de restauration, où nous privilégions des produits locaux et biologiques. Profitez de plats savoureux tout en contribuant à la réduction de notre empreinte environnementale. Visites guidées des habitats : Explorez les différents habitats du zoo avec un guide expert, gratuitement. Découvrez les espèces animales dans leur environnement recréé, et apprenez-en plus sur leurs comportements et les efforts de conservation. Balade en petit train : Montez à bord de notre petit train écologique pour une visite relaxante à travers le zoo. Une manière amusante et tranquille de découvrir tous nos animaux sans trop marcher !', 3, '/pages/services.php', 'accueil'),
(3, 'Les Animaux', 'À la rencontre des animaux du Zoo Arcadia\r\n                    Le Zoo Arcadia vous invite à découvrir la richesse de la faune à travers trois écosystèmes fascinants : la savane, le marais et la jungle.\r\n\r\n                    Les animaux de la savane\r\n                    Traversez les vastes étendues de la savane et rencontrez ses majestueux habitants. Du lion, roi des animaux, aux éléphants imposants en passant par les élégantes girafes, chaque espèce vous fascine par son adaptation à cet environnement aride.\r\n\r\n                    Les habitants des marais\r\n                    Dans les marais, un monde discret mais captivant vous attend. Observez les crocodiles se prélassant au soleil, les oiseaux aquatiques glissant sur l\'eau, et découvrez la faune surprenante des zones humides, où la biodiversité est riche et variée.\r\n\r\n                    Les créatures de la jungle\r\n                    Pénétrez dans l’épaisse végétation tropicale de la jungle pour y découvrir des espèces colorées et exotiques. Singes agiles, serpents mystérieux et oiseaux multicolores font de cet environnement une aventure inoubliable, où chaque pas révèle une nouvelle espèce fascinante.', 9, '/pages/animaux.php', 'accueil'),
(4, 'Les Habitats', 'Visite Guidée des Habitats au Zoo Arcadia. Profitez d\'une expérience unique avec notre visite guidée gratuite des habitats au Zoo Arcadia ! Explorez les différents écosystèmes du zoo avec nos guides passionnés qui vous plongeront au cœur de la biodiversité. Chaque visite vous offre l\'occasion d\'en apprendre davantage sur les animaux qui y résident et leur habitat naturel.', 3, '/pages/habitat.php', 'a'),
(5, 'Voici la galerie des animaux', 'Découvrez un monde fascinant où la nature prend vie ! Niché au cœur de Plouah, notre zoo est un véritable sanctuaire pour plus de 300 animaux représentant 150 espèces venant des quatre coins du globe. Du majestueux lion d\'Afrique à l\'élégant panda géant, chaque visite vous transporte dans un voyage unique à travers les différents écosystèmes de notre planète.', 3, '/pages/animaux.php?id=2', 'animaux'),
(6, 'La savane', 'Explorez la Savane au Zoo Arcadia. La savane est un écosystème vaste et ouvert, rempli de vie sauvage fascinante. Lors de votre visite, vous aurez l\'occasion de rencontrer des animaux emblématiques tels que les lions majestueux, les éléphants imposants et les élégantes girafes.', 10, '1', 'savane'),
(7, 'La jungle', 'Immersion dans la Jungle. Entrez dans le monde luxuriant de la jungle au Zoo Arcadia, un habitat tropical riche en biodiversité. Ici, la végétation dense abrite une multitude d\'espèces colorées et exotiques.', 6, '2', 'jungle'),
(10, 'nouvel article', 'coucou mes hibou', 42, NULL, 'accueil'),
(11, 'nouvel service', 'coucou', 43, NULL, 'service'),
(12, 'new', 'coucou', 44, NULL, 'service'),
(14, 'Le marais', 'À la Découverte du Marais. Le marais, avec son écosystème humide et riche, est un habitat unique à explorer au Zoo Arcadia.', 8, '3', 'marais'),
(15, 'nouvel article', 'ghyfy', 77, NULL, 'accueil');

CREATE TABLE habitat (
  id int(11) NOT NULL,
  titres varchar(250) NOT NULL,
  images int(11) DEFAULT NULL,
  liens varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO habitat (id, titres, images, liens) VALUES
(1, 'savane', 10, '/pages/habitats.php?id=1'),
(2, 'jungle', 6, '/pages/habitats.php?id=2'),
(3, 'marais', 8, '/pages/habitats.php?id=3');

CREATE TABLE images (
  id_img int(11) NOT NULL,
  chemin varchar(250) DEFAULT NULL,
  infos varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO images (id_img, chemin, infos) VALUES
(1, '/asset/zoo arcadia(2)1.png', 'logo'),
(2, '/asset/zoo-arcadia-accueil.png', 'contenu zoo'),
(3, '/asset/service.png', 'cover service'),
(4, '/asset/unsplash_yhn4okt6ci0-1.png', 'cover resto'),
(5, '/asset/zoo arcadia (5) 1-1.png', 'cover visite guide'),
(6, '/asset/zoo arcadia (5) 1.png', 'cover jungle'),
(7, '/asset/zoo arcadia (6) 1-1.png', 'cover train'),
(8, '/asset/zoo arcadia (6) 1.png', 'cover marais'),
(9, '/asset/singe.png', 'cover habitat'),
(10, '/asset/gazelle.png', 'cover savane'),
(11, '/asset/caroussel-jungle.png', 'caroussel'),
(12, '/asset/caroussel-marais.png', 'caroussel'),
(13, '/asset/caroussel-savane.png', 'caroussel'),
(14, '/asset/aigle.jpg', 'animal savane'),
(15, '/asset/perroquet.jpeg', 'animal jungle'),
(16, '/asset/salamandre.jpeg', 'animal marais'),
(17, '/asset/anacounda.jpeg', 'animal jungle'),
(18, '/asset/buffle.jpeg', 'animal marais'),
(19, '/asset/caiman.jpeg', 'animal marais'),
(20, '/asset/elephant.webp', 'animal savane'),
(21, '/asset/flament.jpeg', 'animal marais'),
(22, '/asset/girafe.webp', 'animal savane'),
(23, '/asset/gorille.jpeg', 'animal jungle'),
(24, '/asset/guepard.jpeg', 'animal savane'),
(25, '/asset/lion.jpeg', 'animal savane'),
(26, '/asset/ours.jpeg', 'animal jungle'),
(27, '/asset/panthere.jpeg', 'animal jungle'),
(28, '/asset/parresseux.jpg', 'animal jungle'),
(29, '/asset/ragondin.jpg', 'animal marais'),
(30, '/asset/rainette.jpeg', 'animal marais'),
(31, '/asset/salamandre.jpeg', 'animal marais'),
(32, '/asset/zebre.webp', 'animal savane'),
(33, '/asset/', NULL),
(34, '/asset/', NULL),
(35, '/asset/', NULL),
(36, '/asset/', NULL),
(37, '/asset/NOW (2).png', NULL),
(38, '/asset/FERME.jpg', NULL),
(39, '/asset/ALBUM.jpg', NULL),
(40, '/asset/ALBUM.jpg', NULL),
(41, '/asset/ALBUM.jpg', NULL),
(42, '/asset/ALBUM.jpg', NULL),
(43, '/asset/travis.png', NULL),
(44, '/asset/KALASH.jpg', NULL),
(45, '/asset/Design sans titre (11).png', NULL),
(46, '/asset/Design sans titre (14).png', NULL),
(47, '/asset/Design sans titre (14).png', NULL),
(75, '/asset/Design sans titre (8).png', NULL),
(76, '/asset/Design sans titre (8).png', NULL),
(77, '/asset/travis2 (1).png', NULL),
(78, '/asset/Design sans titre (12).png', NULL),
(79, '/asset/Design sans titre (12).png', NULL),
(80, '/asset/Design sans titre (12).png', NULL),
(81, '/asset/Design sans titre (12).png', NULL),
(82, '/asset/Design sans titre (12).png', NULL),
(83, '/asset/travis2.png', NULL),
(84, '/asset/LOUP.png', NULL),
(85, '/asset/LOUP.png', NULL),
(86, '/asset/LOUP.png', NULL),
(87, '/asset/Design sans titre (17).png', NULL),
(88, '/asset/Design sans titre (17).png', NULL);

CREATE TABLE rapport (
  id int(11) NOT NULL,
  prenom varchar(250) DEFAULT NULL,
  race varchar(250) DEFAULT NULL,
  etat varchar(250) DEFAULT NULL,
  nourriture varchar(250) DEFAULT NULL,
  grammage varchar(250) DEFAULT NULL,
  dates date DEFAULT NULL,
  date_creation datetime DEFAULT current_timestamp(),
  detail_animal int(11) DEFAULT NULL,
  commentaire text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO rapport (id, prenom, race, etat, nourriture, grammage, dates, date_creation, detail_animal, commentaire) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-04 20:23:43', 1, NULL),
(2, 'choisir un animal', 'choisir une race', '', '', '', '0000-00-00', '2024-11-07 10:53:59', 2, 'ok'),
(3, 'choisir un animal', 'choisir une race', '', '', '', '0000-00-00', '2024-11-07 10:55:58', 3, 'ok'),
(4, 'choisir un animal', 'choisir une race', '', '', '', '0000-00-00', '2024-11-07 10:56:50', NULL, 'ok'),
(5, 'choisir un animal', 'choisir une race', '', '', '', '0000-00-00', '2024-11-07 11:02:23', NULL, 'ok'),
(6, NULL, 'Girafe Masai', 'oui', 'banane', '30kg', '2025-03-06', '2025-02-11 09:03:02', 1, 'ed');

CREATE TABLE repas (
  id int(11) NOT NULL,
  repas varchar(255) DEFAULT NULL,
  animal_id int(11) DEFAULT NULL,
  nourriture varchar(255) NOT NULL,
  quantite int(11) NOT NULL,
  date_repas datetime NOT NULL,
  employe_id int(11) DEFAULT NULL,
  commentaire text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO repas (id, repas, animal_id, nourriture, quantite, date_repas, employe_id, commentaire) VALUES
(2, NULL, 2, 'pomme', 50, '2024-11-05 00:00:00', NULL, NULL),
(3, NULL, 7, 'pomme', 12, '2024-11-14 00:00:00', NULL, NULL),
(4, NULL, 1, '', 0, '2025-01-30 00:00:00', NULL, NULL),
(5, NULL, 15, '', 0, '2025-02-20 00:00:00', NULL, NULL),
(6, NULL, 16, 'croquette', 400, '2025-02-21 00:00:00', NULL, NULL),
(7, NULL, 9, 'banane', 40, '2025-02-08 00:00:00', NULL, NULL);

CREATE TABLE roles (
  id int(11) NOT NULL,
  nom varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO roles (id, nom) VALUES
(3, 'admin'),
(2, 'employee'),
(1, 'veterinaire');

CREATE TABLE service (
  id int(11) NOT NULL,
  titre varchar(250) NOT NULL,
  descriptions text DEFAULT NULL,
  images int(11) DEFAULT NULL,
  liens varchar(250) DEFAULT NULL,
  categorie varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO service (id, titre, descriptions, images, liens, categorie) VALUES
(1, 'Les services', 'Au Zoo Arcadia, nous mettons à votre disposition plusieurs services pour rendre votre visite inoubliable, tout en respectant notre engagement écologique. Restauration éco-responsable : Faites une pause gourmande dans notre espace de restauration, où nous privilégions des produits locaux et biologiques. Profitez de plats savoureux tout en contribuant à la réduction de notre empreinte environnementale. Visites guidées des habitats : Explorez les différents habitats du zoo avec un guide expert, gratuitement. Découvrez les espèces animales dans leur environnement recréé, et apprenez-en plus sur leurs comportements et les efforts de conservation. Balade en petit train : Montez à bord de notre petit train écologique pour une visite relaxante à travers le zoo. Une manière amusante et tranquille de découvrir tous nos animaux sans trop marcher !', 3, '/pages/services.php', 'service'),
(2, 'Visite guidé des habitats'," Visite Guidée des Habitats au Zoo Arcadia\r\nProfitez d\'une expérience unique avec notre visite guidée gratuite des habitats au Zoo Arcadia !\r\nExplorez les différents écosystèmes du zoo avec nos guides passionnés qui vous plongeront au cœur de la biodiversité. Chaque visite vous offre l\'occasion d\'en apprendre davantage sur les animaux qui y résident et leur habitat naturel.Au cours de cette expérience enrichissante, vous découvrirez les adaptations étonnantes des espèces, leurs comportements et les efforts de conservation déployés pour protéger ces animaux dans la nature. Que vous soyez un amoureux des animaux ou simplement curieux d\'en savoir plus, cette visite guidée est l\'occasion parfaite pour explorer et apprécier la beauté de la faune.Rejoignez-nous pour une aventure éducative et inoubliable au Zoo Arcadia !", 5, '#', 'service'),
(3, 'Les Restaurants', "Nos Restaurants au Zoo Arcadia\r\nLors de votre visite au Zoo Arcadia, profitez d\'une expérience culinaire unique grâce à nos trois restaurants thématiques, chacun inspiré par un écosystème naturel.Au Marais\r\nImmergez-vous dans l’atmosphère paisible des zones humides tout en savourant des plats à base de produits locaux et frais. Ce restaurant propose une cuisine saine, idéale pour les amateurs de nature et de tranquillité.\r\nÀ la Savane\r\nVoyagez au cœur de l’Afrique avec une cuisine aux saveurs épicées et exotiques. Ce restaurant est parfait pour les aventuriers à la recherche de plats qui évoquent la chaleur et les traditions des grandes plaines africaines.\r\nDans la Jungle\r\nEntrez dans une ambiance tropicale, où vous pourrez déguster des plats exotiques, riches en fruits et légumes. Ce restaurant est un véritable voyage sensoriel, au milieu d\'une végétation luxuriante.", 4, '/pages/Restaurants.php', 'service'),
(4, 'Visitez avec le petit train', 'Visite du Zoo en Petit Train\r\nEnvie de découvrir le Zoo Arcadia de manière ludique et confortable ? Montez à bord de notre petit train et laissez-vous guider à travers les différents habitats !\r\n\r\nCette promenade paisible est idéale pour toute la famille. Vous traverserez la savane, les marais et la jungle tout en profitant de vues imprenables sur les animaux et la nature environnante. Les guides présents à bord vous fourniront des informations fascinantes sur les espèces que vous croiserez, rendant cette visite à la fois amusante et éducative.\r\n\r\nMontez à bord du petit train et partez pour une aventure inoubliable à travers le monde fascinant des animaux au Zoo Arcadia !', 7, '#', 'service'),
(5, 'Resto savane', 'Entrées\r\n\r\nSalade exotique de mangue et avocat - 8,50 €\r\n\r\nBrochette de crevettes grillées au piment doux - 10,00 €\r\n\r\nPlats\r\n\r\nFilet de bœuf grillé aux épices de la savane - 18,50 €\r\n\r\nPoulet mariné à l’ananas et noix de coco - 16,00 €\r\n\r\nDesserts\r\n\r\nTarte banane-caramel - 7,00 €\r\n\r\nCoupe de fruits tropicaux - 6,50 €', 2, '#', 'restau'),
(6, 'Jungle buger', 'Burgers\r\n\r\nJungle Classic (steak, cheddar, laitue, tomate) - 12,00 €\r\n\r\nVolcano Burger (steak épicé, sauce piquante, oignons grillés) - 13,50 €\r\n\r\nVeggie Delight (galette végétale, avocat, pousses d’épinard) - 11,00 €\r\n\r\nAccompagnements\r\n\r\nFrites de patates douces - 4,50 €\r\n\r\nSalade de quinoa et légumes grillés - 5,00 €\r\n\r\nBoissons\r\n\r\nSmoothie mangue-passion - 5,00 €\r\n\r\nLimonade maison - 4,00 €', 2, '#', 'restau'),
(7, 'Le Marais écrémé', 'Entrées\r\n\r\nVelouté de courge au lait de coco - 7,50 €\r\n\r\nTartare de saumon et pommes Granny - 9,00 €\r\n\r\nPlats\r\n\r\nBar rôti à la crème de fenouil - 19,50 €\r\n\r\nRisotto crémeux aux champignons des bois - 17,00 €\r\n\r\nDesserts\r\n\r\nCrème brûlée à la vanille Bourbon - 6,50 €\r\n\r\nSoufflé glacé au citron vert - 7,50 €', 2, '#', 'restau');

CREATE TABLE users (
  id int(11) NOT NULL,
  email varchar(250) NOT NULL,
  Passwords varchar(250) NOT NULL,
  roles int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users (id, email, Passwords, roles) VALUES
(1, 'veto@zoo.com', '$2y$10$U/XvmUFZjeGcLj2WX0mUV.jkIRV5Y3q/OovAJO7Ox2LgCJldwcua2', 1),
(2, 'emp@zoo.com', '$2y$10$SRwKHIJZA.etsB2ywT5cIuwQDYQnPms2WBCX/45uQ75eAy3.c.pb.', 2),
(3, 'admin@zoo.com', '$2y$10$$2y$10$GvMm/4WpZd5I9SFqFDEcl.S.SjTw9IlG2FeDsMfua8vRng4x35tEG ', 3),
(4, 'test@test.fr', '$2y$10$NDaHSi00Xwja/k6FhixzAOx89rhso5ZeOH75QnRL1igVOAdX5Md0m', 3),
(13, 'test2@test.fr', '$2y$10$YCaxWfvo45wQyoPuidowtOpUhOrUBIBeZjk0qFgjgILSMSVmTmexC', 2),
(15, 'test5@test.fr', '$2y$10$024pardzrcmraMf2123FfusU0yj94ac2Ipqj4KxYe0nkfsLc7MtSa', 1),
(16, 'test8@test.fr', '$2y$10$2vshrL23Fi4C0D6U0nezSuZcjNplWjAre76n2MDMEI/gRd4EIBvJG', 1);


ALTER TABLE animal_images
  ADD PRIMARY KEY (id_animal,id_images),
  ADD KEY id_images (id_images);

ALTER TABLE animaux
  ADD PRIMARY KEY (id),
  ADD KEY habitat (habitat),
  ADD KEY images (images);

ALTER TABLE avis_veto
  ADD PRIMARY KEY (id),
  ADD KEY animal_id (animal_id);

ALTER TABLE contenu
  ADD PRIMARY KEY (id),
  ADD KEY images (images);

ALTER TABLE habitat
  ADD PRIMARY KEY (id),
  ADD KEY images (images);

ALTER TABLE images
  ADD PRIMARY KEY (id_img);

ALTER TABLE rapport
  ADD PRIMARY KEY (id),
  ADD KEY detail_animal (detail_animal);

ALTER TABLE repas
  ADD PRIMARY KEY (id),
  ADD KEY animal_id (animal_id);

ALTER TABLE roles
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY nom (nom);

ALTER TABLE service
  ADD PRIMARY KEY (id),
  ADD KEY images (images);

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email),
  ADD KEY roles (roles);


ALTER TABLE animaux
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE avis_veto
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE contenu
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE habitat
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE images
  MODIFY id_img int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE rapport
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE repas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE roles
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE service
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE animal_images
  ADD CONSTRAINT animal_images_ibfk_1 FOREIGN KEY (id_images) REFERENCES animaux (id),
  ADD CONSTRAINT animal_images_ibfk_2 FOREIGN KEY (id_animal) REFERENCES animaux (images);

ALTER TABLE animaux
  ADD CONSTRAINT animaux_ibfk_1 FOREIGN KEY (habitat) REFERENCES habitat (id),
  ADD CONSTRAINT animaux_ibfk_2 FOREIGN KEY (images) REFERENCES images (id_img);

ALTER TABLE avis_veto
  ADD CONSTRAINT avis_veto_ibfk_1 FOREIGN KEY (animal_id) REFERENCES animaux (id);

ALTER TABLE contenu
  ADD CONSTRAINT contenu_ibfk_1 FOREIGN KEY (images) REFERENCES images (id_img);

ALTER TABLE habitat
  ADD CONSTRAINT habitat_ibfk_1 FOREIGN KEY (images) REFERENCES images (id_img);

ALTER TABLE rapport
  ADD CONSTRAINT rapport_ibfk_1 FOREIGN KEY (detail_animal) REFERENCES animaux (id);

ALTER TABLE repas
  ADD CONSTRAINT repas_ibfk_1 FOREIGN KEY (animal_id) REFERENCES animaux (id);

ALTER TABLE service
  ADD CONSTRAINT service_ibfk_1 FOREIGN KEY (images) REFERENCES images (id_img);

ALTER TABLE users
  ADD CONSTRAINT users_ibfk_1 FOREIGN KEY (roles) REFERENCES `roles` (id);


