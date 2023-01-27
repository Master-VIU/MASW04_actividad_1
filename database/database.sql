-- DATABASE CREATION

CREATE SCHEMA IF NOT EXISTS filmaviu;

CREATE TABLE filmaviu.GENEROS(
                                 ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                 NOMBRE VARCHAR(255) NOT NULL,
                                 CONSTRAINT PK_GENERO PRIMARY KEY(ID)
);

CREATE TABLE filmaviu.PLATAFORMAS(
                                     ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                     NOMBRE VARCHAR(255) NOT NULL,
                                     CONSTRAINT PK_PLATAFORMA PRIMARY KEY(ID)
);

CREATE TABLE filmaviu.CLASIFICACIONES(
                                         ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                         TIPO VARCHAR(255) NOT NULL,
                                         CONSTRAINT PK_CLASIFICACION PRIMARY KEY(ID)
);

CREATE TABLE filmaviu.IDIOMAS(
                                 ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                 NOMBRE VARCHAR(255) NOT NULL,
                                 ISO_CODE VARCHAR(255) UNIQUE NOT NULL,
                                 CONSTRAINT PK_IDIOMA PRIMARY KEY(ID)
);

CREATE TABLE filmaviu.NACIONALIDADES(
                                        ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                        PAIS VARCHAR(255) NOT NULL,
                                        CONSTRAINT PK_NACIONALIDAD PRIMARY KEY(ID)
);

CREATE TABLE filmaviu.DIRECTORES(
                                    ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                    NOMBRE VARCHAR(255) NOT NULL,
									DNI VARCHAR(9) UNIQUE NOT NULL,
                                    APELLIDOS VARCHAR(500) NOT NULL,
                                    FECHA_NACIMIENTO DATE NOT NULL,
                                    NACIONALIDAD MEDIUMINT NOT NULL,
                                    CONSTRAINT PK_DIRECTOR PRIMARY KEY(ID),
                                    CONSTRAINT FK_DIRECTOR_NACIONALILDAD FOREIGN KEY(NACIONALIDAD) REFERENCES filmaviu.NACIONALIDADES(ID)
                                        ON UPDATE CASCADE
                                        ON DELETE RESTRICT
);

CREATE TABLE filmaviu.ACTORES(
                                 ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                 NOMBRE VARCHAR(255) NOT NULL,
								 DNI VARCHAR(9) UNIQUE NOT NULL,
                                 APELLIDOS VARCHAR(500) NOT NULL,
                                 FECHA_NACIMIENTO DATE NOT NULL,
                                 NACIONALIDAD MEDIUMINT NOT NULL,
                                 CONSTRAINT PK_ACTOR PRIMARY KEY(ID),
                                 CONSTRAINT FK_ACTOR_NACIONALILDAD FOREIGN KEY(NACIONALIDAD) REFERENCES filmaviu.NACIONALIDADES(ID)
                                     ON UPDATE CASCADE
                                     ON DELETE RESTRICT
);

CREATE TABLE filmaviu.PORTADA(
                                 ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                 IMAGEN VARCHAR(250) NOT NULL,
                                 PRIMARY KEY (ID)
);

CREATE TABLE filmaviu.SERIES(
                                ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                TITULO VARCHAR(255) NOT NULL,
                                PLATAFORMA MEDIUMINT NOT NULL,
                                DIRECTOR MEDIUMINT NOT NULL,
                                CLASIFICACION MEDIUMINT NOT NULL,
                                GENERO MEDIUMINT NOT NULL,
                                PORTADA MEDIUMINT NOT NULL,
                                CONSTRAINT PK_SERIE PRIMARY KEY(ID),
                                CONSTRAINT FK_SERIE_PLATAFORMA FOREIGN KEY(PLATAFORMA) REFERENCES filmaviu.PLATAFORMAS(ID),
                                CONSTRAINT FK_SERIE_DIRECTOR FOREIGN KEY(DIRECTOR) REFERENCES filmaviu.DIRECTORES(ID),
                                CONSTRAINT FK_SERIE_CLASIFICACION FOREIGN KEY(CLASIFICACION) REFERENCES filmaviu.CLASIFICACIONES(ID),
                                CONSTRAINT FK_SERIE_GENERO FOREIGN KEY(GENERO) REFERENCES filmaviu.GENEROS(ID),
                                CONSTRAINT FK_SERIE_PORTADA FOREIGN KEY(PORTADA) REFERENCES  filmaviu.PORTADA(ID)
                                    ON UPDATE CASCADE
                                    ON DELETE CASCADE
);

