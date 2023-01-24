<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Episodio
    {
        private $id;
        private $temporadaId;
        private $numero;
        private $titulo;
        private $duracion;

        private function constructor($idEpisodio, $temporadaIdEpisodio, $numeroEpisodio, $tituloEpisodio, $duracionEpisodio)
        {

            $this->id = $idEpisodio;
            $this->temporadaId = $temporadaIdEpisodio;
            $this->numero = $numeroEpisodio;
            $this->titulo = $tituloEpisodio;
            $this->duracion = $duracionEpisodio;
            $this->database = Database::getInstance();
        }

        public function constructorVacio()
        {
            $this->database = Database::getInstance();
        }

        public function constructorUnParametro($idEpisodio)
        {
            $this->id = $idEpisodio;
            $this->database = Database::getInstance();
        }

        public function __construct()
        {
            $params = func_get_args();
            $num_params = func_num_args();

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } elseif($num_params == 1)
            {
                call_user_func_array(array($this,'constructorUnParametro'),$params);
            }
            else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.episodios";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $episodio =  new Episodio($item['ID'], $item['TEMPORADA_ID'], $item['NUMERO'], $item['TITULO'], $item['DURACION']);
                array_push($listData, $episodio);
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
        public function getTemporadaId()
        {
            return $this->temporadaId;
        }

        /**
         * @param mixed $temporadaId
         */
        public function setTemporadaId($temporadaId)
        {
            $this->temporadaId = $temporadaId;
        }

        /**
         * @return mixed
         */
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
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


    }
?>