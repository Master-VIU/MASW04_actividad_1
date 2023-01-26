<?php

    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class SerieIdioma
    {
        private $idSerie;
        private $idIdioma;
        private $tipo;
        private $database;

        function constructor($idSerieIdioma, $idIdiomaSerie, $tipo)
        {
            $this->idSerie = $idSerieIdioma;
            $this->idIdioma = $idIdiomaSerie;
            $this->tipo = $tipo;
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

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.serie_idiomas";
            $result = $connection->query($query);
            $listData = [];

            foreach($result as $item)
            {
                $serieIdioma = new SerieIdioma($item['ID_SERIE'], $item['ID_IDIOMA'], $item['TIPO']);
                array_push($listData, $serieIdioma);
            }

            $this->database->closeConnection();
            return $listData;
        }

        private function get()
        {
            $connection = $this->database->getConnection();
            $query = "SELECT * FROM filmaviu.serie_idiomas WHERE ID_SERIE = ".$this->idSerie;
            $result = $connection->query($query);

            $serieIdioma = null;
            foreach($result as $item)
            {
                $serieIdioma = new SerieIdioma($item['ID_SERIE'], $item['ID_IDIOMA'], $item['TIPO']);
            }

            $this->database->closeConnection();
            return $serieIdioma;
        }

        public function create()
        {
            $serieIdiomaCreado= false;
            $connection = $this->database->getConnection();

            if($resultInsert = $connection->query(
                "INSERT INTO filmaviu.serie_idiomas (ID_SERIE, ID_IDIOMA, TIPO)  VALUES ($this->idSerie, $this->idIdioma, '$this->tipo')"
            ))
            {
                $serieIdiomaCreado = true;
            }

            $this->database->closeConnection();
            return $serieIdiomaCreado;
        }

        public function update()
        {
            $serieIdiomaActualizado = false;
            $query = "UPDATE filmaviu.serie_idiomas set ID_SERIE = '$this->idSerie', ID_IDIOMA = '$this->idIdioma', TIPO = '$this->tipo' WHERE ID_SERIE = ".$this->idSerie;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query($query))
                {
                    $serieIdiomaActualizado = true;
                }
            }

            $this->database->closeConnection();
            return $serieIdiomaActualizado;
        }


        public function remove()
        {
            $serieIdiomaBorrado = false;
            $query = "DELETE FROM filmaviu.serie_idiomas WHERE ID_SERIE = ".$this->idSerie;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultRemove = $connection->query($query))
                {
                    $serieIdiomaBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $serieIdiomaBorrado;
        }


        public function exists()
        {
            $existeSerieIdioma = false;
            $serieIdioma = $this->get();
            if($serieIdioma != null)
            {
                $existeSerieIdioma = true;
            }
            return $existeSerieIdioma;
        }


        /**
         * @return mixed
         */
        public function getIdSerie()
        {
            return $this->idSerie;
        }

        /**
         * @param mixed $idSerie
         */
        public function setIdSerie($idSerie)
        {
            $this->idSerie = $idSerie;
        }

           /**
         * @return mixed
         */
        public function getIdIdioma()
        {
            return $this->idIdioma;
        }

        /**
         * @param mixed $idIdioma
         */
        public function setIdIdioma($idIdioma)
        {
            $this->idIdioma = $idIdioma;
        }

         /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $tipo
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }
    }
?>