CREATE TABLE filmaviu.SERIE_ACTORES(
                                       ID_SERIE MEDIUMINT NOT NULL,
                                       ID_ACTOR MEDIUMINT NOT NULL,
                                       CONSTRAINT PK_SERIE_ACTORE PRIMARY KEY(ID_SERIE, ID_ACTOR),
                                       CONSTRAINT FK_SERIE_ACTOR_SERIE FOREIGN KEY(ID_SERIE) REFERENCES filmaviu.SERIES(ID),
                                       CONSTRAINT FK_SERIE_ACTOR_ACTOR FOREIGN KEY(ID_ACTOR) REFERENCES filmaviu.ACTORES(ID)
                                           ON UPDATE CASCADE
                                           ON DELETE CASCADE
);

CREATE TABLE filmaviu.SERIE_IDIOMAS(
                                       ID_SERIE MEDIUMINT NOT NULL,
                                       ID_IDIOMA MEDIUMINT NOT NULL,
                                       TIPO ENUM('AUDIO', 'SUBTITULO') NOT NULL,
                                       CONSTRAINT PK_SERIE_IDIOMA PRIMARY KEY(ID_SERIE, ID_IDIOMA, TIPO),
                                       CONSTRAINT FK_SERIE_IDIOMA_SERIE FOREIGN KEY(ID_SERIE) REFERENCES filmaviu.SERIES(ID),
                                       CONSTRAINT FK_SERIE_IDIOMA_IDIOMA FOREIGN KEY(ID_IDIOMA) REFERENCES filmaviu.IDIOMAS(ID)
                                           ON UPDATE CASCADE
                                           ON DELETE CASCADE
);

CREATE TABLE filmaviu.TEMPORADAS(
                                    NUMERO INT NOT NULL,
                                    SERIE_ID MEDIUMINT NOT NULL,
                                    ID VARCHAR(36) NOT NULL UNIQUE,
                                    FECHA_LANZAMIENTO DATE NOT NULL,
                                    CONSTRAINT PK_TEMPORADA PRIMARY KEY(NUMERO, SERIE_ID),
                                    CONSTRAINT FK_TEMPORADA_SERIE FOREIGN KEY(SERIE_ID) REFERENCES filmaviu.SERIES(ID)
                                        ON UPDATE CASCADE
                                        ON DELETE CASCADE
);

CREATE TABLE filmaviu.EPISODIOS(
                                   ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                   TEMPORADA_ID VARCHAR(36) NOT NULL,
                                   NUMERO INT NOT NULL,
                                   TITULO VARCHAR(255) NOT NULL,
                                   DURACION INT NOT NULL,
                                   CONSTRAINT PK_EPISODIO PRIMARY KEY(ID),
                                   CONSTRAINT FK_EPISODIO_TEMPORADA FOREIGN KEY(TEMPORADA_ID) REFERENCES filmaviu.TEMPORADAS(ID)
                                       ON UPDATE CASCADE
                                       ON DELETE CASCADE
);

CREATE TABLE filmaviu.PELICULAS(
                                   ID MEDIUMINT NOT NULL AUTO_INCREMENT,
                                   TITULO VARCHAR(255) NOT NULL,
                                   PLATAFORMA MEDIUMINT NOT NULL,
                                   DIRECTOR MEDIUMINT NOT NULL,
                                   PUNTUACION FLOAT NOT NULL,
                                   CLASIFICACION MEDIUMINT NOT NULL,
                                   GENERO MEDIUMINT NOT NULL,
                                   PORTADA mediumint NOT NULL,
                                   DURACION INT NOT NULL,
                                   CONSTRAINT PK_PELICULA PRIMARY KEY(ID),
                                   CONSTRAINT FK_PELICULA_PLATAFORMA FOREIGN KEY(PLATAFORMA) REFERENCES filmaviu.PLATAFORMAS(ID),
                                   CONSTRAINT FK_PELICULA_DIRECTOR FOREIGN KEY(DIRECTOR) REFERENCES filmaviu.DIRECTORES(ID),
                                   CONSTRAINT FK_PELICULA_CLASIFICACION FOREIGN KEY(CLASIFICACION) REFERENCES filmaviu.CLASIFICACIONES(ID),
                                   CONSTRAINT FK_PELICULA_GENERO FOREIGN KEY(GENERO) REFERENCES filmaviu.GENEROS(ID),
                                   CONSTRAINT FK_PELICULA_PORTADA FOREIGN KEY(PORTADA) REFERENCES  filmaviu.PORTADA(ID)
                                       ON UPDATE CASCADE
                                       ON DELETE CASCADE
);

