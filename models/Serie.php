<?php

require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Serie
    {
        private $id;
        private $titulo;
        private $plataformaId;
        private $directorId;
        private $clasificacionId;
        private $generoId;
        private $portadaId;
        private $database;


        function constructor($idSerie, $tituloSerie, $plataformaSerie,
             $directorSerie, $clasificacionSerie, $generoSerie, $portadaSerie)
        {

            $this->id = $idSerie;
            $this->titulo = $tituloSerie;
            $this->plataformaId = $plataformaSerie;
            $this->directorId = $directorSerie;
            $this->clasificacionId = $clasificacionSerie;
            $this->generoId = $generoSerie;
            $this->portadaId = $portadaSerie;
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

            $query = "SELECT * FROM filmaviu.series";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
                array_push($listData, $serie);
            }
            $this->database->closeConnection();
            return $listData;
        }


        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.series WHERE ID = '$this->id'";
            $result = $connection->query($query);

            $serie = null;
            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
            }

            $this->database->closeConnection();
            return $serie;
        }

        public function create()
        {
            $serieCreada = false;
            if(!$this->existsTitulo())
            {
                
                $connection = $this->database->getConnection();
                $query = "INSERT INTO filmaviu.series (
                                TITULO,
                                PLATAFORMA,
                                DIRECTOR,
                                CLASIFICACION,
                                GENERO,
                                PORTADA
                    ) VALUES (
                              '$this->titulo',
                              '$this->plataformaId',
                              '$this->directorId',
                              '$this->clasificacionId',
                              '$this->generoId',
                              '$this->portadaId'
                    )";
                if ($resultInsert = $connection->query($query))
                {
                    $serieCreada = true;
                }
            }
            $this->database->closeConnection();
            return $serieCreada;
        }

        public function update()
        {
            $serieActualizada = false;
            $query = "UPDATE filmaviu.series
                        set 
                            TITULO = '$this->titulo',
                            PLATAFORMA = '$this->plataformaId',
                            DIRECTOR = '$this->directorId',
                            CLASIFICACION = '$this->clasificacionId',
                            GENERO = '$this->generoId',
                            PORTADA = '$this->portadaId'                
                        WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultInsert = $connection->query($query))
                {
                    $serieActualizada = true;
                }
            }

            $this->database->closeConnection();
            return $serieActualizada;
        }

        public function remove()
        {
            $serieBorrada = false;
            $query = "DELETE FROM filmaviu.series WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultRemove = $connection->query($query))
                {
                    $serieBorrada = true;
                }
            }

            $this->database->closeConnection();
            return $serieBorrada;
        }

        public function exists()
        {
            $existeSerie = false;
            $serie = $this->get();
            if ($serie != null)
            {
                $existeSerie = true;
            }
            return $existeSerie;
        }

        public function existsTitulo()
        {
            $connection = $this->database->getConnection();
            $existeSerie = false;

            if($this->titulo != null)
            {
                $query = "SELECT ID FROM filmaviu.series WHERE TITULO = '$this->titulo'";
                $result = $connection->query($query);
                $serie = null;
                foreach ($result as $item)
                {
                    $serie = new Serie(
                        $item['ID'], null, null, null, null, null, null, null, null
                    );
                }
                if ($serie != null)
                {
                    $existeSerie = true;
                }
            }
            $this->database->closeConnection();
            return $existeSerie;
        }

        function getSeriesPorPortada()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.series WHERE PORTADA = '$this->portadaId'";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
                array_push($listData, $serie);
            }
            $this->database->closeConnection();
            return $listData;
        }

        function getSeriesPorClasificacion()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.series WHERE CLASIFICACION = '$this->clasificacionId'";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
                array_push($listData, $serie);
            }
            $this->database->closeConnection();
            return $listData;
        }

        function getSeriesPorGenero()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.series WHERE GENERO = '$this->generoId'";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
                array_push($listData, $serie);
            }
            $this->database->closeConnection();
            return $listData;
        }

        function getSeriesPorPlataforma()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.series WHERE PLATAFORMA = '$this->plataformaId'";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serie = new Serie(
                    $item['ID'],
                    $item['TITULO'],
                    $item['PLATAFORMA'],
                    $item['DIRECTOR'],
                    $item['CLASIFICACION'],
                    $item['GENERO'],
                    $item['PORTADA']
                );
                array_push($listData, $serie);
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

        

    }
    
?>