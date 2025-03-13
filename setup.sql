-- insert into public.teams (id, name, logo, city, coach, president, description, season_id, created_at, updated_at, sheet_name, tag)
-- values  (3, 'Hercules Paralimpico', 'https://i.postimg.cc/XJtB4KFy/hercules.png', 'Alicante', ' ', ' ', ' ', 1, '2023-12-07 20:06:12', '2023-12-07 20:06:13', 'hercules', 'HPL'),
--         (1, 'S.D. Eibar', 'https://i.postimg.cc/fWGZjqD9/eibar.png', 'Eibar', 'Andoni Igartua', 'Ander Romarate', '  ', 1, '2023-12-07 20:04:58', '2023-12-07 20:05:00', 'eibar', 'EIB'),
--         (5, 'Selección extremeña PC', 'https://i.postimg.cc/mk6ZNTZf/fexpc.png', 'Extremadura', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'extremadura', 'FEX'),
--         (4, 'AMDDA Malaga', 'https://i.postimg.cc/zBQ2NQ0S/amdda.png', 'Málaga', ' ', ' ', ' ', 1, '2023-12-07 20:06:58', '2023-12-07 20:07:03', 'amdda', 'AMD'),
--         (7, 'Segunda Parte Elencor', 'https://i.postimg.cc/13MKSsx6/segunda-parte.png', 'Madrid', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'segunda_parte', 'FSP'),
--         (6, 'C.D. Tenerife', 'https://i.postimg.cc/W17540Zd/tenerife.png', 'Tenerife', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'tenerife', 'TEN'),
--         (2, 'Disport Smart Joie', 'https://i.postimg.cc/DwWzvPHg/disport.png', 'Barcelona', 'Iñaki Requena', ' ', ' ', 1, '2023-12-07 20:05:41', '2023-12-07 20:05:42', 'disport', 'DIS');

-- AMDDA
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('ARREDONDO GARCIA', 'JUAN DAVID', 'FT1', '', '', '', '', 1, 14),
    ('GOMES ARAGUAINAMO', 'DANIEL ANTONIO', 'FT1', '', '', '', '', 1, 14),
    ('MARIN TORRES', 'IVAN', 'FT1', '', '', '', '', 1, 14),
    ('BERNABE ACEDO', 'MANUEL', 'FT2', '', '', '', '', 1, 14),
    ('BUENO RUIZ', 'JOSE MANUEL', 'FT2', '', '', '', '', 1, 14),
    ('FLORES PINTO', 'ALAN', 'FT2', '', '', '', '', 1, 14),
    ('LAROSI SALAM', 'CHEJ', 'FT2', '', '', '', '', 1, 14),
    ('LUQUE LLORET', 'SALVADOR', 'FT2', '', '', '', '', 1, 14),
    ('PACHECO FERNANDEZ', 'ISAIAS', 'FT2', '', '', '', '', 1, 14),
    ('EL MOUSSAUDI', 'MOHAMED', 'FT2', '', '', '', '', 1, 14),
    ('AMATE GUILLEN', 'ALEXIS', 'FT2', '', '', '', '', 1, 14),
    ('SUAREZ LOPEZ', 'JOSE MANUEL', 'FT2', '', '', '', '', 1, 14),
    ('MARTIN GUTIERREZ', 'FRANCISCO JOSE', 'FT1', '', '', '', '', 1, 14);

-- TENERIFE
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('ABREU DOMINGUEZ', 'CRISTO MANUEL', 'FT1', '', '', '', '', 1, 11),
    ('AFONSO LOPEZ', 'PABLO', 'FT1', '', '', '', '', 1, 11),
    ('AGUILAR ESCUELA', 'TANAUSU', 'FT1', '', '', '', '', 1, 11),
    ('IBARRIA MARTIN', 'JUAN JOSE', 'FT1', '', '', '', '', 1, 11),
    ('BALLOU', 'ADAM KYLE', 'FT2', '', '', '', '', 1, 11),
    ('DIAZ PEREZ', 'AGONEY', 'FT2', '', '', '', '', 1, 11),
    ('GUTIERREZ TADEO', 'JOSE MARIA', 'FT2', '', '', '', '', 1, 11),
    ('OCAMPO PALACIO', 'JUAN DAVID', 'FT3', '', '', '', '', 1, 11),
    ('PACHECO PEREZ', 'RAUL', 'FT2', '', '', '', '', 1, 11),
    ('PEREZ TAVIO', 'ALEJANDRO', 'FT2', '', '', '', '', 1, 11),
    ('PEREZ PINA', 'LUKA', 'FT2', '', '', '', '', 1, 11),
    ('GARCIA SANCHEZ', 'ADRIAN', 'FT2', '', '', '', '', 1, 11),
    ('GUTIERREZ DE ARMAS', 'ADRIAN', 'FT2', '', '', '', '', 1, 11),
    ('BENITEZ KHATWANI', 'IVAN JOEL', 'FT2', '', '', '', '', 1, 11),
    ('OLIVARES MORA', 'ASDRUBAL', 'FT3', '', '', '', '', 1, 11),
    ('LUIS OLIVA', 'RUYMAN', 'FT3', '', '', '', '', 1, 11);

