insert into public.teams (id, name, logo, city, coach, president, description, season_id, created_at, updated_at, sheet_name, tag)
values  (3, 'Hercules Paralimpico', 'https://i.postimg.cc/XJtB4KFy/hercules.png', 'Alicante', ' ', ' ', ' ', 1, '2023-12-07 20:06:12', '2023-12-07 20:06:13', 'hercules', 'HPL'),
        (1, 'S.D. Eibar', 'https://i.postimg.cc/fWGZjqD9/eibar.png', 'Eibar', 'Andoni Igartua', 'Ander Romarate', '  ', 1, '2023-12-07 20:04:58', '2023-12-07 20:05:00', 'eibar', 'EIB'),
        (5, 'Selección extremeña PC', 'https://i.postimg.cc/mk6ZNTZf/fexpc.png', 'Extremadura', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'extremadura', 'FEX'),
        (4, 'AMDDA Malaga', 'https://i.postimg.cc/zBQ2NQ0S/amdda.png', 'Málaga', ' ', ' ', ' ', 1, '2023-12-07 20:06:58', '2023-12-07 20:07:03', 'amdda', 'AMD'),
        (7, 'Segunda Parte Elencor', 'https://i.postimg.cc/13MKSsx6/segunda-parte.png', 'Madrid', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'segunda_parte', 'FSP'),
        (6, 'C.D. Tenerife', 'https://i.postimg.cc/W17540Zd/tenerife.png', 'Tenerife', '  ', ' ', ' ', 1, '2023-12-07 20:07:16', '2023-12-07 20:07:17', 'tenerife', 'TEN'),
        (2, 'Disport Smart Joie', 'https://i.postimg.cc/DwWzvPHg/disport.png', 'Barcelona', 'Iñaki Requena', ' ', ' ', 1, '2023-12-07 20:05:41', '2023-12-07 20:05:42', 'disport', 'DIS');

-- AMDDA
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('ARREDONDO GARCIA', 'JUAN DAVID', 'FT1', '', '', '', '', 1, 4),
    ('GOMES ARAGUAINAMO', 'DANIEL ANTONIO', 'FT1', '', '', '', '', 1, 4),
    ('MARIN TORRES', 'IVAN', 'FT1', '', '', '', '', 1, 4),
    ('BERNABE ACEDO', 'MANUEL', 'FT2', '', '', '', '', 1, 4),
    ('BUENO RUIZ', 'JOSE MANUEL', 'FT2', '', '', '', '', 1, 4),
    ('FLORES PINTO', 'ALAN', 'FT2', '', '', '', '', 1, 4),
    ('LAROSI SALAM', 'CHEJ', 'FT2', '', '', '', '', 1, 4),
    ('LUQUE LLORET', 'SALVADOR', 'FT2', '', '', '', '', 1, 4),
    ('PACHECO FERNANDEZ', 'ISAIAS', 'FT2', '', '', '', '', 1, 4),
    ('EL MOUSSAUDI', 'MOHAMED', 'FT2', '', '', '', '', 1, 4),
    ('AMATE GUILLEN', 'ALEXIS', 'FT2', '', '', '', '', 1, 4),
    ('LOPEZ CAMARENA', 'MANUEL', 'FT3', '', '', '', '', 1, 4),
    ('RUIZ PELAEZ', 'FRANCISCO JOSE', 'FT3', '', '', '', '', 1, 4);
-- TENERIFE
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('ABREU DOMINGUEZ', 'CRISTO MANUEL', 'FT1', '', '', '', '', 1, 6),
    ('AFONSO LOPEZ', 'PABLO', 'FT1', '', '', '', '', 1, 6),
    ('AGUILAR ESCUELA', 'TANAUSU', 'FT1', '', '', '', '', 1, 6),
    ('IBARRIA MARTIN', 'JUAN JOSE', 'FT1', '', '', '', '', 1, 6),
    ('RODRIGUEZ BETHENCOURT', 'RUBEN FABIAN', 'FT1', '', '', '', '', 1, 6),
    ('GUTIERREZ TADEO', 'JOSE MARIA', 'FT2', '', '', '', '', 1, 6),
    ('PEREZ TAVIO', 'ALEJANDRO', 'FT2', '', '', '', '', 1, 6),
    ('DIAZ PEREZ', 'AGONEY', 'FT2', '', '', '', '', 1, 6),
    ('OCAMPO PALACIO', 'JUAN DAVID', 'FT3', '', '', '', '', 1, 6),
    ('OLIVARES MORA', 'ASDRUBAL', 'FT3', '', '', '', '', 1, 6),
    ('LUIS OLIVA', 'RUYMAN', 'FT3', '', '', '', '', 1, 6);

