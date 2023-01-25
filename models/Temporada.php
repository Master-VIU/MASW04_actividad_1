<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
class Temporada
    {
        private $numero;
        private $serieId;
        private $id;
        private $fechaLanzamiento;
        private $database;

        function constructor($numeroTemporada, $serieIdTemporada, $idTemporada, $fechaLanzamientoTemporada)
        {
            $this->numero = $numeroTemporada;
            $this->serieId = $serieIdTemporada;
            $this->id = $idTemporada;
            $this->fechaLanzamiento = $fechaLanzamientoTemporada;
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

            $query = "SELECT * FROM filmaviu.temporadas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $temporada = new Temporada($item['NUMERO'], $item['SERIE_ID'], $item['ID'],$item['FECHA_LANZAMIENTO']);
                array_push($listData, $temporada);
            }

            $this->database->closeConnection();
            return $listData;
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
        public function getSerieId()
        {
            return $this->serieId;
        }

        /**
         * @param mixed $serieId
         */
        public function setSerieId($serieId)
        {
            $this->serieId = $serieId;
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
        public function getFechaLanzamiento()
        {
            return $this->fechaLanzamiento;
        }

        /**
         * @param mixed $fechaLanzamiento
         */
        public function setFechaLanzamiento($fechaLanzamiento)
        {
            $this->fechaLanzamiento = $fechaLanzamiento;
        }
    }
?>