CREATE TABLE filmaviu.PELICULA_ACTORES(
                                          ID_PELICULA MEDIUMINT NOT NULL,
                                          ID_ACTOR MEDIUMINT NOT NULL,
                                          CONSTRAINT PK_PELICULA_ACTOR PRIMARY KEY(ID_PELICULA, ID_ACTOR),
                                          CONSTRAINT FK_PELICULA_ACTOR_PELICULA FOREIGN KEY(ID_PELICULA) REFERENCES filmaviu.PELICULAS(ID),
                                          CONSTRAINT FK_PELICULA_ACTOR_ACTOR FOREIGN KEY(ID_ACTOR) REFERENCES filmaviu.ACTORES(ID)
                                              ON UPDATE CASCADE
                                              ON DELETE CASCADE
);

CREATE TABLE filmaviu.PELICULA_IDIOMAS(
                                          ID_PELICULA MEDIUMINT NOT NULL,
                                          ID_IDIOMA MEDIUMINT NOT NULL,
                                          TIPO ENUM('AUDIO', 'SUBTITULO') NOT NULL,
                                          CONSTRAINT PK_PELICULA_IDIOMA PRIMARY KEY(ID_PELICULA, ID_IDIOMA, TIPO),
                                          CONSTRAINT FK_PELICULA_IDIOMA_PELICULA FOREIGN KEY(ID_PELICULA) REFERENCES filmaviu.PELICULAS(ID),
                                          CONSTRAINT FK_PELICULA_IDIOMA_IDIOMA FOREIGN KEY(ID_IDIOMA) REFERENCES filmaviu.IDIOMAS(ID)
                                              ON UPDATE CASCADE
                                              ON DELETE CASCADE
);

-- INSERTS

INSERT INTO filmaviu.generos (ID, NOMBRE)
VALUES
    (1, 'Terror'),
    (2, 'Acción'),
    (3, 'Aventura'),
    (4, 'Comedia'),
    (5, 'Familiar'),
    (6, 'Documental'),
    (7, 'Ciencia Ficción'),
    (8, 'Drama');

INSERT INTO filmaviu.plataformas (ID, NOMBRE)
VALUES
    (1, 'Netflix'),
    (2, 'Amazon Video'),
    (3, 'HBO'),
    (4, 'Disney +'),
    (5, 'DAZN'),
    (6, 'Apple TV');

INSERT INTO filmaviu.clasificaciones (ID, TIPO)
VALUES
    (1, 'TP'),
    (2, '+3'),
    (3, '+6'),
    (4, '+9'),
    (5, '+13'),
    (6, '+16'),
    (7, '+18');

INSERT INTO filmaviu.idiomas (ID, NOMBRE, ISO_CODE)
VALUES
    (1, 'Francés (Francia)', 'fr-FR'),
    (2, 'Español (España)', 'es-ES'),
    (3, 'Inglés (Estados Unidos)', 'en-US'),
    (4, 'Inglés (Reino Unido)', 'en-GB');

INSERT INTO filmaviu.nacionalidades (ID, PAIS)
VALUES
    (1, 'España'),
    (2, 'Australia'),
    (3, 'Reino Unido'),
    (4, 'Estados Unidos'),
    (5, 'Gales'),
    (6, 'Portugal'),
    (7, 'Canada'),
    (8, 'Japón');