-- DISPORT
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('CARRILLO ARJONA', 'RAUL', 'FT1', '', '', '', '', 1, 2),
    ('LOPEZ RODRIGUEZ', 'PEDRO TOMAS', 'FT1', '', '', '', '', 1, 2),
    ('REQUENA SERRES', 'EDER', 'FT1', '', '', '', '', 1, 2),
    ('TREPAT SEGURA', 'DAVID', 'FT1', '', '', '', '', 1, 2),
    ('VALENTI LORENTE', 'CRISTIAN', 'FT1', '', '', '', '', 1, 2),
    ('AGUILAR DIAZ', 'POL', 'FT2', '', '', '', '', 1, 2),
    ('ARIÑO CASOLIBA', 'AITOR', 'FT2', '', '', '', '', 1, 2),
    ('GONZALEZ RUBIO', 'DAVID', 'FT2', '', '', '', '', 1, 2),
    ('GONZALEZ CLAR', 'ALEJANDRO', 'FT2', '', '', '', '', 1, 2),
    ('RIVERA SANCHEZ', 'GUILLEM', 'FT2', '', '', '', '', 1, 2),
    ('SANCHEZ PELEGRIN', 'MARIO', 'FT2', '', '', '', '', 1, 2),
    ('REQUENA SERRES', 'AKETZA', 'FT3', '', '', '', '', 1, 2);

-- FEXPC
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('BOGDAN TIMOFTE', 'ALEXANDRU', 'FT1', '', '', '', '', 1, 5),
    ('DOMINGUEZ GALVAN', 'ANTONIO JESUS', 'FT1', '', '', '', '', 1, 5),
    ('PEDRAZA PEREZ', 'ALVARO', 'FT1', '', '', '', '', 1, 5),
    ('PEDRERA HINOJAL', 'ALEJANDRO', 'FT1', '', '', '', '', 1, 5),
    ('DEL BARCO GONZALEZ', 'JORGE', 'FT2', '', '', '', '', 1, 5),
    ('GARCIA FERNANDEZ', 'JUAN ANGEL', 'FT2', '', '', '', '', 1, 5),
    ('SERREJON MURIANO', 'FRANCISCO', 'FT2', '', '', '', '', 1, 5),
    ('GUERRA CANSADO', 'JUAN MANUEL', 'FT2', '', '', '', '', 1, 5),
    ('MAYAL CANO', 'MANUEL', 'FT2', '', '', '', '', 1, 5),
    ('MARTIN HERNANDEZ', 'JUAN CARLOS', 'FT2', '', '', '', '', 1, 5),
    ('ACOSTA HERNANDEZ', 'DAVID', 'FT3', '', '', '', '', 1, 5),
    ('CARRAPISO MARTINEZ', 'JUAN RAMON', 'FT3', '', '', '', '', 1, 5);

