#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

INSERT INTO role(nom) VALUES ('Utilisateur');
INSERT INTO role(nom) VALUES ('Administrateur');

INSERT INTO ref_histoire(id_ref_histoire, nom, auteur, avis, url_image)
 VALUES (NULL, 'L\'histoire du lol', 'Jean Lol', 4, 'histoire.jpg'),
        (NULL, 'Le lol contre attack', 'Michel Lol', 2, 'histoire.jpg');

INSERT INTO detail_histoire (id_detail_histoire, contenue, numero_page, id_ref_histoire)
VALUES (NULL, '{\r\n	\"texte\": \"LOL 1\",\r\n	\"boutons\": [{\r\n			\"texte\": \"Page 2\",\r\n			\"action\": 2\r\n		},\r\n		{\r\n			\"texte\": \"Page 3\",\r\n			\"action\": 3\r\n		}\r\n	]\r\n}', '1', '1'), (NULL, '{\r\n	\"texte\": \"LOL 2\",\r\n	\"boutons\": [{\r\n			\"texte\": \"Page 1\",\r\n			\"action\": 1\r\n		},\r\n		{\r\n			\"texte\": \"Page 3\",\r\n			\"action\": 3\r\n		}\r\n	]\r\n}', '2', '1');

INSERT INTO detail_histoire (id_detail_histoire, contenue, numero_page, id_ref_histoire)
VALUES (NULL, '{\r\n	\"texte\": \"LOL 3\",\r\n	\"boutons\": [{\r\n			\"texte\": \"Page 1\",\r\n			\"action\": 1\r\n		},\r\n		{\r\n			\"texte\": \"Page 2\",\r\n			\"action\": 2\r\n		}\r\n	]\r\n}', '3', '1');