INSERT INTO filmaviu.directores (ID, DNI, NOMBRE, APELLIDOS, FECHA_NACIMIENTO, NACIONALIDAD)
VALUES
    (1, '16105542E', 'Steven', 'Spielberg', '1946-12-18', 4),
    (2, '91367856B', 'Martin', 'Scorsese', '1942-11-17', 4),
    (3, '09398295N', 'Pedro', 'Almodovar', '1949-09-24', 1),
    (4, '34390748K', 'D.B.', 'Weiss', '1971-04-23', 4),
    (5, '98411824E', 'James', 'Cameron', '1954-08-16', 7),
    (6, '16103312T', 'Justin', 'Roiland', '1980-02-21', 4),
    (7, '24433696Z', 'Christopher', 'Nolan', '1970-07-30', 3);


INSERT INTO filmaviu.actores (ID, DNI, NOMBRE, APELLIDOS, FECHA_NACIMIENTO, NACIONALIDAD)
VALUES
    (1, '18793791P','Tom', 'Hanks', '1956-07-09', 4),
    (2, '15096267X','Meryl', 'Streep', '1956-07-09', 4),
    (3, '78468321A','Denzel', 'Washington', '1954-12-28', 4),
    (4, '41443370S','Leonardo', 'DiCaprio', '1974-11-11', 4),
    (5, '09685272H','Brad', 'Pitt', '1963-12-18', 4),
    (6, '77132013H','Tom', 'Cruise', '1962-07-03', 4),
    (7, '26553493Q','Robert', 'De Niro', '1943-08-17', 4),
    (8, '41610231B','Morgan', 'Freeman', '1937-06-01', 4),
    (9, '41839249H','Al', 'Pacino', '1940-04-25', 4),
    (10,'97002771H', 'Anthony', 'Hopkins', '1937-12-31', 5),
    (11,'05868063G', 'Peter', 'Dinklage', '1969-06-11', 4),
    (12,'60494637Z', 'Emilia', 'Clarke', '1986-10-23', 3),
    (13,'64305810H', 'Kit', 'Harrington', '1986-12-26', 3),
    (14,'24623440P', 'Sophie', 'Turner', '1996-02-21', 3),
    (15,'37126907P', 'Justin', 'Roiland', '1980-02-21', 4),
    (16,'11260505G', 'Chris', 'Parnell', '1967-02-05', 4),
    (17,'13072470Y', 'Kate', 'Winslet', '1974-11-11', 4),
    (18,'53101494Z', 'Sam', 'Worthington', '1976-08-02', 2),
    (19,'99577872Q', 'Zoe', 'Saldana', '1978-06-19', 4),
    (20,'43662561M', 'Matthew', 'McConaughey', '1969-11-04', 4),
    (21,'27163511M', 'Anne', 'Hathaway', '1982-11-12', 4),
    (22,'45481189T', 'Ken', 'Watanabe', '1959-10-21', 8);

INSERT INTO filmaviu.portada (ID, IMAGEN)
VALUES
    (1, '/images/1.png'),
    (2, '/images/2.png'),
    (3, '/images/3.png'),
    (4, '/images/4.png'),
    (5, '/images/5.png'),
    (6, '/images/6.png'),
    (7, '/images/7.png');

INSERT INTO filmaviu.series (ID, TITULO, PLATAFORMA, DIRECTOR, CLASIFICACION, GENERO, PORTADA)
VALUES
    (1, 'Juego de Tronos', 3, 4, 7, 2, 1),
    (2, 'Rick y Morty', 3, 6, 7, 3, 2);

INSERT INTO filmaviu.serie_actores (ID_SERIE, ID_ACTOR)
VALUES
    (1, 11),
    (1, 12),
    (1, 13),
    (1, 14),
    (2, 15),
    (2, 16);

INSERT INTO filmaviu.serie_idiomas (ID_SERIE, ID_IDIOMA, TIPO)
VALUES
    (1, 2, 'AUDIO'),
    (1, 3, 'AUDIO'),
    (1, 1, 'AUDIO'),
    (1, 2, 'SUBTITULO'),
    (1, 3, 'SUBTITULO'),
    (1, 1, 'SUBTITULO'),
    (2, 2, 'AUDIO'),
    (2, 3, 'AUDIO'),
    (2, 4, 'AUDIO'),
    (2, 3, 'SUBTITULO'),
    (2, 4, 'SUBTITULO');