-- DISPORT
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('REQUENA SERRES', 'EDER', 'FT1', '', '', '', '', 1, 8),
    ('TREPAT SEGURA', 'DAVID', 'FT1', '', '', '', '', 1, 8),
    ('VALENTI LORENTE', 'CRISTIAN', 'FT1', '', '', '', '', 1, 8),
    ('AGUILAR DIAZ', 'POL', 'FT2', '', '', '', '', 1, 8),
    ('GONZALEZ CLAR', 'ALEJANDRO', 'FT2', '', '', '', '', 1, 8),
    ('GONZALEZ RUBIO', 'DAVID', 'FT2', '', '', '', '', 1, 8),
    ('JIMENEZ QUINTERO', 'ALBERTO', 'FT2', '', '', '', '', 1, 8),
    ('REQUENA SERRES', 'AKETZA', 'FT2', '', '', '', '', 1, 8),
    ('RIVERA SANCHEZ', 'GUILLEM', 'FT2', '', '', '', '', 1, 8),
    ('SANCHEZ PELEGRIN', 'MARIO', 'FT2', '', '', '', '', 1, 8),
    ('EASTWOOD FALCO', 'JORDI', 'FT3', '', '', '', '', 1, 8);

-- FEXPC
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('BOGDAN TIMOFTE', 'ALEXANDRU', 'FT1', '', '', '', '', 1, 13),
    ('PEDRAZA PEREZ', 'ALVARO', 'FT1', '', '', '', '', 1, 13),
    ('PEDRERA HINOJAL', 'ALEJANDRO', 'FT1', '', '', '', '', 1, 13),
    ('CHOVET BRITO', 'FRANCIS STARLIN', 'FT2', '', '', '', '', 1, 13),
    ('GUERRA CANSADO', 'JUAN MANUEL', 'FT2', '', '', '', '', 1, 13),
    ('PEREZ CLAEYS-BUOAERT', 'JUAN ANTONIO', 'FT2', '', '', '', '', 1, 13),
    ('SERREJON MURIANO', 'FRANCISCO', 'FT2', '', '', '', '', 1, 13),
    ('SOLAZ LAZARO', 'CESAR', 'FT2', '', '', '', '', 1, 13),
    ('ACOSTA HERNANDEZ', 'DAVID', 'FT3', '', '', '', '', 1, 13),
    ('CAÑADAS BARCO', 'ALEJANDRO', 'FT3', '', '', '', '', 1, 13),
    ('LOPEZ MUÑOZ', 'JORGE', '?', '', '', '', '', 1, 13),
    ('TREJO ARENILLA', 'JORGE', '?', '', '', '', '', 1, 13);