-- SEGUNDA PARTE
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('BORRALLO TRILLO', 'JOSE', 'FT1', '', '', '', '', 1, 7),
    ('CHAMOSA TELO', 'NICOLAS MARTIN', 'FT1', '', '', '', '', 1, 7),
    ('LORENTE MARTIN', 'JORGE', 'FT1', '', '', '', '', 1, 7),
    ('CORTES CAMARMO', 'JAVIER', 'FT2', '', '', '', '', 1, 7),
    ('DE LAORDEN BARCELONA', 'EDUARDO JOSE', 'FT2', '', '', '', '', 1, 7),
    ('GONZALEZ LARRIBA', 'ABEL', 'FT2', '', '', '', '', 1, 7),
    ('RODRIGUEZ GRANDE', 'CARLOS', 'FT2', '', '', '', '', 1, 7),
    ('SEGURA SANCHEZ', 'LUIS CARLOS', 'FT2', '', '', '', '', 1, 7),
    ('GRANDE CARRAL', 'AITOR', 'FT2', '', '', '', '', 1, 7),
    ('ZANCAJO ALEJANDRE', 'DANIEL', 'FT2', '', '', '', '', 1, 7),
    ('ZENTENO SANDOVAL', 'RONALD', 'FT2', '', '', '', '', 1, 7),
    ('ESCRIBA VALERA', 'VICENTE', 'FT3', '', '', '', '', 1, 7),
    ('MARCOS RASERO', 'MIGUEL', 'FT3', '', '', '', '', 1, 7);

-- HERCULES PARALIMPICO
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('GARCIA CUTILLAS', 'JAVIER', 'FT1', '', '', '', '', 1, 3),
    ('HOSTYN MARTINEZ', 'OSCAR', 'FT1', '', '', '', '', 1, 3),
    ('LARA PASTOR', 'JORGE', 'FT1', '', '', '', '', 1, 3),
    ('MANJON GOMEZ', 'DANIEL', 'FT1', '', '', '', '', 1, 3),
    ('CASCANT SEGUI', 'PABLO', 'FT1', '', '', '', '', 1, 3),
    ('ADELL PLA', 'NOE', 'FT2', '', '', '', '', 1, 3),
    ('BARRETO GONZALEZ', 'DIEGO', 'FT2', '', '', '', '', 1, 3),
    ('SANCHEZ GUCEMA', 'ANTONIO JESUS', 'FT2', '', '', '', '', 1, 3),
    ('SERRANO GARCIA', 'DARIO', 'FT2', '', '', '', '', 1, 3),
    ('URBINA GARCIA', 'ABEL', 'FT2', '', '', '', '', 1, 3),
    ('ALBALADEJO MARTINEZ', 'JUAN', 'FT2', '', '', '', '', 1, 3),
    ('DIAZ MENDEZ', 'ANGELO', 'FT2', '', '', '', '', 1, 3),
    ('CLEMENTE MUÑOZ', 'SERGIO NICOLAS', 'FT3', '', '', '', '', 1, 3),
    ('MACIA ROVIRA', 'SANTIAGO', 'FT3', '', '', '', '', 1, 3),
    ('HERNANDEZ DIAZ', 'NICOLAS', 'FT3', '', '', '', '', 1, 3);

-- EIBAR
INSERT INTO public.players
(surname, name, classification, age, description, image, position, number, team_id)
VALUES
    ('GADEA ASUNCION', 'HECTOR', 'FT1', '', '', '', '', 1, 1),
    ('POMBO MARCOS', 'BORJA', 'FT1', '', '', '', '', 1, 1),
    ('UCIN AGUIRRE', 'AITOR', 'FT1', '', '', '', '', 1, 1),
    ('SANZ CASADO', 'IKER', 'FT1', '', '', '', '', 1, 1),
    ('ALMEIDA COBO', 'JOSUE', 'FT2', '', '', '', '', 1, 1),
    ('GOIKOETXEA FONSECA', 'IBAI', 'FT2', '', '', '', '', 1, 1),
    ('MARTINEZ GARCIA', 'YERIK', 'FT2', '', '', '', '', 1, 1),
    ('RUIZ DIEZ', 'MARTIN', 'FT2', '', '', '', '', 1, 1),
    ('VAREA LERENA', 'VICTOR', 'FT2', '', '', '', '', 1, 1),
    ('RUEDA AMBOAGE', 'SERGIO', 'FT2', '', '', '', '', 1, 1),
    ('ATIENZA BILBAO', 'IKER', 'FT3', '', '', '', '', 1, 1),
    ('GAMIZ LOPEZ', 'DAVID', 'FT3', '', '', '', '', 1, 1),
    ('LOPEZ GOMEZ', 'JAVIER', 'FT3', '', '', '', '', 1, 1);
