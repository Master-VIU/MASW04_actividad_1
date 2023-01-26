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

        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.temporadas WHERE ID = '$this->id'";
            $result = $connection->query($query);
            $temporada = null;
            foreach ($result as $item)
            {
                $temporada = new Temporada($item['NUMERO'], $item['SERIE_ID'], $item['ID'], $item['FECHA_LANZAMIENTO']);
            }

            $this->database->closeConnection();
            return $temporada;
        }


        function create()
        {
            $temporadaCreada = false;
            if(!$this->existsId())
            {
                $connection = $this->database->getConnection();       
                if($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.temporadas (NUMERO, SERIE_ID, ID, FECHA_LANZAMIENTO) VALUES 
                    ('$this->numero', '$this->serieId', '$this->id', '$this->fechaLanzamiento')"
                ))
                {
                    $temporadaCreada = true;
                }
            }
            $this->database->closeConnection();
            return $temporadaCreada;
        }

        public function existsId()
        {
            $connection = $this->database->getConnection();
            $existeTemporada = false;

            if($this->id != null)
            {
                $query = "SELECT ID FROM filmaviu.temporadas WHERE ID = '$this->id'";
                $result = $connection->query($query);
                $temporada = null;
                foreach ($result as $item)
                {
                    $temporada = new Temporada(
                        $item(null, null,['ID'], null)
                    );
                }
                if ($temporada != null)
                {
                    $existeTemporada = true;
                }
            }
            $this->database->closeConnection();
            return $existeTemporada;
        }

        public function update()
        {
            $temporadaActualizado = false;                     
                $query = "UPDATE filmaviu.temporadas set numero = '$this->numero', serie_id = '$this->serieId', id = '$this->id', fecha_lanzamiento = '$this->fechaLanzamiento'
                    WHERE id = " . $this->id;
                        
                if($this->exists())
                {
                    $connection = $this->database->getConnection();
                    if($resultInsert = $connection->query($query))
                    {
                        $temporadaActualizado = true;
                    }
                }
            
            $this->database->closeConnection();
            return $temporadaActualizado;
        }

        public function exists()
        {
            $existeTemporada = false;
            $temporada = $this->get();
            if ($temporada != null)
            {
                $existeTemporada = true;
            }
            return $existeTemporada;
        }

        public function remove()
        {
            $temporadaBorrada = false;
            $query = "DELETE FROM filmaviu.temporadas WHERE ID = '$this->id'";
            echo $query;
            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultRemove = $connection->query($query))
                {
                    $temporadaBorrada = true;
                }
            }
            $this->database->closeConnection();
            return $temporadaBorrada;
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