-- SEGUNDA PARTE
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('CHAMOSA TELO', 'NICOLAS MARTIN', 'FT1', '', '', '', '', 1, 10),
    ('CORTES CAMARMO', 'JAVIER', 'FT1', '', '', '', '', 1, 10),
    ('DE LAORDEN BARCELONA', 'EDUARDO JOSE', 'FT2', '', '', '', '', 1, 10),
    ('GONZALEZ LARRIBA', 'ABEL', 'FT2', '', '', '', '', 1, 10),
    ('GONZALEZ ROL', 'JAIME', 'FT2', '', '', '', '', 1, 10),
    ('RODRIGUEZ GRANDE', 'CARLOS', 'FT2', '', '', '', '', 1, 10),
    ('ZANCAJO ALEJANDRE', 'DANIEL', 'FT2', '', '', '', '', 1, 10),
    ('BONILLA MARTINEZ', 'MARCOS', 'FT2', '', '', '', '', 1, 10),
    ('FLORES CASTILLO', 'JAIME', 'FT2', '', '', '', '', 1, 10),
    ('ORTEGA RODRIGUEZ', 'JAVIER', 'FT2', '', '', '', '', 1, 10),
    ('ESCRIBA VALERA', 'VICENTE', 'FT3', '', '', '', '', 1, 10),
    ('MANSOA IGLESIAS', 'SANTIAGO', 'FT3', '', '', '', '', 1, 10),
    ('MARCOS RASERO', 'MIGUEL', 'FT3', '', '', '', '', 1, 10),
    ('DIAZ NARANJO', 'ESTEBAL', 'FT3', '', '', '', '', 1, 10);


-- HERCULES PARALIMPICO
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('CASCANT SEGUI', 'PABLO', 'FT1', '', '', '', '', 1, 12),
    ('PALAU BALLESTER', 'DANIEL ALBERT', 'FT1', '', '', '', '', 1, 12),
    ('LARA PASTOR', 'JORGE', 'FT1', '', '', '', '', 1, 12),
    ('ALBALADEJO MARTINEZ', 'JUAN', 'FT2', '', '', '', '', 1, 12),
    ('ALMENAR AVIÑO', 'JAUME', 'FT2', '', '', '', '', 1, 12),
    ('CEBRIAN BROSETA', 'OSCAR', 'FT2', '', '', '', '', 1, 12),
    ('CLEMENTE MUÑOZ', 'SERGIO NICOLAS', 'FT2', '', '', '', '', 1, 12),
    ('DIAZ MENDEZ', 'ANGELO', 'FT2', '', '', '', '', 1, 12),
    ('SANCHEZ GUCEMA', 'ANTONIO JESUS', 'FT2', '', '', '', '', 1, 12),
    ('SERRANO GARCIA', 'DARIO', 'FT2', '', '', '', '', 1, 12),
    ('RODRIGUEZ OLIVARES', 'GASPAR ENRIQUE', 'FT2', '', '', '', '', 1, 12),
    ('BARRETO GONZALEZ', 'DIEGO', 'FT2', '', '', '', '', 1, 12),
    ('ROVIRA MILLAN', 'DANNY', 'FT3', '', '', '', '', 1, 12),
    ('POLIT OTERO', 'DIEGO', 'FT3', '', '', '', '', 1, 12),
    ('MACIA ROVIRA', 'SANTIAGO', 'FT3', '', '', '', '', 1, 12),
    ('HERNANDEZ DIAZ', 'NICOLAS', 'FT3', '', '', '', '', 1, 12);

-- EIBAR
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('GADEA ASUNCION', 'HECTOR', 'FT1', '', '', '', '', 1, 9),
    ('POMBO MARCOS', 'BORJA', 'FT1', '', '', '', '', 1, 9),
    ('RUIZ DIEZ', 'MARTIN', 'FT1', '', '', '', '', 1, 9),
    ('UCIN AGUIRRE', 'AITOR', 'FT1', '', '', '', '', 1, 9),
    ('SANZ CASADO', 'IKER', 'FT1', '', '', '', '', 1, 9),
    ('ALMEIDA COBO', 'JOSUE', 'FT2', '', '', '', '', 1, 9),
    ('GOIKOETXEA FONSECA', 'IBAI', 'FT2', '', '', '', '', 1, 9),
    ('IBARRA VALDEMOROS', 'DANIEL', 'FT2', '', '', '', '', 1, 9),
    ('MARTINEZ GARCIA', 'YERIK', 'FT2', '', '', '', '', 1, 9),
    ('RUEDA AMBOAGE', 'SERGIO', 'FT2', '', '', '', '', 1, 9),
    ('VAREA LERENA', 'VICTOR', 'FT2', '', '', '', '', 1, 9),
    ('DIAZ SAIZ', 'RAUL', 'FT2', '', '', '', '', 1, 9),
    ('GAMIZ LOPEZ', 'DAVID', 'FT3', '', '', '', '', 1, 9),
    ('LOPEZ GOMEZ', 'JAVIER', 'FT3', '', '', '', '', 1, 9);
