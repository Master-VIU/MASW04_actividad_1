<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
class Pelicula
    {
        private $id;
        private $titulo;
        private $plataformaId;
        private $directorId;
        private $puntuacion;
        private $clasificacionId;
        private $generoId;
        private $portadaId;
        private $duracion;
        private $database;

        function constructor($idPelicula, $tituloPelicula, $plataformaPelicula, $directorPelicula,
                               $puntuacionPelicula, $clasificacionPelicula, $generoPelicula, $portadaPelicula,
                               $duracionPelicula)
        {
            $this->id = $idPelicula;
            $this->titulo = $tituloPelicula;
            $this->plataformaId = $plataformaPelicula;
            $this->directorId = $directorPelicula;
            $this->puntuacion = $puntuacionPelicula;
            $this->clasificacionId = $clasificacionPelicula;
            $this->generoId = $generoPelicula;
            $this->portadaId = $portadaPelicula;
            $this->duracion = $duracionPelicula;
            $this->database = Database::getInstance();
        }

        public function constructorVacio()
        {
            $this->database = Database::getInstance();
        }

        public function __construct()
        {
            $params = func_get_args();
            $num_params = func_num_args();

            if ($num_params == 0)
            {
                call_user_func_array(array($this,'constructorVacio'),$params);
            }
            else
            {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.peliculas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $pelicula = new Pelicula(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['PUNTUACION'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA'],
                    $item['DURACION']
                );
                array_push($listData, $pelicula);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.peliculas WHERE ID = '$this->id'";
            $result = $connection->query($query);

            $pelicula = null;
            foreach ($result as $item)
            {
                $pelicula = new Pelicula(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['PUNTUACION'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA'],
                    $item['DURACION']
                );
            }

            $this->database->closeConnection();
            return $pelicula;
        }

        public function create()
        {
            $peliculaCreada = false;
            if(!$this->existsTitulo())
            {
                echo "no existe";
                $connection = $this->database->getConnection();
                $query = "INSERT INTO filmaviu.peliculas (
                                TITULO,
                                PLATAFORMA,
                                DIRECTOR,
                                PUNTUACION,
                                CLASIFICACION,
                                GENERO,
                                PORTADA,
                                DURACION
                    ) VALUES (
                              '$this->titulo',
                              '$this->plataformaId',
                              '$this->directorId',
                              $this->puntuacion,
                              '$this->clasificacionId',
                              '$this->generoId',
                              '$this->portadaId',
                              $this->duracion
                    )";
                echo $query;
                if ($resultInsert = $connection->query($query))
                {
                    $peliculaCreada = true;
                }
            }
            $this->database->closeConnection();
            return $peliculaCreada;
        }

        public function update()
        {
            $peliculaActualizada = false;
            $query = "UPDATE filmaviu.peliculas
                        set 
                            TITULO = '$this->titulo',
                            PLATAFORMA = '$this->plataformaId',
                            DIRECTOR = '$this->directorId',
                            PUNTUACION = '$this->puntuacion',
                            CLASIFICACION = '$this->clasificacionId',
                            GENERO = '$this->generoId',
                            PORTADA = '$this->portadaId',
                            DURACION = '$this->duracion'                
                        WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultInsert = $connection->query($query))
                {
                    $peliculaActualizada = true;
                }
            }

            $this->database->closeConnection();
            return $peliculaActualizada;
        }

        public function remove()
        {
            $peliculaBorrada = false;
            $query = "DELETE FROM filmaviu.peliculas WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultRemove = $connection->query($query))
                {
                    $peliculaBorrada = true;
                }
            }

            $this->database->closeConnection();
            return $peliculaBorrada;
        }

        public function exists()
        {
            $existePelicula = false;
            $pelicula = $this->get();
            if ($pelicula != null)
            {
                $existePelicula = true;
            }
            return $existePelicula;
        }

        public function existsTitulo()
        {
            $connection = $this->database->getConnection();
            $existePelicula = false;

            if($this->titulo != null)
            {
                $query = "SELECT ID FROM filmaviu.peliculas WHERE TITULO = '$this->titulo'";
                $result = $connection->query($query);
                $pelicula = null;
                foreach ($result as $item)
                {
                    $pelicula = new Pelicula(
                        $item['ID'], null, null, null, null, null, null, null, null
                    );
                }
                if ($pelicula != null)
                {
                    $existePelicula = true;
                }
            }
            $this->database->closeConnection();
            return $existePelicula;
        }

        function getPeliculasPorPortada()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.peliculas WHERE PORTADA = '$this->portadaId'";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $pelicula = new Pelicula(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['PUNTUACION'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA'],
                    $item['DURACION']
                );
                array_push($listData, $pelicula);
            }

            $this->database->closeConnection();
            return $listData;
        }

    function getPeliculasPorClasificacion()
    {
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM filmaviu.peliculas WHERE CLASIFICACION = '$this->clasificacionId'";
        $result = $connection->query($query);
        $listData = [];

        foreach ($result as $item)
        {
            $pelicula = new Pelicula(
                $item['ID'],
                $item['TITULO'],
                $item['PLATAFORMA'],
                $item['DIRECTOR'],
                $item['PUNTUACION'],
                $item['CLASIFICACION'],
                $item['GENERO'],
                $item['PORTADA'],
                $item['DURACION']
            );
            array_push($listData, $pelicula);
        }

        $this->database->closeConnection();
        return $listData;
    }

    function getPeliculasPorGenero()
    {
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM filmaviu.peliculas WHERE GENERO = '$this->generoId'";
        $result = $connection->query($query);
        $listData = [];

        foreach ($result as $item)
        {
            $pelicula = new Pelicula(
                $item['ID'],
                $item['TITULO'],
                $item['PLATAFORMA'],
                $item['DIRECTOR'],
                $item['PUNTUACION'],
                $item['CLASIFICACION'],
                $item['GENERO'],
                $item['PORTADA'],
                $item['DURACION']
            );
            array_push($listData, $pelicula);
        }

        $this->database->closeConnection();
        return $listData;
    }

    function getPeliculasPorPlataforma()
    {
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM filmaviu.peliculas WHERE PLATAFORMA = '$this->plataformaId'";
        $result = $connection->query($query);
        $listData = [];

        foreach ($result as $item)
        {
            $pelicula = new Pelicula(
                $item['ID'],
                $item['TITULO'],
                $item['PLATAFORMA'],
                $item['DIRECTOR'],
                $item['PUNTUACION'],
                $item['CLASIFICACION'],
                $item['GENERO'],
                $item['PORTADA'],
                $item['DURACION']
            );
            array_push($listData, $pelicula);
        }

        $this->database->closeConnection();
        return $listData;
    }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * @param mixed $titulo
         */
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }

        /**
         * @return mixed
         */
        public function getPlataformaId()
        {
            return $this->plataformaId;
        }

        /**
         * @param mixed $plataformaId
         */
        public function setPlataformaId($plataformaId)
        {
            $this->plataformaId = $plataformaId;
        }

        /**
         * @return mixed
         */
        public function getDirectorId()
        {
            return $this->directorId;
        }

        /**
         * @param mixed $directorId
         */
        public function setDirectorId($directorId)
        {
            $this->directorId = $directorId;
        }

        /**
         * @return mixed
         */
        public function getPuntuacion()
        {
            return $this->puntuacion;
        }

        /**
         * @param mixed $puntuacion
         */
        public function setPuntuacion($puntuacion)
        {
            $this->puntuacion = $puntuacion;
        }

        /**
         * @return mixed
         */
        public function getClasificacionId()
        {
            return $this->clasificacionId;
        }

        /**
         * @param mixed $clasificacionId
         */
        public function setClasificacionId($clasificacionId)
        {
            $this->clasificacionId = $clasificacionId;
        }

        /**
         * @return mixed
         */
        public function getGeneroId()
        {
            return $this->generoId;
        }

        /**
         * @param mixed $generoId
         */
        public function setGeneroId($generoId)
        {
            $this->generoId = $generoId;
        }

        /**
         * @return mixed
         */
        public function getPortadaId()
        {
            return $this->portadaId;
        }

        /**
         * @param mixed $portadaId
         */
        public function setPortadaId($portadaId)
        {
            $this->portadaId = $portadaId;
        }

        /**
         * @return mixed
         */
        public function getDuracion()
        {
            return $this->duracion;
        }

        /**
         * @param mixed $duracion
         */
        public function setDuracion($duracion)
        {
            $this->duracion = $duracion;
        }

        /**
         * @return mixed
         */
        public function getDatabase()
        {
            return $this->database;
        }

        /**
         * @param mixed $database
         */
        public function setDatabase($database)
        {
            $this->database = $database;
        }


    }
?>