INSERT INTO filmaviu.temporadas (NUMERO, SERIE_ID, ID, FECHA_LANZAMIENTO)
VALUES
    (1, 1, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', '2011-04-17'),
    (2, 1, '3f9f9a1a-6a00-4c3e-b947-c8e4e4b1c4cf', '2012-04-01'),
    (3, 1, 'c7a8d1b2-7f33-4e2d-8b8d-aa4c4f4b9c0e', '2013-03-31'),
    (1, 2, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', '2013-12-02'),
    (2, 2, '9a8b7c6d-5e4f-3g2h-1i2j-3k4l5m6n7o8p', '2015-07-26');

INSERT INTO filmaviu.episodios (ID, TEMPORADA_ID, NUMERO, TITULO, DURACION)
VALUES
    (1, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 1, 'Invierno está llegando', 3000),
    (2, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 2, 'El camino del rey', 3023),
    (3, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 3, 'Lord Nieve', 3200),
    (4, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 4, 'Los tullidos, los bastardos y las cosas rotas', 3020),
    (5, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 5, 'El lobo y el león', 3220),
    (6, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 6, 'Una corona de oro', 3067),
    (7, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 7, 'Ganas o mueres', 3560),
    (8, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 8, 'El final puntiagudo', 3450),
    (9, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 9, 'Baelor', 3123),
    (10, 'bd6a9c9e-f7d3-4f3f-94c2-1b3c10f3d3a5', 10, 'Fuego y sangre', 3003),
    (11, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 1, 'Piloto', 1380),
    (12, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 2, 'Perro cortacesped', 1324),
    (13, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 3, 'Parque Anatomico', 1384),
    (14, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 4, '¡M. Night Shaym-Aliens!', 1323),
    (15, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 5, 'Meeseeks y destruir', 1480),
    (16, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 6, 'La poción de Rick #9', 1380),
    (17, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 7, 'Criando Gazorpazorp', 1580),
    (18, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 8, 'Sesenta minutos', 1582),
    (19, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 9, 'Algo Ricked This Way Comes', 1378),
    (20, 'd1e2f3c4-5a6b-7c8d-9e0f-1g2h3i4j5k6l', 10, 'Cerca Rick-contadores de la clase Rick', 1870);

INSERT INTO filmaviu.peliculas (ID, TITULO, PLATAFORMA, DIRECTOR, PUNTUACION, CLASIFICACION, GENERO, PORTADA, DURACION)
VALUES
    (1, 'Titanic', 1, 5, 8, 5, 8, 3, 11440),
    (2, 'Avatar', 4, 5, 9, 5, 7, 4, 9660),
    (3, 'Interestellar', 3, 7, 9, 5, 7, 5, 9420),
    (4, 'Origen', 3, 7, 9, 5, 7, 6, 8480);

INSERT INTO filmaviu.pelicula_actores (ID_PELICULA, ID_ACTOR)
VALUES
    (1, 4),
    (1, 17),
    (2, 18),
    (2, 19),
    (3, 20),
    (3, 21),
    (4, 4),
    (4, 22);

INSERT INTO filmaviu.pelicula_idiomas (ID_PELICULA, ID_IDIOMA, TIPO)
VALUES
    (1, 2, 'AUDIO'),
    (1, 3, 'AUDIO'),
    (1, 4, 'AUDIO'),
    (1, 2, 'SUBTITULO'),
    (1, 3, 'SUBTITULO'),
    (1, 4, 'SUBTITULO'),
    (2, 2, 'AUDIO'),
    (2, 3, 'AUDIO'),
    (2, 4, 'AUDIO'),
    (2, 2, 'SUBTITULO'),
    (2, 3, 'SUBTITULO'),
    (2, 4, 'SUBTITULO'),
    (3, 2, 'AUDIO'),
    (3, 3, 'AUDIO'),
    (3, 4, 'AUDIO'),
    (3, 2, 'SUBTITULO'),
    (3, 3, 'SUBTITULO'),
    (3, 4, 'SUBTITULO'),
    (4, 2, 'AUDIO'),
    (4, 3, 'AUDIO'),
    (4, 4, 'AUDIO'),
    (4, 2, 'SUBTITULO'),
    (4, 3, 'SUBTITULO'),
    (4, 4, 'SUBTITULO');