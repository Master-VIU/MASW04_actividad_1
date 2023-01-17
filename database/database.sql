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
                                 TAMANIO BIGINT,
                                 IMAGEN LONGBLOB NOT NULL,
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
